@extends('layouts.main')

@section('title', 'Aviation Knowledge Hub')

@section('content')
    <!-- Hero Header -->
    <div class="relative bg-ivao-light text-white py-24 overflow-hidden dark:bg-slate-900 border-b-4 border-ivao-blue">
        <div class="absolute inset-0 bg-[#000000]/10 dark:bg-black/60"></div>
        <!-- Subtle Moroccan-inspired pattern overlay (optional styling) -->
        <div class="absolute inset-0 opacity-[0.03] dark:opacity-5" style="background-image: radial-gradient(#ffffff 2px, transparent 2px); background-size: 30px 30px;"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-6xl font-extrabold mb-4 font-heading tracking-tight drop-shadow-md">
                Aviation Knowledge Hub
            </h1>
            <p class="text-2xl text-slate-100 dark:text-slate-300 font-light max-w-2xl mx-auto drop-shadow-sm">
                Official documentation, procedures, and manuals for IVAO Morocco.
            </p>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-950 min-h-screen py-20 relative">
        <div class="container mx-auto px-6 max-w-6xl relative z-10">
            
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2 font-heading uppercase tracking-widest text-sm">Select a Domain</h2>
                <div class="w-16 h-1 bg-ivao-blue mx-auto rounded"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($domains as $domain)
                    <a href="{{ route('wiki.domain', $domain->slug) }}" class="group block relative bg-slate-50 dark:bg-slate-900 rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-200 dark:border-slate-800 overflow-hidden hover:-translate-y-2">
                        <!-- Decorative top accent -->
                        <div class="h-2 w-full bg-slate-200 dark:bg-slate-800 group-hover:bg-ivao-blue transition-colors duration-300"></div>
                        
                        <div class="p-8">
                            <div class="w-16 h-16 rounded-2xl bg-ivao-light/10 dark:bg-ivao-blue/20 text-ivao-blue dark:text-blue-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                @if($domain->image_url)
                                    <img src="{{ $domain->image_url }}" alt="" class="w-8 h-8 object-contain">
                                @else
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                @endif
                            </div>
                            
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-3 font-heading group-hover:text-ivao-blue transition-colors">
                                {{ $domain->name[app()->getLocale()] ?? $domain->name['en'] }}
                            </h3>
                            
                            <p class="text-slate-500 dark:text-slate-400 leading-relaxed text-sm mb-6 h-12">
                                {{ $domain->description[app()->getLocale()] ?? $domain->description['en'] ?? '' }}
                            </p>
                            
                            <div class="flex items-center text-ivao-blue font-semibold text-sm uppercase tracking-wider">
                                Explore Domain 
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            
            @if($domains->isEmpty())
                <div class="text-center py-24 bg-white dark:bg-slate-900 rounded-3xl border border-dashed border-slate-300 dark:border-slate-700">
                    <p class="text-slate-500 dark:text-slate-400 font-medium">No domains constructed yet.</p>
                </div>
            @endif
        </div>
    </div>
@endsection