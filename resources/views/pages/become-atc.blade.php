@extends('layouts.main')

@section('title', 'Become an ATC')

@section('content')
    <div class="bg-slate-50 dark:bg-slate-900/50 py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-6">Become an ATC</h1>
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-8 md:p-12 border border-slate-200 dark:border-slate-700">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-ivao-blue/10 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-ivao-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-200">Page Under Construction</h2>
                    </div>

                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-6 leading-relaxed">
                        Ready to control the Moroccan skies? Our ATC training pathways and requirements will be detailed
                        here shortly.
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