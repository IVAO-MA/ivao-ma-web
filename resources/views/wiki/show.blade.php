@extends('layouts.main')

@section('title', $article->title[app()->getLocale()] ?? $article->title['en'] ?? 'Wiki')

@section('content')
    <div class="bg-stone-100 py-12 border-b border-stone-200">
        <div class="container mx-auto px-6">
            <a href="{{ route('wiki.index') }}"
                class="text-stone-500 hover:text-stone-800 text-sm font-bold mb-4 inline-block">&larr; Back to Wiki</a>
            <h1 class="text-4xl font-bold text-stone-900 w-full max-w-4xl">
                {{ $article->title[app()->getLocale()] ?? $article->title['en'] ?? '' }}
            </h1>
        </div>
    </div>

    <div class="container mx-auto px-6 py-12">
        <div
            class="max-w-4xl bg-white rounded-2xl shadow-sm border border-stone-100 p-8 md:p-12 prose prose-lg prose-stone max-w-none">
            {!! $article->content[app()->getLocale()] ?? $article->content['en'] ?? '' !!}
        </div>
    </div>
@endsection