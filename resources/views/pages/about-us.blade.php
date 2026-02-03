@extends('layouts.main')

@section('title', 'About Us')

@section('content')
    <div class="bg-slate-50 dark:bg-slate-900/50 py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">About IVAO Morocco</h1>
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-8 md:p-12 border border-slate-200 dark:border-slate-700">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-ivao-blue/10 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-ivao-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-200">Page Under Construction</h2>
                    </div>

                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                        We are currently working on this page to provide you with the most accurate information about the
                        IVAO Morocco Division.
                    </p>

                    <div class="grid md:grid-cols-2 gap-6 mt-12">
                        <div
                            class="p-6 bg-slate-50 dark:bg-slate-900/50 rounded-xl border border-slate-100 dark:border-slate-800">
                            <h3 class="font-bold mb-2">Our Mission</h3>
                            <p class="text-sm text-slate-500">To provide a realistic and professional virtual aviation
                                environment in the Kingdom of Morocco.</p>
                        </div>
                        <div
                            class="p-6 bg-slate-50 dark:bg-slate-900/50 rounded-xl border border-slate-100 dark:border-slate-800">
                            <h3 class="font-bold mb-2">Our Community</h3>
                            <p class="text-sm text-slate-500">Join a vibrant community of passionate virtual pilots and air
                                traffic controllers.</p>
                        </div>
                    </div>

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