@extends('layouts.main')

@section('title', 'Airports')

@section('content')
    <!-- Header -->
    <div class="relative bg-ivao-green text-white py-24 overflow-hidden">
        <div class="absolute inset-0 bg-[#000000]/10"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl font-extrabold mb-4 font-heading flex items-center justify-center gap-4">
                <svg class="w-12 h-12 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                    </path>
                </svg>
                Airports
            </h1>
            <p class="text-xl text-slate-100 font-light max-w-2xl mx-auto">Explore Morocco's diverse airports, scenery, and
                download charts.</p>
        </div>
    </div>

    <div class="bg-[#F8F9FA] dark:bg-slate-900 min-h-screen py-16 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50 dark:bg-slate-900/50 border-b border-slate-200 dark:border-slate-700">
                            <tr>
                                <th class="px-8 py-5 text-slate-500 dark:text-slate-400 uppercase text-xs font-bold tracking-wider">ICAO</th>
                                <th class="px-8 py-5 text-slate-500 dark:text-slate-400 uppercase text-xs font-bold tracking-wider">Name</th>
                                <th class="px-8 py-5 text-slate-500 dark:text-slate-400 uppercase text-xs font-bold tracking-wider">Scenery (SIM)</th>
                                <th class="px-8 py-5 text-slate-500 dark:text-slate-400 uppercase text-xs font-bold tracking-wider">Status</th>
                                <th class="px-8 py-5 text-right text-slate-500 dark:text-slate-400 uppercase text-xs font-bold tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            @forelse($airports as $airport)
                                <tr class="group hover:bg-slate-50 dark:hover:bg-ivao-blue/5 transition-colors duration-200">
                                    <td class="px-8 py-5">
                                        <span
                                            class="font-mono font-bold text-ivao-blue dark:text-blue-300 bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded text-sm group-hover:bg-ivao-blue group-hover:text-white transition-colors">
                                            {{ $airport->icao }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 font-bold text-slate-800 dark:text-slate-200">
                                        {{ $airport->name[app()->getLocale()] ?? $airport->name['en'] ?? $airport->name ?? 'Unknown' }}
                                    </td>
                                    <td class="px-8 py-5 text-slate-600 dark:text-slate-400">
                                        @if($airport->scenery_link)
                                            <a href="{{ $airport->scenery_link }}" target="_blank" class="text-ivao-blue hover:underline flex items-center">
                                                {{ $airport->scenery_sim ?? 'Download' }}
                                                <svg class="w-3 h-3 ml-1 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                </svg>
                                            </a>
                                        @else
                                            <span class="text-slate-400 italic">No Scenery Available</span>
                                        @endif
                                    </td>
                                    <td class="px-8 py-5">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $airport->scenery_type === 'payware' ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400' : 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' }}">
                                            {{ ucfirst($airport->scenery_type ?? 'freeware') }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <a href="{{ route('vaip.index') }}?icao={{ $airport->icao }}"
                                            class="text-ivao-green dark:text-green-400 hover:text-white font-bold text-sm bg-green-50 dark:bg-green-900/20 hover:bg-ivao-green px-4 py-2 rounded-full transition-colors inline-block text-center min-w-[120px]">
                                            Open vAIP
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-16 text-center text-slate-400">
                                        No airports found in database.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection