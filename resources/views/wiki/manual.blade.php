@extends('layouts.main')

@section('title', $manual->name[app()->getLocale()] ?? $manual->name['en'])

@section('content')
    <div class="bg-ivao-light dark:bg-slate-950 text-white py-14 border-b-4 border-ivao-blue relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20 dark:bg-black/40"></div>
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            <!-- Breadcrumb -->
            <nav class="flex text-sm font-medium text-slate-300 dark:text-slate-400 mb-6">
                <a href="{{ route('wiki.index') }}" class="hover:text-white transition-colors">Knowledge Hub</a>
                <span class="mx-3">/</span>
                <a href="{{ route('wiki.domain', $domain->slug) }}"
                    class="hover:text-white transition-colors">{{ $domain->name[app()->getLocale()] ?? $domain->name['en'] }}</a>
                <span class="mx-3">/</span>
                <span class="text-white">{{ $manual->name[app()->getLocale()] ?? $manual->name['en'] }}</span>
            </nav>

            <h1 class="text-4xl font-extrabold text-white font-heading tracking-tight mb-4">
                {{ $manual->name[app()->getLocale()] ?? $manual->name['en'] }}
            </h1>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-950 min-h-screen py-16">
        <div class="container mx-auto px-6 max-w-4xl">

            <div
                class="bg-white dark:bg-slate-900 rounded-3xl shadow-sm border border-slate-200 dark:border-slate-800 overflow-hidden">
                <div class="p-8 border-b border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800">
                    <h2
                        class="text-xl font-bold text-slate-900 dark:text-white uppercase tracking-wider text-sm font-heading">
                        Table of Contents
                    </h2>
                </div>

                <div class="divide-y divide-slate-100 dark:divide-slate-800/50">
                    @forelse($articles as $index => $article)
                        <a href="{{ route('wiki.article', [$domain->slug, $manual->slug, $article->slug]) }}"
                            class="flex items-center p-6 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors group">
                            <div
                                class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 font-bold flex items-center justify-center mr-6 group-hover:bg-ivao-blue group-hover:text-white transition-colors">
                                {{ $index + 1 }}
                            </div>
                            <div class="flex-grow">
                                <h3
                                    class="text-lg font-bold text-slate-900 dark:text-slate-100 group-hover:text-ivao-blue transition-colors">
                                    {{ $article->title[app()->getLocale()] ?? $article->title['en'] }}
                                </h3>
                            </div>
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-ivao-blue group-hover:translate-x-1 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @empty
                        <div class="p-12 text-center text-slate-500 dark:text-slate-400">
                            Chapters are currently being drafted for this manual.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection