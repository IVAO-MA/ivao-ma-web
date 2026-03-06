@extends('layouts.main')

@section('title', $domain->name[app()->getLocale()] ?? $domain->name['en'])

@section('content')
    <div class="bg-stone-100 dark:bg-slate-950 py-10 border-b border-stone-200 dark:border-slate-800">
        <div class="container mx-auto px-6 max-w-6xl">
            <!-- Breadcrumb -->
            <nav class="flex text-sm font-medium text-slate-500 dark:text-slate-400 mb-6">
                <a href="{{ route('wiki.index') }}" class="hover:text-ivao-blue transition-colors">Knowledge Hub</a>
                <span class="mx-3">/</span>
                <span
                    class="text-slate-800 dark:text-slate-200">{{ $domain->name[app()->getLocale()] ?? $domain->name['en'] }}</span>
            </nav>

            <h1 class="text-5xl font-extrabold text-slate-900 dark:text-white font-heading tracking-tight mb-4">
                {{ $domain->name[app()->getLocale()] ?? $domain->name['en'] }}
            </h1>
            <p class="text-xl text-slate-600 dark:text-slate-400 max-w-3xl">
                {{ $domain->description[app()->getLocale()] ?? $domain->description['en'] ?? '' }}
            </p>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-950 min-h-screen py-16">
        <div class="container mx-auto px-6 max-w-6xl">

            <div class="grid md:grid-cols-2 gap-8">
                @forelse($manuals as $manual)
                    <a href="{{ route('wiki.manual', [$domain->slug, $manual->slug]) }}"
                        class="group flex items-start p-6 bg-slate-50 dark:bg-slate-900 rounded-2xl border border-slate-100 dark:border-slate-800 hover:border-ivao-blue/30 dark:hover:border-ivao-blue/50 hover:shadow-md transition-all duration-200">
                        <div
                            class="w-14 h-14 shrink-0 rounded-xl bg-white dark:bg-slate-800 text-ivao-blue shadow-sm border border-slate-100 dark:border-slate-700 flex items-center justify-center mr-6 group-hover:scale-105 transition-transform">
                            @if($manual->image_url)
                                <img src="{{ $manual->image_url }}" class="w-7 h-7 object-contain">
                            @else
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3
                                class="text-xl font-bold text-slate-900 dark:text-white mb-2 font-heading group-hover:text-ivao-blue transition-colors">
                                {{ $manual->name[app()->getLocale()] ?? $manual->name['en'] }}
                            </h3>
                            <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                                {{ $manual->description[app()->getLocale()] ?? $manual->description['en'] ?? 'Explore the chapters and standard operating procedures within this manual.' }}
                            </p>
                        </div>
                    </a>
                @empty
                    <div
                        class="col-span-full text-center py-16 text-slate-500 dark:text-slate-400 border border-dashed border-slate-200 dark:border-slate-800 rounded-2xl">
                        No manuals published in this domain yet.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection