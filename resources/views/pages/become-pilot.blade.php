@extends('layouts.main')

@section('title', 'Become a Pilot')

@section('content')
    <div class="bg-slate-50 dark:bg-slate-900/50 py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">Become a Pilot</h1>
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-8 md:p-12 border border-slate-200 dark:border-slate-700">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-ivao-blue/10 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-ivao-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-200">Page Under Construction</h2>
                    </div>

                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                        Take your first steps into virtual flight within the Morocco Division. Training materials and guides
                        coming soon.
                    </p>

                    <div class="mt-12 text-center">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center px-6 py-3 bg-ivao-blue text-white font-bold rounded-lg hover:bg-ivao-light transition-colors">
                            Return Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection