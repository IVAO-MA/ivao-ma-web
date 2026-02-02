@extends('layouts.main')

@section('title', 'Page Not Found')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center bg-white relative overflow-hidden">
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-12">
            
            <!-- Left: Text Content -->
            <div class="w-full md:w-5/12 text-center md:text-left">
                <div class="mb-2 inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-50 border border-red-100 text-red-600 text-xs font-bold uppercase tracking-wider animate-pulse">
                    <span class="w-2 h-2 rounded-full bg-red-500"></span>
                    SQ 7700
                </div>

                <h1 class="text-4xl md:text-6xl font-black text-ivao-blue mb-4 font-heading leading-tight">
                    Casablanca,<br>we have a problem...
                </h1>
                
                <p class="text-lg text-slate-500 mb-8 leading-relaxed">
                    Our radar systems indicate that you've drifted off course. The flight plan you requested cannot be found in our database.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ route('home') }}" 
                       class="px-8 py-3 bg-ivao-blue text-white font-bold rounded-lg hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-blue-500/25 flex items-center justify-center gap-2 group">
                        Return to Base
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right: Illustration -->
            <div class="w-full md:w-6/12 relative flex justify-center">
               <div class="relative animate-[float_6s_ease-in-out_infinite]">
                    <img src="{{ asset('images/ivao-ma-symbol.svg') }}" class="w-64 md:w-80 h-auto drop-shadow-xl" alt="IVAO Morocco">
               </div>
               
               <!-- Decorative Elements -->
               <div class="absolute top-10 right-20 w-3 h-3 rounded-full bg-ma-red opacity-20 animate-ping"></div>
               <div class="absolute bottom-10 left-20 w-2 h-2 rounded-full bg-ma-green opacity-20 animate-pulse"></div>
            </div>

        </div>
    </div>

    <!-- Background texture -->
    <div class="absolute inset-0 opacity-[0.02] pointer-events-none bg-[radial-gradient(#1e293b_1px,transparent_1px)] [background-size:16px_16px]"></div>
</div>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(1deg); }
    }
</style>
@endsection
