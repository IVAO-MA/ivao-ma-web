@extends('layouts.main')

@section('title', 'Coming Soon')

@section('content')
    <div class="min-h-[60vh] flex items-center justify-center bg-[#F0F0F4]">
        <div class="text-center">
            <h1 class="text-4xl font-black text-ivao-blue mb-4">Coming Soon</h1>
            <p class="text-slate-500 text-lg">This page is currently under construction.</p>
            <a href="{{ route('home') }}"
                class="inline-block mt-8 px-6 py-3 bg-ivao-blue text-white rounded-full font-bold hover:bg-ivao-light transition">Return
                Home</a>
        </div>
    </div>
@endsection