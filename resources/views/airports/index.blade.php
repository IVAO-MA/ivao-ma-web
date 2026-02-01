@extends('layouts.main')

@section('title', 'Airports')

@section('content')
    <!-- Header -->
    <div class="relative bg-ivao-green text-white py-24 overflow-hidden">
        <div class="absolute inset-0 bg-[#000000]/10"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl font-extrabold mb-4 font-heading">Airports</h1>
            <p class="text-xl text-slate-100 font-light max-w-2xl mx-auto">Explore Morocco's diverse airports, scenery, and
                download charts.</p>
        </div>
    </div>

    <div class="bg-[#F8F9FA] min-h-screen py-16">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="px-8 py-5 text-slate-500 uppercase text-xs font-bold tracking-wider">ICAO</th>
                                <th class="px-8 py-5 text-slate-500 uppercase text-xs font-bold tracking-wider">Name</th>
                                <th class="px-8 py-5 text-slate-500 uppercase text-xs font-bold tracking-wider">City</th>
                                <th class="px-8 py-5 text-right text-slate-500 uppercase text-xs font-bold tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($airports as $airport)
                                <tr class="group hover:bg-slate-50 transition-colors duration-200">
                                    <td class="px-8 py-5">
                                        <span
                                            class="font-mono font-bold text-ivao-blue bg-blue-50 px-2 py-1 rounded text-sm group-hover:bg-ivao-blue group-hover:text-white transition-colors">
                                            {{ $airport->icao }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 font-bold text-slate-800">
                                        {{ $airport->name[app()->getLocale()] ?? $airport->name['en'] ?? '' }}
                                    </td>
                                    <td class="px-8 py-5 text-slate-600">
                                        {{ $airport->city[app()->getLocale()] ?? $airport->city['en'] ?? '' }}
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <a href="#"
                                            class="text-ivao-green hover:text-white font-bold text-sm bg-green-50 hover:bg-ivao-green px-4 py-2 rounded-full transition-colors inline-block">
                                            View Info
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-16 text-center text-slate-400">
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