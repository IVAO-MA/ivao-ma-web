@extends('layouts.main')

@section('title', $article->title[app()->getLocale()] ?? $article->title['en'])

@section('content')
    <div class="bg-ivao-light dark:bg-slate-950 text-white py-12 border-b border-ivao-blue/30 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20 dark:bg-black/40"></div>
        <div class="container mx-auto px-6 max-w-7xl relative z-10 flex flex-col md:flex-row md:items-end justify-between">
            <div>
                <!-- Breadcrumb -->
                <nav class="flex text-sm font-medium text-slate-300 dark:text-slate-400 mb-4">
                    <a href="{{ route('wiki.index') }}" class="hover:text-white transition-colors">Knowledge Hub</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('wiki.domain', $domain->slug) }}" class="hover:text-white transition-colors">{{ $domain->name[app()->getLocale()] ?? $domain->name['en'] }}</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('wiki.manual', [$domain->slug, $manual->slug]) }}" class="hover:text-white transition-colors">{{ $manual->name[app()->getLocale()] ?? $manual->name['en'] }}</a>
                </nav>

                <h1 class="text-4xl md:text-5xl font-extrabold text-white font-heading tracking-tight">
                    {{ $article->title[app()->getLocale()] ?? $article->title['en'] }}
                </h1>
            </div>
            
            <div class="mt-6 md:mt-0 text-sm font-medium text-slate-300 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Last updated {{ $article->updated_at->diffForHumans() }}
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-950 min-h-screen py-12">
        <div class="container mx-auto px-6 max-w-7xl grid md:grid-cols-12 gap-10">
            
            <!-- Sidebar Navigation -->
            <div class="md:col-span-4 lg:col-span-3">
                <div class="bg-slate-50 dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-800 p-6 sticky top-24">
                    <h3 class="font-bold text-slate-800 dark:text-slate-100 mb-4 uppercase tracking-wider text-xs border-b border-slate-100 dark:border-slate-800 pb-3 font-heading flex items-center">
                        <svg class="w-4 h-4 mr-2 text-ivao-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                        Chapters in this Manual
                    </h3>
                    <ul class="space-y-1">
                        @foreach($sidebarArticles as $sideArticle)
                            <li>
                                <a href="{{ route('wiki.article', [$domain->slug, $manual->slug, $sideArticle->slug]) }}" 
                                   class="block px-3 py-2 rounded-lg text-sm font-medium transition-colors
                                   {{ $sideArticle->id === $article->id 
                                        ? 'bg-ivao-blue/10 dark:bg-ivao-blue/20 text-ivao-blue border-l-2 border-ivao-blue' 
                                        : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-slate-200 border-l-2 border-transparent' }}">
                                    {{ $sideArticle->title[app()->getLocale()] ?? $sideArticle->title['en'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Article Content -->
            <div class="md:col-span-8 lg:col-span-9 bg-white dark:bg-slate-900 rounded-3xl shadow-sm border border-slate-200 dark:border-slate-800 p-8 md:p-12">
                @php
                    $blocks = $article->content[app()->getLocale()] ?? $article->content['en'] ?? [];
                @endphp
                
                @if(empty($blocks))
                    <div class="text-center py-20 text-slate-500 dark:text-slate-400 italic">
                        This article is currently empty.
                    </div>
                @else
                    <div class="space-y-8">
                        @foreach($blocks as $block)
                            @switch($block['type'])
                                @case('markdown')
                                    <div class="prose prose-stone prose-lg dark:prose-invert max-w-none">
                                        {!! \Illuminate\Support\Str::markdown($block['data']['body'] ?? '') !!}
                                    </div>
                                    @break

                                @case('aviation_alert')
                                    @php
                                        $type = $block['data']['type'] ?? 'tip';
                                        $styles = [
                                            'notam' => 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800 text-red-800 dark:text-red-200',
                                            'regulation' => 'bg-amber-50 dark:bg-amber-900/20 border-amber-200 dark:border-amber-800 text-amber-800 dark:text-amber-200',
                                            'tip' => 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800 text-blue-800 dark:text-blue-200',
                                        ];
                                        $icons = [
                                            'notam' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>',
                                            'regulation' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>',
                                            'tip' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
                                        ];
                                        $titles = [
                                            'notam' => 'NOTAM / Warning',
                                            'regulation' => 'Regulation',
                                            'tip' => 'ATC / Pilot Tip',
                                        ];
                                    @endphp
                                    <div class="rounded-2xl border p-6 flex {{ $styles[$type] }}">
                                        <div class="shrink-0 mr-4 mt-1">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                {!! $icons[$type] !!}
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-bold mb-1 tracking-wide uppercase text-sm font-heading">{{ $titles[$type] }}</h4>
                                            <div class="prose prose-sm dark:prose-invert max-w-none font-medium opacity-90">
                                                {!! \Illuminate\Support\Str::markdown($block['data']['message'] ?? '') !!}
                                            </div>
                                        </div>
                                    </div>
                                    @break

                                @case('button_link')
                                    @php
                                        $style = $block['data']['style'] ?? 'primary';
                                        $btnClass = $style === 'primary' 
                                            ? 'bg-ivao-blue hover:bg-blue-800 text-white shadow-md hover:shadow-lg' 
                                            : 'bg-slate-200 dark:bg-slate-800 hover:bg-slate-300 dark:hover:bg-slate-700 text-slate-800 dark:text-slate-200';
                                    @endphp
                                    <div class="my-6">
                                        <a href="{{ $block['data']['url'] ?? '#' }}" target="_blank" class="inline-flex items-center px-6 py-3 rounded-xl font-bold transition-all duration-200 {{ $btnClass }}">
                                            {{ $block['data']['label'] ?? 'Link' }}
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        </a>
                                    </div>
                                    @break

                                @case('image')
                                    <figure class="my-8">
                                        <img src="{{ $block['data']['url'] ?? '' }}" alt="{{ $block['data']['caption'] ?? '' }}" class="w-full h-auto rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                                        @if(!empty($block['data']['caption']))
                                            <figcaption class="text-center mt-3 text-sm text-slate-500 dark:text-slate-400 italic">
                                                {{ $block['data']['caption'] }}
                                            </figcaption>
                                        @endif
                                    </figure>
                                    @break
                            @endswitch
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
