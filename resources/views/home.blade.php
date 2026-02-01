@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-ivao-blue text-white min-h-[85vh] flex items-center justify-center overflow-hidden">
        <!-- Hero Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.jpeg') }}" alt="Morocco Aviation" class="w-full h-full object-cover">
            <!-- Dark Gradient Overlay for Text Readability -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-black/30"></div> <!-- Extra solid dimming -->
        </div>

        <div class="relative z-20 max-w-6xl mx-auto text-center px-6 mt-10">
            <div class="mb-6 inline-block">
                <span
                    class="py-1 px-4 rounded-full bg-white/20 border border-white/30 text-sm font-bold tracking-widest uppercase text-white shadow-sm backdrop-blur-sm">
                    Welcome on Board
                </span>
            </div>
            <h1
                class="text-6xl md:text-9xl font-extrabold mb-8 tracking-tighter leading-none text-white drop-shadow-2xl font-heading">
                WELCOME TO <br /> <span class="text-white">MOROCCO</span>
            </h1>
            <p
                class="text-xl md:text-2xl text-slate-100 mb-12 font-light max-w-2xl mx-auto leading-relaxed drop-shadow-lg text-shadow-sm">
                The Gateway to Africa. Discover a land of diverse landscapes, rich culture, and challenging aviation
                adventures.
            </p>

            <div class="flex flex-col sm:flex-row gap-8 justify-center items-center">
                <a href="#"
                    class="px-10 py-5 bg-ma-red text-white font-bold text-lg rounded-full hover:bg-red-700 hover:scale-105 transition-all duration-200 shadow-xl uppercase tracking-wide border-2 border-transparent hover:border-white/20">
                    START FLYING
                </a>
                <a href="https://ivao.aero/register" target="_blank"
                    class="px-10 py-5 bg-white text-ivao-blue font-bold text-lg rounded-full hover:bg-gray-100 hover:scale-105 transition-all duration-200 shadow-xl uppercase tracking-wide">
                    JOIN IVAO
                </a>
            </div>
        </div>
    </section>

    <!-- Quick Actions Grid -->
    <section class="relative z-30 -mt-24 mx-6 md:mx-auto max-w-7xl">
        <div class="bg-white rounded-2xl p-1.5 border border-slate-200 shadow-2xl">
            <div class="bg-slate-50 rounded-xl p-6 grid grid-cols-2 md:grid-cols-6 gap-4">
                <!-- Get Started -->
                <a href="{{ route('coming-soon') }}"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-ivao-blue/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-ivao-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-ivao-blue transition-colors">Get
                        Started!</span>
                </a>
                <!-- Discord -->
                <a href="#"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-[#5865F2]/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-[#5865F2]" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1892.3775-.2842a.074.074 0 01.0783-.0105c3.9269 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1258.095.2517.1891.3775.283a.077.077 0 01-.0069.1287c-.5969.343-1.2185.644-1.8711.8916a.0758.0758 0 00-.0419.1064c.3529.7001.7643 1.3649 1.226 1.9942a.0766.0766 0 00.0842.0276c1.9507-.6066 3.9402-1.5219 6.002-3.0294a.077.077 0 00.0313-.055c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419z" />
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-[#5865F2] transition-colors">Discord</span>
                </a>
                <!-- Wiki -->
                <a href="{{ route('wiki.index') }}"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-ivao-light/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-ivao-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-ivao-light transition-colors">Wiki</span>
                </a>
                <!-- Charts -->
                <a href="{{ route('airports.index') }}"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-ma-red/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-ma-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-ma-red transition-colors">Charts</span>
                </a>
                <!-- Sectorfiles -->
                <a href="{{ route('coming-soon') }}"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-ivao-green/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-ivao-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-ivao-green transition-colors">Sectorfiles</span>
                </a>
                <!-- Tours -->
                <a href="https://tours.ivao.aero" target="_blank"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-stone-500/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-stone-500 transition-colors">Tours</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Live Event Banner -->
    @if(isset($liveEvent) && $liveEvent && !session('dismissed_live_event_' . $liveEvent->id))
        <div id="liveEventBanner"
            class="bg-gradient-to-r from-red-600 via-red-500 to-orange-500 text-white py-4 relative overflow-hidden">
            <!-- Animated background -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white to-transparent animate-pulse"></div>
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-4 flex-1">
                        <!-- Live Indicator -->
                        <div class="flex items-center gap-2">
                            <span class="relative flex h-3 w-3">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                            </span>
                            <span class="font-bold text-sm uppercase tracking-wider">LIVE NOW</span>
                        </div>

                        <!-- Event Info -->
                        <div class="flex-1">
                            <h3 class="font-bold text-lg">{{ $liveEvent->title }}</h3>
                            <p class="text-sm opacity-90">
                                Ends {{ $liveEvent->end_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="flex items-center gap-4">
                        @if($liveEvent->url)
                            <a href="{{ $liveEvent->url }}" target="_blank"
                                class="px-6 py-2 bg-white text-red-600 font-bold rounded-full hover:bg-gray-100 transition-colors shadow-lg">
                                Join Event
                            </a>
                        @endif

                        <!-- Dismiss Button -->
                        <form action="{{ route('dismiss-live-event', $liveEvent->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white hover:text-gray-200 transition-colors p-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- About Section -->
    <section class="py-24 bg-[#F8F9FA]">
        <div class="container mx-auto px-6">
            <div class="flex flex-col items-center justify-center text-center max-w-4xl mx-auto mb-16">
                <!-- Brand Logo (SVG) -->
                <img src="{{ asset('images/logo.svg') }}" class="w-auto h-24 mb-8" alt="IVAO Logo">
                <h2 class="text-4xl font-extrabold text-slate-900 mb-6 font-heading leading-tight">
                    IVAO – International Virtual<br>Aviation Organisation
                </h2>

                <div class="prose prose-lg text-slate-600 mb-10">
                    <p>
                        IVAO is a dedicated, independent, free of charge, service to enthusiasts and individuals
                        enjoying and participating in the flight simulation community worldwide.
                    </p>
                    <p>
                        You will find the IVAO Morocco website full of resources to make your online flying or
                        controlling enjoyable. We welcome members with all levels of experience in aviation.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 items-center justify-center">
                    <p class="font-bold text-slate-800 text-lg">Are you interested?</p>
                    <a href="https://ivao.aero/members/person/register.htm" target="_blank"
                        class="px-8 py-3 bg-ivao-blue text-white font-bold rounded-full hover:bg-blue-900 transition-colors shadow-lg shadow-blue-500/30">
                        Sign up today!
                    </a>
                </div>
            </div>

            <!-- Resource Cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Training Card -->
                <a href="https://training.ivao.aero" target="_blank"
                    class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                    <div
                        class="w-16 h-16 mx-auto bg-blue-50 text-ivao-blue rounded-2xl flex items-center justify-center mb-6 group-hover:bg-ivao-blue group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-ivao-blue transition-colors">Training
                    </h3>
                    <p class="text-slate-500 leading-relaxed">Access comprehensive training materials and documentation for
                        pilots and controllers to enhance your skills.</p>
                </a>

                <!-- Wiki Card -->
                <a href="{{ route('wiki.index') }}"
                    class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                    <div
                        class="w-16 h-16 mx-auto bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-emerald-600 transition-colors">Wiki MA
                    </h3>
                    <p class="text-slate-500 leading-relaxed">Explore the official IVAO Morocco Wiki for detailed
                        procedures, charts, and operational information.</p>
                </a>

                <!-- Learning Pathways Card -->
                <a href="{{ route('learning-pathways.index') }}"
                    class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                    <div
                        class="w-16 h-16 mx-auto bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-orange-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-orange-600 transition-colors">Learning
                        Pathways
                    </h3>
                    <p class="text-slate-500 leading-relaxed">Discover your progression path from beginner to expert pilot
                        or controller.</p>
                </a>

                <!-- vAIP Card -->
                <a href="#"
                    class="group bg-white p-8 rounded-2xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                    <div
                        class="w-16 h-16 mx-auto bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-purple-600 transition-colors">vAIP
                        Morocco</h3>
                    <p class="text-slate-500 leading-relaxed">Navigate Morocco's virtual airspace with our integrated
                        Aeronautical Information Publication tool.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- News & Announcements Section -->
    @if($announcements->count() > 0)
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="flex items-center justify-between mb-12">
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900 mb-2">News & Announcements</h2>
                        <p class="text-slate-500">Stay updated with the latest from IVAO Morocco</p>
                    </div>
                </div>

                <!-- Adaptive Grid: 1 announcement = centered max-w-2xl, 2 = grid-cols-2, 3+ = grid-cols-3 -->
                <div
                    class="@if($announcements->count() == 1) max-w-2xl mx-auto @elseif($announcements->count() == 2) grid md:grid-cols-2 gap-8 @else grid md:grid-cols-3 gap-8 @endif">
                    @foreach($announcements as $announcement)
                        <div class="bg-[#F8F9FA] rounded-2xl overflow-hidden border border-slate-200 hover:shadow-xl transition-all duration-300 cursor-pointer group"
                            onclick="openAnnouncementModal({{ $announcement->id }})">

                            <!-- Featured Image -->
                            @if($announcement->image_url)
                                <div class="h-48 w-full overflow-hidden bg-slate-200">
                                    <img src="{{ $announcement->image_url }}" alt="{{ $announcement->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @endif

                            <div class="p-8">
                                @if($announcement->is_pinned)
                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 bg-ivao-blue text-white text-xs font-bold rounded-full mb-4">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                            </path>
                                        </svg>
                                        PINNED
                                    </div>
                                @endif

                                <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                                    <span
                                        class="px-2 py-1 bg-slate-200 rounded-full font-semibold uppercase">{{ $announcement->type }}</span>
                                    <span>{{ $announcement->published_at ? $announcement->published_at->format('M d, Y') : 'Draft' }}</span>
                                </div>

                                <h3 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-ivao-blue transition-colors">
                                    {{ $announcement->title }}
                                </h3>
                                <p class="text-slate-600 leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($announcement->content), 120) }}
                                </p>

                                <div class="mt-4 text-ivao-blue font-semibold text-sm flex items-center gap-2">
                                    Read more
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden data for modal -->
                        <div id="announcement-data-{{ $announcement->id }}" class="hidden" data-title="{{ $announcement->title }}"
                            data-type="{{ $announcement->type }}"
                            data-date="{{ $announcement->published_at ? $announcement->published_at->format('M d, Y') : 'Draft' }}"
                            data-content="{{ htmlspecialchars($announcement->content) }}"
                            data-image="{{ $announcement->image_url ?? '' }}" data-link="{{ $announcement->link_url ?? '' }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Announcement Modal -->
        <div id="announcementModal"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4"
            onclick="closeAnnouncementModal(event)">
            <div class="bg-white rounded-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
                <div id="modalContent"></div>
            </div>
        </div>

        <script>
            function openAnnouncementModal(id) {
                const data = document.getElementById('announcement-data-' + id);
                const modal = document.getElementById('announcementModal');
                const modalContent = document.getElementById('modalContent');

                const title = data.dataset.title;
                const type = data.dataset.type;
                const date = data.dataset.date;
                const content = data.dataset.content;
                const image = data.dataset.image;
                const link = data.dataset.link;

                let html = '';

                if (image) {
                    html += `<div class="w-full h-64 overflow-hidden rounded-t-2xl"><img src="${image}" alt="${title}" class="w-full h-full object-cover"></div>`;
                }

                html += `
                                <div class="p-8">
                                    <div class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                                        <span class="px-2 py-1 bg-slate-200 rounded-full font-semibold uppercase">${type}</span>
                                        <span>${date}</span>
                                    </div>
                                    <h2 class="text-3xl font-bold text-slate-900 mb-6">${title}</h2>
                                    <div class="prose prose-lg max-w-none text-slate-600">${content}</div>
                            `;

                if (link) {
                    html += `
                                    <div class="mt-8 pt-6 border-t border-slate-200">
                                        <a href="${link}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-ivao-blue text-white font-bold rounded-full hover:bg-blue-900 transition-colors">
                                            Learn More
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </a>
                                    </div>
                                `;
                }

                html += `
                                    <button onclick="closeAnnouncementModal(event)" class="mt-6 text-slate-500 hover:text-slate-700 font-semibold">Close</button>
                                </div>
                            `;

                modalContent.innerHTML = html;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeAnnouncementModal(event) {
                event.stopPropagation();
                const modal = document.getElementById('announcementModal');
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            // Close modal on Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeAnnouncementModal(e);
                }
            });
        </script>
    @endif

    <!-- Get Started Section (Keeping this for reference) -->
    <section class="d-none">
        <div class="d-none">
            <div class="d-none">
                <div class="d-none">
                    @if(false)
                        <div class="w-full mt-6">
                            <div class="flex items-center justify-between mb-4 pb-2 border-b border-slate-200">
                                <h3 class="text-xl font-bold text-slate-700 flex items-center gap-2">
                                    <span class="block w-2.5 h-2.5 rounded-full bg-ivao-blue animate-pulse"></span>
                                    UPCOMING EVENTS
                                </h3>
                                <a href="https://ivao.aero/events" target="_blank"
                                    class="text-xs font-bold text-ivao-blue hover:underline">View All &rarr;</a>
                            </div>

                            <div class="relative">
                                <!-- Horizontal Scroll Container -->
                                <div
                                    class="flex gap-4 overflow-x-auto pb-4 snap-x snap-mandatory scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-transparent">
                                    @foreach($ivaoEvents as $apiEvent)
                                        <a href="{{ $apiEvent['infoUrl'] ?? '#' }}" target="_blank"
                                            class="min-w-[280px] w-[280px] md:min-w-[300px] snap-center bg-slate-800 rounded-xl shadow-lg border border-slate-700 overflow-hidden group hover:-translate-y-1 hover:border-[#4d9eff] transition-all duration-300 block relative">

                                            <!-- Image Banner -->
                                            <div class="h-32 w-full bg-slate-900 relative">
                                                @if(!empty($apiEvent['imageUrl']))
                                                    <img src="{{ $apiEvent['imageUrl'] }}" alt="{{ $apiEvent['title'] }}"
                                                        class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-slate-600">
                                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif

                                                <!-- Type Badge -->
                                                @php
                                                    $typeColor = match (strtolower($apiEvent['eventType'] ?? '')) {
                                                        'fly-in' => 'bg-emerald-500',
                                                        'fly-out' => 'bg-orange-500',
                                                        'exam' => 'bg-red-500',
                                                        'rfe' => 'bg-purple-500',
                                                        default => 'bg-slate-500'
                                                    };
                                                @endphp
                                                <div
                                                    class="absolute top-3 left-3 px-2 py-1 rounded text-[10px] font-bold text-white uppercase tracking-wider {{ $typeColor }} shadow-sm">
                                                    {{ $apiEvent['eventType'] ?? 'Event' }}
                                                </div>

                                                <!-- HQE Badge -->
                                                @if(isset($apiEvent['hqeAward']) && $apiEvent['hqeAward'])
                                                    <div class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 p-1 rounded-full shadow-sm"
                                                        title="HQE Award Supported">
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                            <path
                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Content -->
                                            <div class="p-4 bg-[#141e2e]">
                                                <h4
                                                    class="text-[#c8d6e5] font-bold leading-tight mb-2 line-clamp-2 h-10 group-hover:text-[#4d9eff] transition-colors">
                                                    {{ $apiEvent['title'] }}
                                                </h4>
                                                <div class="flex items-center gap-2 mb-3 text-xs text-slate-400">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <span>
                                                        {{ \Carbon\Carbon::parse($apiEvent['startDate'])->format('d M') }}
                                                        @if(\Carbon\Carbon::parse($apiEvent['startDate'])->format('d M') !== \Carbon\Carbon::parse($apiEvent['endDate'])->format('d M'))
                                                            – {{ \Carbon\Carbon::parse($apiEvent['endDate'])->format('d M') }}
                                                        @endif
                                                    </span>
                                                </div>

                                                <!-- Airports -->
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach(array_slice($apiEvent['airports'] ?? [], 0, 3) as $apt)
                                                        <span
                                                            class="px-1.5 py-0.5 rounded text-[10px] font-mono bg-slate-700 text-slate-300 border border-slate-600">{{ $apt }}</span>
                                                    @endforeach
                                                    @if(count($apiEvent['airports'] ?? []) > 3)
                                                        <span
                                                            class="px-1.5 py-0.5 rounded text-[10px] text-slate-500">+{{ count($apiEvent['airports']) - 3 }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            // Footer Traffic Tabs
                            const trafficTabs = document.querySelectorAll('.traffic-tab');
                            const trafficPanels = {
                                'dep-table': document.getElementById('footer-traffic-dep'),
                                'arr-table': document.getElementById('footer-traffic-arr')
                            };



                            let countdown = 60;
                            let timer;

                            // Initial data from server

                            const initialDep = @json($flights['departures'] ?? []);
                            const initialArr = @json($flights['arrivals'] ?? []);


                            renderTable('footer-traffic-dep', initialDep, 'departures');
                            renderTable('footer-traffic-arr', initialArr, 'arrivals');

                            // --- Tab logic (Footer) ---
                            trafficTabs.forEach(tab => {
                                tab.addEventListener('click', (e) => {
                                    e.preventDefault();
                                    const target = tab.dataset.tab;

                                    // Update Tab UI
                                    trafficTabs.forEach(t => {
                                        t.classList.remove('active', 'border-ivao-blue', 'text-slate-700');
                                        t.classList.add('border-transparent', 'text-slate-500');
                                    });
                                    tab.classList.add('active', 'border-ivao-blue', 'text-slate-700');
                                    tab.classList.remove('border-transparent', 'text-slate-500');

                                    // Show Panel
                                    Object.values(trafficPanels).forEach(p => {
                                        if (p) p.classList.add('hidden');
                                    });
                                    if (trafficPanels[target]) {
                                        trafficPanels[target].classList.remove('hidden');
                                    }
                                });
                            });

                            // --- Countdown + refresh ---
                            function tick() {
                                const el = document.getElementById('countdown');
                                if (countdown <= 0) { refresh(); countdown = 60; }
                                countdown--;
                            }
                            timer = setInterval(tick, 1000);

                            function refresh() {
                                fetch('{{ route("ivao.refresh") }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                                    }
                                })
                                    .then(r => r.json())
                                    .then(data => {
                                        if (data.error) return;

                                        // Update Footer Tables
                                        renderTable('footer-traffic-dep', data.departures, 'departures');
                                        renderTable('footer-traffic-arr', data.arrivals, 'arrivals');

                                        // Update Counts
                                        const depCount = document.getElementById('footer-dep-count');
                                        const arrCount = document.getElementById('footer-arr-count');
                                        if (depCount) depCount.textContent = data.departures.length;
                                        if (arrCount) arrCount.textContent = data.arrivals.length;

                                        // Update Timestamps
                                        const timeStr = formatUTC(data.updatedAt);
                                        const ftrTime = document.getElementById('footer-last-updated');
                                        if (ftrTime) ftrTime.textContent = timeStr;


                                    })
                                    .catch(e => console.error('IVAO refresh failed:', e));
                            }

                            function renderTable(panelId, items, type) {
                                const panel = document.getElementById(panelId);
                                if (!panel) return;

                                if (!items || items.length === 0) {
                                    panel.innerHTML = '<div class="p-8 text-center text-slate-500 italic">No active ' + type + ' at the moment.</div>';
                                    return;
                                }

                                let html = '<table class="min-w-full text-left text-sm whitespace-nowrap">';
                                html += '<thead class="uppercase tracking-wider border-b border-slate-200 bg-slate-50 text-slate-500">';
                                html += '<tr><th class="px-6 py-3">Callsign</th><th class="px-6 py-3">VID</th><th class="px-6 py-3">Route</th><th class="px-6 py-3">Aircraft</th><th class="px-6 py-3">Status</th></tr></thead>';
                                html += '<tbody class="divide-y divide-slate-100">';

                                items.forEach(f => {
                                    const stateClass = getStateClass(f.state, f.onGround);
                                    const vidHtml = f.userId
                                        ? `<a href="https://ivao.aero/Member.aspx?ID=${f.userId}" target="_blank" class="hover:text-ivao-blue underline decoration-slate-300 underline-offset-2">${f.userId}</a>`
                                        : '—';
                                    html += `<tr class="hover:bg-slate-50/50 transition-colors">
                                                                        <td class="px-6 py-3 font-bold text-slate-700">${f.callsign}</td>
                                                                        <td class="px-6 py-3 text-slate-600">${vidHtml}</td>
                                                                        <td class="px-6 py-3 text-slate-600"><strong>${f.departure}</strong> &rarr; <strong>${f.arrival}</strong></td>
                                                                        <td class="px-6 py-3 text-slate-600">${f.aircraft}</td>
                                                                        <td class="px-6 py-3"><span class="px-2 py-1 rounded text-xs font-bold ${stateClass}">${f.state}</span></td>
                                                                    </tr>`;
                                });
                                html += '</tbody></table>';
                                panel.innerHTML = html;
                            }

                            function renderAirportList(items) {
                                if (!airportContainer) return;

                                if (!items || items.length === 0) {
                                    airportContainer.innerHTML = '<div class="p-4 text-center text-slate-400 text-sm italic">No data available.</div>';
                                    return;
                                }

                                let html = '';
                                items.forEach(a => {
                                    // Simple mapping for names could be done here or handled by backend completely. 
                                    // For now we use ICAO.
                                    const name = getAirportName(a.icao);

                                    html += `<a href="/airports/${a.icao}" class="block p-4 flex items-center justify-between hover:bg-slate-50 transition-colors group border-l-4 border-transparent hover:border-ivao-blue">
                                                                        <div class="flex items-center gap-3">
                                                                            <div class="w-10 h-10 rounded-lg bg-ivao-blue/5 text-ivao-blue flex items-center justify-center font-bold text-sm">
                                                                                ${a.icao.substr(2)}
                                                                            </div>
                                                                            <div>
                                                                                <div class="font-bold text-slate-700 text-sm group-hover:text-ivao-blue transition-colors">
                                                                                     ${a.icao}
                                                                                </div>
                                                                                <div class="text-xs text-slate-400 font-medium truncate w-32">
                                                                                    ${name}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <span class="px-2 py-1 rounded-md text-xs font-bold ${a.total > 0 ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-400'}">
                                                                                ${a.total} <span class="font-normal opacity-70">flights</span>
                                                                            </span>
                                                                        </div>
                                                                    </a>`;
                                });
                                airportContainer.innerHTML = html;
                            }

                            function getAirportName(icao) {
                                const names = {
                                    'GMMN': 'Casablanca Mohammed V',
                                    'GMME': 'Rabat Salé',
                                    'GMMX': 'Marrakech Menara',
                                    'GMFF': 'Fes Saiss',
                                    'GMAD': 'Agadir Al Massira',
                                    'GMMT': 'Tetouan Sania Ramel',
                                    'GMMI': 'Essaouira Mogador',
                                    'GMML': 'Laayoune Hassan I',
                                    'GMFM': 'Casablanca Tit Mellil',
                                    'GMFO': 'Oujda Angads',
                                    'GMTA': 'Al Hoceima Cherif Al I.'
                                };
                                return names[icao] || 'Morocco Airport';
                            }

                            function getStateClass(state, onGround) {
                                if (onGround) return 'bg-amber-100 text-amber-700';
                                return 'bg-sky-100 text-sky-700';
                            }

                            function formatUTC(iso) {
                                if (!iso) return '—';
                                const d = new Date(iso);
                                return d.getUTCHours().toString().padStart(2, '0') + ':' + d.getUTCMinutes().toString().padStart(2, '0');
                            }
                        });
                    </script>
                </div>
            </div>
    </section>

    <!-- Division Calendar Schedule -->
    <section class="py-20 bg-white border-y border-slate-200">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-4 font-heading tracking-tight">Division Schedule</h2>
                <p class="text-slate-500">Upcoming events, exams, and training sessions.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($events as $event)
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 w-1.5 h-full {{ $event->type == 'Exam' ? 'bg-ma-red' : 'bg-ivao-blue' }}">
                        </div>
                        <span
                            class="inline-block px-3 py-1 {{ $event->type == 'Exam' ? 'bg-red-50 text-ma-red' : 'bg-blue-50 text-ivao-blue' }} text-xs font-bold rounded-full mb-3 uppercase tracking-wide">{{ $event->type }}</span>
                        <h3 class="font-bold text-slate-800 text-lg mb-1 group-hover:text-ivao-blue transition-colors">
                            {{ $event->title[app()->getLocale()] ?? $event->title['en'] ?? 'Untitled' }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-4">{{ $event->start_at->format('l, d M • Hi') }}z</p>
                        <a href="{{ route('events.index') }}"
                            class="text-sm font-bold {{ $event->type == 'Exam' ? 'text-ma-red' : 'text-ivao-blue' }} hover:underline">{{ $event->type == 'Exam' ? 'Details' : 'View Details' }}
                            &rarr;</a>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-10">
                        <p class="text-slate-500">No upcoming events scheduled.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12 flex justify-center">
                <a href="{{ route('events.index') }}"
                    class="px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-full hover:bg-slate-200 transition-colors">
                    View Full Calendar
                </a>
            </div>
        </div>
    </section>

    <!-- Live Traffic Table -->
    <section class="py-16 bg-white border-t border-slate-200">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 font-heading tracking-tight">Live Traffic</h2>
                    <p class="text-slate-500 mt-2">Real-time flight operations in Moroccan airspace.</p>
                </div>
                <div class="text-right">
                    <span
                        class="text-sm text-slate-400 font-mono bg-slate-50 px-3 py-1 rounded-full border border-slate-100">
                        Map Update: <span
                            id="footer-last-updated">{{ date('H:i', strtotime($flights['updatedAt'] ?? 'now')) }}</span> z
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <!-- Traffic Tabs -->
                <div class="flex border-b border-slate-200 bg-slate-50/50">
                    <button
                        class="traffic-tab active px-6 py-4 text-sm font-bold text-slate-700 border-b-2 border-ivao-blue cursor-pointer hover:bg-slate-50 transition-colors"
                        data-tab="dep-table">
                        Departures <span class="ml-2 bg-slate-200 text-slate-600 py-0.5 px-2 rounded-full text-xs"
                            id="footer-dep-count">{{ count($flights['departures']) }}</span>
                    </button>
                    <button
                        class="traffic-tab px-6 py-4 text-sm font-bold text-slate-500 border-b-2 border-transparent hover:text-slate-700 cursor-pointer hover:bg-slate-50 transition-colors"
                        data-tab="arr-table">
                        Arrivals <span class="ml-2 bg-slate-200 text-slate-600 py-0.5 px-2 rounded-full text-xs"
                            id="footer-arr-count">{{ count($flights['arrivals']) }}</span>
                    </button>
                </div>

                <!-- Table Content -->
                <div class="p-0">
                    <div id="footer-traffic-dep" class="traffic-panel block">
                        @include('partials._ivao_table', ['flights' => $flights['departures'], 'type' => 'departures'])
                    </div>
                    <div id="footer-traffic-arr" class="traffic-panel hidden">
                        @include('partials._ivao_table', ['flights' => $flights['arrivals'], 'type' => 'arrivals'])
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certified VAs Section -->
    <section class="py-20 bg-[#F8F9FA] border-t border-slate-200">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-12 font-heading tracking-tight">Our Certified VAs</h2>
            <div class="flex flex-wrap justify-center gap-12 items-center">
                <!-- SkyAlliance Placeholder -->
                <div
                    class="group relative flex items-center justify-center p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                    <span
                        class="text-3xl font-black text-slate-800 tracking-tighter group-hover:text-ma-red transition-colors">
                        SkyAlliance <span class="bg-ma-red text-white px-2 py-0.5 rounded ml-1">S</span>
                    </span>
                </div>
            </div>
        </div>
    </section>
@endsection