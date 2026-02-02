<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IVAO Morocco - @yield('title', 'Home')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Outfit (Body) and Nunito Sans (Headings) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap"
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
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            opacity: 1;
        }

        .solid-nav {
            background: #00171f;
            /* Match Footer Color */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 220px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            /* Stronger shadow */
            border-radius: 8px;
            padding: 8px 0;
            z-index: 50;
            animation: fadeIn 0.15s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
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

<body class="bg-[#F8F9FA] text-slate-800 antialiased flex flex-col min-h-screen">
    <header class="fixed w-full top-0 z-50 solid-nav shadow-md transition-all duration-300">
        <div class="container mx-auto px-6 py-2 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="block py-1">
                    <!-- Updated Logo with larger size -->
                    <img src="{{ asset('images/logo-white.png') }}" alt="IVAO Morocco"
                        class="h-14 w-auto hover:opacity-90 transition-opacity">
                </a>
            </div>

            <!-- Desktop Nav with Dropdowns -->
            <nav class="hidden lg:flex items-center space-x-6">
                <!-- Division Dropdown -->
                <div class="relative group">
                    <button
                        class="nav-link text-white/90 hover:text-white font-semibold py-4 flex items-center transition-colors">
                        Division <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">About
                            IVAO</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">About
                            Us</a>
                        <a href="https://ivao.aero/staff" target="_blank"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Staff</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">vAIP</a>
                    </div>
                </div>

                <!-- Members Dropdown -->
                <div class="relative group">
                    <button
                        class="nav-link text-white/90 hover:text-white font-semibold py-4 flex items-center transition-colors">
                        Members <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="dropdown-content">
                        <a href="https://webeye.ivao.aero" target="_blank"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Webeye</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Division
                            Transfer</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Rating
                            Transfer</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Discord</a>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Forum</a>
                    </div>
                </div>

                <!-- ATC Dropdown -->
                <div class="relative group">
                    <button
                        class="nav-link text-white/90 hover:text-white font-semibold py-4 flex items-center transition-colors">
                        ATC <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Become
                            an ATC</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">SOPs</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Software</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">FRAs</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">ATC
                            Booking</a>
                    </div>
                </div>

                <!-- Pilots Dropdown -->
                <div class="relative group">
                    <button
                        class="nav-link text-white/90 hover:text-white font-semibold py-4 flex items-center transition-colors">
                        Pilots <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Become
                            a Pilot</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Software</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">IVAO
                            Tracker</a>
                        <a href="https://tours.ivao.aero"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Tours</a>
                        <a href="{{ route('virtual-airlines.index') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Virtual
                            Airlines</a>
                    </div>
                </div>

                <!-- Training Dropdown -->
                <div class="relative group">
                    <button
                        class="nav-link text-white/90 hover:text-white font-semibold py-4 flex items-center transition-colors">
                        Training <svg class="w-4 h-4 ml-1 opacity-70" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="dropdown-content">
                        <span
                            class="block px-4 py-2 text-xs font-bold text-slate-400 uppercase tracking-wider">Upcoming</span>
                        <span class="block px-4 py-2 text-sm text-slate-500 cursor-not-allowed">ATC School</span>
                        <div class="my-1 border-t border-slate-100"></div>
                        <a href="{{ route('wiki.index') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Wiki</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Training
                            Request</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">Exam
                            Request</a>
                        <a href="{{ route('coming-soon') }}"
                            class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-ivao-blue">GCA
                            Request</a>
                    </div>
                </div>
            </nav>

            <div class="flex items-center space-x-6">
                <!-- Removed Language Switcher -->

                <!-- Join IVAO CTA -->
                <a href="https://ivao.aero/register" target="_blank"
                    class="hidden md:block bg-white text-ivao-blue hover:bg-slate-100 px-5 py-2 rounded-full font-bold text-sm shadow-sm transition-all duration-200">
                    JOIN IVAO
                </a>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white">
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

    <!-- Spacer for fixed header -->
    <div class="h-[78px]"></div>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-[#00171f] text-slate-300 py-16 border-t border-slate-800">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 lg:grid-cols-5 gap-12 mb-16">
                <!-- Column 1: Division -->
                <div class="col-span-1 md:col-span-2">
                    <img src="{{ asset('images/logo-white.png') }}" alt="IVAO Morocco"
                        class="h-16 w-auto mb-6 opacity-90">
                    <p class="text-slate-400 leading-relaxed max-w-sm mb-6 text-sm">
                        Official Website for the IVAO Morocco Division. <br>
                        Experience virtual aviation in the Kingdom of Morocco.
                    </p>
                </div>

                <!-- Column 2: Division -->
                <div>
                    <h4 class="text-white font-bold mb-6 font-heading uppercase tracking-widest text-xs opacity-70">
                        Division</h4>
                    <ul class="space-y-3 text-sm font-medium">
                        <li><a href="https://ivao.aero/staff" target="_blank"
                                class="hover:text-white transition-colors">Staff</a></li>
                        <li><a href="{{ route('coming-soon') }}" class="hover:text-white transition-colors">eAIP</a>
                        </li>
                        <li><a href="{{ route('coming-soon') }}" class="hover:text-white transition-colors">Rating
                                Transfer</a></li>
                        <li><a href="{{ route('coming-soon') }}" class="hover:text-white transition-colors">Division
                                Transfer</a></li>
                    </ul>
                </div>

                <!-- Column 3: Community -->
                <div>
                    <h4 class="text-white font-bold mb-6 font-heading uppercase tracking-widest text-xs opacity-70">
                        Community</h4>
                    <ul class="space-y-3 text-sm font-medium">
                        <li><a href="#" class="hover:text-white transition-colors">Discord</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Forum</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Support</a></li>
                        <li><a href="{{ route('coming-soon') }}" class="hover:text-white transition-colors">Training &
                                Exams</a></li>
                    </ul>
                </div>
                <!-- Column 4: Legal -->
                <div>
                    <h4 class="text-white font-bold mb-6 font-heading uppercase tracking-widest text-xs opacity-70">
                        Legal</h4>
                    <ul class="space-y-3 text-sm font-medium">
                        <li><a href="#" class="hover:text-white transition-colors">Terms of Use</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Intellectual Property Policy</a></li>
                    </ul>
                </div>
            </div>

            <div
                class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500 font-medium">
                <div>
                    <p>&copy; 2026, IVAO Morocco. All Right Reserved.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <p>Built by Abdellah C 710267</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>