@extends('layouts.main')

@section('title', 'Virtual Airlines - IVAO Morocco')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-ivao-blue to-blue-900 text-white py-24">
        <div class="container mx-auto px-6 text-center">
            <!-- IVAO Partner VA Badge -->
            <div class="mb-6">
                <img src="{{ asset('images/ivao-partner-va.svg') }}" alt="IVAO Partner Virtual Airlines" class="h-20 w-auto mx-auto">
            </div>
            
            <h1 class="text-5xl font-bold mb-4">Certified Virtual Airlines</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Discover and join the certified Virtual Airlines operating within the IVAO Morocco division. 
                These VAs are officially recognized and provide quality flight simulation experiences.
            </p>
        </div>
    </section>

    <!-- Virtual Airlines Grid -->
    <section class="py-20 bg-white dark:bg-slate-900 transition-colors duration-300">
        <div class="container mx-auto px-6">
            @if($virtualAirlines->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($virtualAirlines as $va)
                        <div class="bg-[#F8F9FA] dark:bg-slate-800 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 hover:shadow-xl transition-all duration-300 group">
                            <!-- Logo Section -->
                            <div class="h-48 bg-white dark:bg-slate-700 flex items-center justify-center p-8 border-b border-slate-200 dark:border-slate-600">
                                @if($va->logo_url)
                                    <img src="{{ $va->logo_url }}" alt="{{ $va->name }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="text-center">
                                        <svg class="w-20 h-20 mx-auto text-slate-400 dark:text-slate-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        <p class="text-2xl font-bold text-slate-700 dark:text-slate-300">{{ $va->name }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Content Section -->
                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">{{ $va->name }}</h3>
                                
                                @if($va->callsign_prefix)
                                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">
                                        <span class="font-semibold">Callsign:</span> {{ $va->callsign_prefix }}
                                    </p>
                                @endif

                                @if($va->description)
                                    <p class="text-slate-600 dark:text-slate-300 mb-6 line-clamp-3">
                                        {{ $va->description }}
                                    </p>
                                @endif

                                <!-- Hubs -->
                                @if($va->hubs && count($va->hubs) > 0)
                                    <div class="mb-4">
                                        <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-2">Hubs</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($va->hubs as $hub)
                                                <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs font-semibold px-3 py-1 rounded-full">
                                                    {{ $hub }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Aircraft -->
                                @if($va->aircraft && count($va->aircraft) > 0)
                                    <div class="mb-6">
                                        <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wide mb-2">Fleet</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($va->aircraft as $plane)
                                                <span class="bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 text-xs font-semibold px-3 py-1 rounded-full">
                                                    {{ $plane }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Links -->
                                <div class="flex gap-3">
                                    @if($va->website_url)
                                        <a href="{{ $va->website_url }}" target="_blank" rel="noopener noreferrer" 
                                           class="flex-1 bg-ivao-blue text-white text-center py-2 px-4 rounded-lg font-semibold hover:bg-blue-900 transition-colors duration-300">
                                            Visit Website
                                        </a>
                                    @endif
                                    
                                    @if($va->discord_url)
                                        <a href="{{ $va->discord_url }}" target="_blank" rel="noopener noreferrer" 
                                           class="bg-[#5865F2] text-white py-2 px-4 rounded-lg font-semibold hover:bg-[#4752C4] transition-colors duration-300 flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                                            </svg>
                                            Discord
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <svg class="w-24 h-24 mx-auto text-slate-300 dark:text-slate-600 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">No Virtual Airlines Yet</h3>
                    <p class="text-slate-600 dark:text-slate-400 max-w-md mx-auto">
                        There are currently no certified virtual airlines in the Morocco division. Check back soon!
                    </p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-[#F8F9FA] dark:bg-slate-800 border-t border-slate-200 dark:border-slate-700 transition-colors duration-300">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">Want to Register Your Virtual Airline?</h2>
            <p class="text-slate-600 dark:text-slate-400 mb-8 max-w-2xl mx-auto">
                If you operate a virtual airline and would like to become certified with IVAO Morocco, 
                please contact our staff team for more information.
            </p>
            <a href="mailto:ma-wm@ivao.aero" class="inline-block bg-ivao-blue text-white py-3 px-8 rounded-lg font-bold hover:bg-blue-900 transition-colors duration-300">
                Contact Us
            </a>
        </div>
    </section>
@endsection
