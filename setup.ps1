# setup.ps1 - Automated Setup for IVAO Morocco Website
# Supports: Windows, Linux, and WSL

Write-Host "🚀 Starting IVAO Morocco Website Setup..." -ForegroundColor Cyan

# --- 0. OS Detection ---
$isWindows = $env:OS -eq 'Windows_NT'
$isLinux = $false
$isWsl = $false

if (-not $isWindows) {
    $isLinux = $true
    # Check for WSL specific signature in /proc/version
    if (Test-Path "/proc/version") {
        $procVersion = Get-Content "/proc/version" -Raw
        if ($procVersion -match "microsoft" -or $procVersion -match "WSL") {
            $isWsl = $true
        }
    }
}

$osName = if ($isWsl) { "WSL (Windows Subsystem for Linux)" } elseif ($isLinux) { "Linux" } else { "Windows" }
Write-Host "🖥️  Detected Environment: $osName" -ForegroundColor Magenta

# --- 1. Check for PHP ---
Write-Host "`n🔍 Checking for PHP..."
$phpCommand = Get-Command php -ErrorAction SilentlyContinue

if ($phpCommand) {
    $phpPath = $phpCommand.Source
    Write-Host "   ✅ Found PHP at $phpPath" -ForegroundColor Green
} else {
    # Platform specific fallback checks
    if ($isWindows) {
        $commonPaths = @("C:\php\php.exe", "C:\xampp\php\php.exe", "C:\laragon\bin\php\php-8.3*\php.exe")
        foreach ($path in $commonPaths) {
            if (Test-Path $path) {
                $phpPath = $path
                Write-Host "   ✅ Found PHP at $phpPath" -ForegroundColor Green
                break
            }
        }
    }
}

if (-not $phpPath) {
    Write-Host "   ❌ PHP not found." -ForegroundColor Red
    if ($isWindows) {
        Write-Host "   👉 Please install PHP 8.3+ and add it to your PATH, or extract it to C:\php" -ForegroundColor Yellow
    } else {
        Write-Host "   👉 Please install PHP using your package manager (e.g., sudo apt install php8.3 php8.3-xml php8.3-mbstring php8.3-sqlite3 php8.3-curl)" -ForegroundColor Yellow
    }
    exit 1
}

# Display PHP Version
& $phpPath -v | Select-Object -First 1

# --- 2. Check/Install Composer ---
Write-Host "`n🔍 Checking for Composer..."
$composerPath = "composer"
$hasGlobalComposer = Get-Command composer -ErrorAction SilentlyContinue

if ($hasGlobalComposer) {
     Write-Host "   ✅ Using global Composer" -ForegroundColor Green
} else {
    if (Test-Path ".\composer.phar") {
        $composerPath = "$phpPath composer.phar"
        Write-Host "   ✅ Found local composer.phar" -ForegroundColor Green
    } else {
        Write-Host "   ⚠️ Composer not found. Downloading..." -ForegroundColor Yellow
        try {
            if ($isWindows) {
                [Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12
            }
            Invoke-WebRequest -Uri https://getcomposer.org/installer -OutFile composer-setup.php
            
            & $phpPath composer-setup.php
            
            Remove-Item composer-setup.php
            $composerPath = "$phpPath composer.phar"
            
            Write-Host "   ✅ Composer downloaded successfully." -ForegroundColor Green
        } catch {
            Write-Host "   ❌ Failed to download Composer: $_" -ForegroundColor Red
            exit 1
        }
    }
}

# --- 3. Environment File ---
Write-Host "`n📄 Configuring Environment..."
if (-not (Test-Path ".env")) {
    Copy-Item ".env.example" ".env"
    Write-Host "   ✅ Created .env from .env.example" -ForegroundColor Green
} else {
    Write-Host "   ℹ️ .env already exists" -ForegroundColor Gray
}

# --- 4. Install PHP Dependencies ---
Write-Host "`n📦 Installing Backend Dependencies..."
# Use Invoke-Expression or direct invocation carefully
if ($composerPath -match "composer.phar") {
    & $phpPath composer.phar install
} else {
    composer install
}

# --- 5. Generate Key ---
Write-Host "`n🔑 Generating App Key..."
if (-not (Select-String -Path ".env" -Pattern "^APP_KEY=base64")) {
    & $phpPath artisan key:generate
} else {
    Write-Host "   ℹ️ App Key already set" -ForegroundColor Gray
}

# --- 6. Database Setup ---
Write-Host "`n🗄️ Setting up Database..."
$dbConnection = Select-String -Path ".env" -Pattern "^DB_CONNECTION=(.*)" | ForEach-Object { $_.Matches.Groups[1].Value }

if ($dbConnection -eq "sqlite") {
    $dbFile = "database/database.sqlite"
    if (-not (Test-Path $dbFile)) {
        New-Item -Path $dbFile -ItemType File | Out-Null
        Write-Host "   ✅ Created SQLite database file" -ForegroundColor Green
    }
    
    # Fix permissions for Linux/WSL if needed
    if ($isLinux) {
        chmod 775 $dbFile
        chmod 775 "database"
    }

    Write-Host "   Migrating database..."
    & $phpPath artisan migrate --seed --force
} else {
    Write-Host "   ℹ️ Using $dbConnection database." -ForegroundColor Yellow
    & $phpPath artisan migrate --seed --force
}

# --- 7. Link Storage ---
Write-Host "`n🔗 Linking Storage..."
& $phpPath artisan storage:link

# --- 8. Install/Build Frontend ---
Write-Host "`n🎨 Installing Frontend Dependencies (NPM)..."
# Check for npm
if (Get-Command npm -ErrorAction SilentlyContinue) {
    if ($isWindows) {
        cmd /c "npm install && npm run build"
    } else {
        npm install
        npm run build
    }
} else {
    Write-Host "   ❌ npm not found. Please install Node.js." -ForegroundColor Red
}

Write-Host "`n✅ Setup Complete! To run the server:" -ForegroundColor Green
Write-Host "   Run: $phpPath artisan serve" -ForegroundColor Cyan
