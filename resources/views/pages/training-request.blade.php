@extends('layouts.main')

@section('title', 'Training Request')

@section('content')
    <div class="bg-slate-50 dark:bg-slate-900/50 py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">Training Request</h1>
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-8 md:p-12 border border-slate-200 dark:border-slate-700">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-ivao-blue/10 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-ivao-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-200">Page Under Construction</h2>
                    </div>

                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                        Our training request system is being updated to better serve our members. Check back soon for the
                        new booking portal.
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