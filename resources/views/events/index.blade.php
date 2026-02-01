@extends('layouts.main')

@section('title', 'Events')

@section('content')
    <!-- Header -->
    <div class="relative bg-ivao-blue text-white py-24 overflow-hidden">
        <div class="absolute inset-0 bg-[#000000]/10"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl font-extrabold mb-4 font-heading">Events Calendar</h1>
            <p class="text-xl text-slate-100 font-light max-w-2xl mx-auto">Join us for exciting aviation events across
                Morocco.</p>
        </div>
    </div>

    <div class="bg-[#F8F9FA] min-h-screen py-16">
        <div class="container mx-auto px-6">
            @if($events->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events as $event)
                        <div
                            class="group bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 overflow-hidden border border-slate-200">
                            <div class="h-56 bg-slate-100 relative overflow-hidden">
                                @if($event->image_path)
                                    <img src="{{ Storage::url($event->image_path) }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <svg class="w-16 h-16 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4">
                                    <span
                                        class="bg-white text-ivao-blue text-xs font-bold px-3 py-1.5 rounded-full uppercase shadow-sm">{{ $event->type }}</span>
                                </div>
                            </div>
                            <div class="p-8 flex-grow flex flex-col">
                                <div class="flex items-center text-slate-500 text-sm font-semibold mb-3">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $event->start_at->format('d M Y, H:i') }}
                                </div>
                                <h3
                                    class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-ivao-blue transition-colors font-heading">
                                    {{ $event->title[app()->getLocale()] ?? $event->title['en'] ?? 'Untitled' }}
                                </h3>
                                <div class="text-slate-600 line-clamp-3 mb-6 prose prose-sm prose-slate">
                                    {!! $event->description[app()->getLocale()] ?? $event->description['en'] ?? '' !!}
                                </div>
                                <div class="mt-auto">
                                    <a href="#"
                                        class="block text-center w-full bg-slate-50 hover:bg-ivao-blue hover:text-white text-slate-700 font-bold py-3.5 rounded-xl transition-all duration-200">
                                        More Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-24 bg-white rounded-2xl border border-dashed border-slate-300 max-w-3xl mx-auto">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-700 mb-2 font-heading">No upcoming events</h3>
                    <p class="text-slate-500">Check back later for new schedules.</p>
                </div>
            @endif
        </div>
    </div>
@endsection