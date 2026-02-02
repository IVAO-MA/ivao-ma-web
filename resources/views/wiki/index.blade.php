@extends('layouts.main')

@section('title', 'Wiki')

@section('content')
    <!-- Header -->
    <div class="relative bg-ivao-light text-white py-24 overflow-hidden">
        <div class="absolute inset-0 bg-[#000000]/10"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl font-extrabold mb-4 font-heading flex items-center justify-center gap-4">
                <svg class="w-12 h-12 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                Knowledge Base
            </h1>
            <p class="text-xl text-slate-100 font-light max-w-2xl mx-auto">Procedures, tutorials, and documentation for the
                division.</p>
        </div>
    </div>

    <div class="bg-[#F8F9FA] min-h-screen py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-12 gap-10">
                <!-- Sidebar -->
                <div class="md:col-span-4 lg:col-span-3 space-y-6">
                    <!-- Search Mockup -->
                    <div class="bg-white rounded-xl p-2 shadow-sm border border-slate-200">
                        <input type="text" placeholder="Search wiki..."
                            class="w-full bg-slate-50 border-none rounded-lg px-4 py-3 text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-ivao-blue/20">
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                        <h3
                            class="font-bold text-slate-800 mb-4 uppercase tracking-wider text-xs border-b border-slate-100 pb-2 font-heading">
                            Categories</h3>
                        <ul class="space-y-3">
                            <li><a href="#"
                                    class="text-slate-600 hover:text-ivao-blue hover:translate-x-1 transition-all flex items-center text-sm font-medium"><span
                                        class="w-2 h-2 rounded-full bg-slate-300 mr-3 group-hover:bg-ivao-blue"></span>General
                                    Procedures</a></li>
                            <li><a href="#"
                                    class="text-slate-600 hover:text-ivao-blue hover:translate-x-1 transition-all flex items-center text-sm font-medium"><span
                                        class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>ATC Manuals</a></li>
                            <li><a href="#"
                                    class="text-slate-600 hover:text-ivao-blue hover:translate-x-1 transition-all flex items-center text-sm font-medium"><span
                                        class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Pilot Training</a></li>
                            <li><a href="#"
                                    class="text-slate-600 hover:text-ivao-blue hover:translate-x-1 transition-all flex items-center text-sm font-medium"><span
                                        class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Software Setup</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="md:col-span-8 lg:col-span-9 space-y-6">
                    @forelse($articles as $article)
                        <div
                            class="group bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 border border-slate-200 p-8 hover:-translate-y-1">
                            <h2 class="text-2xl font-bold text-slate-900 mb-3 font-heading">
                                <a href="{{ route('wiki.show', $article->slug) }}"
                                    class="hover:text-ivao-blue transition-colors">
                                    {{ $article->title[app()->getLocale()] ?? $article->title['en'] ?? 'Untitled' }}
                                </a>
                            </h2>
                            <p class="text-slate-500 mb-6 line-clamp-2 leading-relaxed">
                                {{ strip_tags($article->content[app()->getLocale()] ?? $article->content['en'] ?? '') }}
                            </p>
                            <a href="{{ route('wiki.show', $article->slug) }}"
                                class="inline-flex items-center text-ivao-blue font-bold text-sm tracking-wide group-hover:underline">
                                READ ARTICLE <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    @empty
                        <div class="bg-white p-12 rounded-xl text-center border border-dashed border-slate-300 text-slate-500">
                            No articles published yet.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection