<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IVAO Morocco - @yield('title', 'Home')</title>

    <!-- Dark Mode Init Script (Default: Light) -->
    <!-- Dark Mode Init Script (Default: Light) -->
    @include('partials.theme-init')

    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Outfit (Body) and Nunito Sans (Headings) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300..800&family=Outfit:wght@300..600&display=swap"
        rel="stylesheet">
    <!-- AlpineJS for Dropdowns -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Nunito Sans', sans-serif;
        }

        .nav-link {
            position: relative;
        }

        /* Improve Dropdown Hover Effect */
        .group:hover .nav-link {
            opacity: 1;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 220px;
            /* Updated Dropdown Styles will be handled via Tailwind classes */
            border-radius: 12px;
            padding: 8px 0;
            z-index: 50;
            animation: fadeIn 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .group:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body
    class="bg-[#F8F9FA] dark:bg-slate-900 text-slate-800 dark:text-slate-100 antialiased flex flex-col min-h-screen transition-colors duration-300">
    <!-- Navbar: White in Light Mode, Dark in Dark Mode -->
    <header class="fixed w-full top-0 z-50 bg-white dark:bg-slate-900 shadow-md transition-colors duration-300">
        <div class="container mx-auto px-6 py-2 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="block py-1">
                    <!-- Dual Logo System -->
                    <img src="{{ asset('images/logo-blue.png') }}" alt="IVAO Morocco"
                        class="h-14 w-auto hover:opacity-90 transition-opacity dark:hidden">
                    <img src="{{ asset('images/logo-white.png') }}" alt="IVAO Morocco"
                        class="h-14 w-auto hover:opacity-90 transition-opacity hidden dark:block">
                </a>
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center space-x-6">
                <!-- Helper for nav link classes -->
                @php
                    $linkClass = "nav-link text-slate-700 dark:text-white/90 hover:text-ivao-blue dark:hover:text-white font-semibold py-4 flex items-center transition-colors";
                    $dropdownClass = "dropdown-content bg-white dark:bg-slate-900/95 dark:backdrop-blur-md border border-slate-200 dark:border-white/10 shadow-xl";
                    $itemClass = "block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-white/10 hover:text-ivao-blue dark:hover:text-white transition-colors rounded-md mx-2 flex items-center";
                @endphp

                <!-- Division Dropdown -->
                <div class="relative group">
                    <button class="{{ $linkClass }}">
                        Division <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="{{ $dropdownClass }}">
                        <a href="https://ivao.aero/Content/About/About.aspx" target="_blank" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            About IVAO
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ route('about-us') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            About Us
                        </a>
                        <a href="https://www.ivao.aero/staff/division.asp?Id=MA" target="_blank"
                            class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Staff
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ route('vaip.index') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                </path>
                            </svg>
                            vAIP
                        </a>
                    </div>
                </div>

                <!-- Members Dropdown -->
                <div class="relative group">
                    <button class="{{ $linkClass }}">
                        Members <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="{{ $dropdownClass }}">
                        <a href="https://webeye.ivao.aero" target="_blank" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Webeye
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ route('division-transfer') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Division Transfer
                        </a>
                        <a href="https://wiki.ivao.aero/en/home/training/main/training_procedures/rating_transfer"
                            target="_blank" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Rating Transfer
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ route('coming-soon') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                                </path>
                            </svg>
                            Discord
                        </a>
                        <a href="https://forum.ivao.aero/" target="_blank" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Forum
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- ATC Dropdown -->
                <div class="relative group">
                    <button class="{{ $linkClass }}">
                        ATC <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="{{ $dropdownClass }}">
                        <a href="{{ route('become-atc') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                                </path>
                            </svg>
                            Become an ATC
                        </a>
                        <a href="{{ route('wiki.index') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            SOPs
                        </a>
                        <a href="https://ivao.aero/softdev/software/aurora.asp" target="_blank"
                            class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Software
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                        <a href="https://atc.ivao.aero/fras" target="_blank" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            FRAs
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                        <a href="https://atc.ivao.aero/schedule" target="_blank" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Schedule
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Pilots Dropdown -->
                <div class="relative group">
                    <button class="{{ $linkClass }}">
                        Pilots <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="{{ $dropdownClass }}">
                        <a href="{{ route('become-pilot') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Become a Pilot
                        </a>
                        <a href="https://ivao.aero/softdev/software/altitude.asp" target="_blank"
                            class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Software
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ route('airports.index') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Airports
                        </a>
                        <a href="https://tracker.ivao.aero" target="_blank" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                </path>
                            </svg>
                            IVAO Tracker
                            <svg class="w-3 h-3 ml-auto opacity-50" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                        <a href="https://tours.ivao.aero" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Tours
                        </a>
                        <a href="{{ route('virtual-airlines.index') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            Virtual Airlines
                        </a>
                    </div>
                </div>

                <!-- Training Dropdown -->
                <div class="relative group">
                    <button class="{{ $linkClass }}">
                        Training <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="{{ $dropdownClass }}">
                        <span
                            class="block px-4 py-2 text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Upcoming
                        </span>
                        <span
                            class="block px-4 py-2 text-sm text-slate-500 cursor-not-allowed mx-2 opacity-50 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            ATC School
                        </span>
                        <div class="my-1 border-t border-slate-100 dark:border-white/10"></div>
                        <a href="{{ route('wiki.index') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            Wiki
                        </a>
                        <a href="{{ route('training-request') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            Training Request
                        </a>
                        <a href="{{ route('exams') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Exam Request
                        </a>
                        <a href="{{ route('gca') }}" class="{{ $itemClass }}">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                            GCA Request
                        </a>
                    </div>
                </div>
            </nav>

            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <!-- Dark Mode Toggle -->
                @include('partials.theme-toggle')

                <!-- Join IVAO CTA -->
                <a href="https://ivao.aero/register" target="_blank"
                    class="hidden md:block bg-ivao-blue text-white hover:bg-blue-800 dark:bg-white dark:text-ivao-blue dark:hover:bg-slate-100 px-5 py-2 rounded-full font-bold text-sm shadow-sm transition-all duration-200">
                    JOIN IVAO
                </a>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-slate-700 dark:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Decorative Moroccan Accent Strip -->
        <div class="h-1.5 w-full flex">
            <div class="flex-1 bg-ma-red"></div>
            <div class="flex-1 bg-ma-green"></div>
        </div>
    </header>

    <!-- Spacer for fixed header - intentionally 2px smaller to ensure zero-gap overlap -->
    <div class="h-[76px]"></div>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer
        class="bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-300 py-16 border-t border-slate-200 dark:border-slate-800 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 lg:grid-cols-5 gap-12 mb-16">
                <!-- Column 1: Division -->
                <div class="col-span-1 md:col-span-2">
                    <img src="{{ asset('images/logo-blue.png') }}" alt="IVAO Morocco"
                        class="h-16 w-auto mb-6 opacity-90 dark:hidden">
                    <img src="{{ asset('images/logo-white.png') }}" alt="IVAO Morocco"
                        class="h-16 w-auto mb-6 opacity-90 hidden dark:block">
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed max-w-sm mb-6 text-sm">
                        Official Website for the IVAO Morocco Division. <br>
                        Experience virtual aviation in the Kingdom of Morocco.
                    </p>
                </div>

                <!-- Column 2: Division -->
                <div>
                    <h4
                        class="font-bold mb-6 font-heading uppercase tracking-widest text-xs opacity-70 text-slate-900 dark:text-white">
                        Division</h4>
                    <ul class="space-y-3 text-sm font-medium">
                        <li><a href="https://www.ivao.aero/staff/division.asp?Id=MA" target="_blank"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>Staff</a></li>
                        <li><a href="{{ route('airports.index') }}"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>Airports</a>
                        </li>
                        <li><a href="https://wiki.ivao.aero/en/home/training/main/training_procedures/rating_transfer"
                                target="_blank"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>Rating Transfer</a></li>
                        <li><a href="{{ route('division-transfer') }}"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                </svg>Division Transfer</a></li>
                    </ul>
                </div>

                <!-- Column 3: Community -->
                <div>
                    <h4
                        class="font-bold mb-6 font-heading uppercase tracking-widest text-xs opacity-70 text-slate-900 dark:text-white">
                        Community</h4>
                    <ul class="space-y-3 text-sm font-medium">
                        <li><a href="#"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                                    </path>
                                </svg>Discord</a>
                        </li>
                        <li><a href="https://forum.ivao.aero/" target="_blank"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>Forum</a>
                        </li>
                        <li><a href="#"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>Support</a>
                        </li>
                        <li><a href="{{ route('coming-soon') }}"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>Training &
                                Exams</a></li>
                    </ul>
                </div>
                <!-- Column 4: Legal -->
                <div>
                    <h4
                        class="font-bold mb-6 font-heading uppercase tracking-widest text-xs opacity-70 text-slate-900 dark:text-white">
                        Legal</h4>
                    <ul class="space-y-3 text-sm font-medium">
                        <li><a href="https://wiki.ivao.aero/en/home/ivao/terms-of-use" target="_blank"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>Terms of Use</a></li>
                        <li><a href="https://wiki.ivao.aero/en/home/ivao/privacypolicy" target="_blank"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>Privacy Policy</a></li>
                        <li><a href="https://wiki.ivao.aero/en/home/ivao/intellectual-property-policy" target="_blank"
                                class="hover:text-ivao-blue dark:hover:text-white transition-colors flex items-center"><svg
                                    class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                    </path>
                                </svg>Intellectual Property Policy</a></li>
                    </ul>
                </div>
            </div>

            <div
                class="border-t border-slate-200 dark:border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 font-medium">
                <div>
                    <p>&copy; 2026, IVAO Morocco. All Right Reserved.</p>
                </div>
                <div class="mt-4 md:mt-0 text-right">
                    <p>Built by Abdellah C 710267</p>
                    <p class="opacity-50 mt-1 uppercase tracking-tighter text-[10px]">v2.6.2-STABLE</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Theme Toggle Logic -->
    <!-- Theme Toggle Logic -->
    @include('partials.theme-script')
</body>

</html>