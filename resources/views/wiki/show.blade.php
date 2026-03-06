@extends('layouts.main')

@section('title', $article->title[app()->getLocale()] ?? $article->title['en'] ?? 'Wiki')

@section('content')
    <div class="bg-stone-100 dark:bg-slate-900 py-12 border-b border-stone-200 dark:border-slate-800">
        <div class="container mx-auto px-6">
            <a href="{{ route('wiki.index') }}"
                class="text-stone-500 dark:text-stone-400 hover:text-stone-800 dark:hover:text-stone-200 text-sm font-bold mb-4 inline-block">&larr;
                Back to Categories</a>
            <h1 class="text-4xl font-bold text-stone-900 dark:text-white w-full max-w-4xl">
                {{ $article->title[app()->getLocale()] ?? $article->title['en'] ?? '' }}
            </h1>
            @if($article->category)
                <div class="mt-4">
                    <span
                        class="inline-block bg-ivao-blue/10 dark:bg-ivao-blue/20 text-ivao-blue dark:text-blue-300 font-semibold text-xs px-3 py-1 rounded-full uppercase tracking-wider">
                        {{ $article->category->name[app()->getLocale()] ?? $article->category->name['en'] }}
                    </span>
                </div>
            @endif
        </div>
    </div>

    <div class="container mx-auto px-6 py-12">
        <div
            class="max-w-4xl bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-stone-100 dark:border-slate-800 p-8 md:p-12 prose prose-lg prose-stone dark:prose-invert max-w-none">
            {!! $article->content[app()->getLocale()] ?? $article->content['en'] ?? '' !!}
        </div>
    </div>
@endsection