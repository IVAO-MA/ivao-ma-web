@extends('layouts.main')

@section('title', 'Your Dashboard')

@section('content')
    <div class="min-h-screen bg-slate-50 dark:bg-slate-950 transition-colors duration-500">
        <!-- Dashboard Header / Hero -->
        <div class="relative overflow-hidden bg-ivao-blue dark:bg-slate-900 pt-32 pb-48 px-6">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-1/3 h-full opacity-10 pointer-events-none">
                <img src="https://www.ivao.aero/publrelat/branding/svg_logos/MA.svg"
                    class="w-full h-full object-contain scale-150 rotate-12">
            </div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>

            <div class="container mx-auto max-w-6xl relative z-10">
                <div class="flex flex-col md:flex-row items-center md:items-end gap-8">
                    <!-- Avatar / Initials -->
                    <div class="relative group">
                        <div
                            class="w-32 h-32 md:w-40 md:h-40 rounded-[2.5rem] bg-white text-ivao-blue flex items-center justify-center text-5xl md:text-6xl font-black shadow-2xl transform transition-transform group-hover:scale-105 duration-500 border-4 border-white/20">
                            {{ substr($user->name, 0, 1) }}
                            <!-- Small Division Badge -->
                            <div
                                class="absolute -bottom-2 -right-2 w-12 h-12 rounded-2xl bg-white p-2 shadow-xl border border-slate-100">
                                <img src="https://www.ivao.aero/publrelat/branding/svg_logos/{{ $user->division }}.svg"
                                    class="w-full h-full object-contain">
                            </div>
                        </div>
                    </div>

                    <div class="flex-grow text-center md:text-left">
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 mb-3">
                            <span
                                class="px-3 py-1 bg-white/20 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full border border-white/30">IVAO
                                Member</span>
                            @foreach($user->staff as $pos)
                                <span
                                    class="px-3 py-1 bg-ma-red/90 text-white text-[10px] font-black uppercase tracking-[0.1em] rounded-full shadow-lg border border-ma-red">{{ is_array($pos) ? ($pos['shortName'] ?? 'Staff') : $pos }}</span>
                            @endforeach
                        </div>
                        <h1 class="text-4xl md:text-6xl font-black text-white mb-2 tracking-tight">{{ $user->name }}</h1>
                        <div class="flex items-center justify-center md:justify-start gap-4 text-white/70 font-bold">
                            <span class="flex items-center">
                                <span class="opacity-50 mr-2">VID</span>
                                <span class="text-white">{{ $user->vid }}</span>
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full bg-white/30"></span>
                            <span class="flex items-center">
                                <span class="opacity-50 mr-2">DIVISION</span>
                                <span class="text-white">{{ $user->division }}</span>
                            </span>
                        </div>
                    </div>

                    <!-- Quick Stats Badges -->
                    <div class="hidden lg:flex gap-4 self-center">
                        <div
                            class="bg-white/10 backdrop-blur-xl border border-white/20 p-4 rounded-3xl text-center min-w-[120px]">
                            <img src="https://ivao.aero/data/images/ratings/atc/{{ $user->rating_atc }}.gif"
                                class="h-8 mx-auto mb-2 opacity-90">
                            <p class="text-[10px] font-black text-white/50 uppercase tracking-widest">ATC Rating</p>
                        </div>
                        <div
                            class="bg-white/10 backdrop-blur-xl border border-white/20 p-4 rounded-3xl text-center min-w-[120px]">
                            <img src="https://ivao.aero/data/images/ratings/pilot/{{ $user->rating_pilot }}.gif"
                                class="h-8 mx-auto mb-2 opacity-90">
                            <p class="text-[10px] font-black text-white/50 uppercase tracking-widest">Pilot Rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="container mx-auto max-w-6xl -mt-24 pb-20 px-6">
            <div class="grid lg:grid-cols-12 gap-8" x-data="{ section: 'overview' }">

                <!-- Navigation Sidebar -->
                <div class="lg:col-span-3">
                    <div
                        class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-2xl border border-slate-200 dark:border-slate-800 p-3 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none sticky top-28">
                        <nav class="space-y-1">
                            <button @click="section = 'overview'"
                                :class="section === 'overview' ? 'bg-ivao-blue text-white shadow-xl shadow-ivao-blue/20' : 'text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-800'"
                                class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                    </path>
                                </svg>
                                Overview
                            </button>
                            <button @click="section = 'career'"
                                :class="section === 'career' ? 'bg-ivao-blue text-white shadow-xl shadow-ivao-blue/20' : 'text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-800'"
                                class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Career & Ratings
                            </button>
                            <button @click="section = 'settings'"
                                :class="section === 'settings' ? 'bg-ivao-blue text-white shadow-xl shadow-ivao-blue/20' : 'text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-800'"
                                class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                    </path>
                                </svg>
                                Preferences
                            </button>
                        </nav>

                        <div class="mt-8 pt-8 border-t border-slate-100 dark:border-slate-800 px-4 pb-4">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Account Actions
                            </p>
                            <form action="{{ route('auth.ivao.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold text-ma-red hover:bg-ma-red/5 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Main Section -->
                <div class="lg:col-span-9 space-y-8">

                    <!-- Overview Section -->
                    <div x-show="section === 'overview'" x-transition class="space-y-8">
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Personal ID Card -->
                            <div
                                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none">
                                <div class="flex items-center justify-between mb-8">
                                    <h3
                                        class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">
                                        Member Identity</h3>
                                    <svg class="w-6 h-6 text-ivao-blue" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                        </path>
                                    </svg>
                                </div>
                                <div class="space-y-6">
                                    <div
                                        class="flex items-center justify-between py-3 border-b border-slate-50 dark:border-slate-800">
                                        <span class="text-sm font-bold text-slate-400 uppercase tracking-wider">Full
                                            Name</span>
                                        <span class="font-black text-slate-900 dark:text-white">{{ $user->name }}</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between py-3 border-b border-slate-50 dark:border-slate-800">
                                        <span class="text-sm font-bold text-slate-400 uppercase tracking-wider">IVAO
                                            VID</span>
                                        <span class="font-black text-ivao-blue">#{{ $user->vid }}</span>
                                    </div>
                                    <div class="flex items-center justify-between py-3">
                                        <span
                                            class="text-sm font-bold text-slate-400 uppercase tracking-wider">Registration</span>
                                        <span
                                            class="font-black text-slate-900 dark:text-white">{{ $user->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Division Card -->
                            <div
                                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none relative overflow-hidden">
                                <div
                                    class="absolute -right-12 -bottom-12 w-48 h-48 opacity-[0.03] dark:opacity-[0.07] pointer-events-none">
                                    <img src="https://www.ivao.aero/publrelat/branding/svg_logos/{{ $user->division }}.svg"
                                        class="w-full h-full object-contain">
                                </div>
                                <div class="flex items-center justify-between mb-8">
                                    <h3
                                        class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">
                                        Active Division</h3>
                                    <div
                                        class="w-12 h-12 rounded-2xl bg-slate-50 dark:bg-slate-800 p-2 border border-slate-100 dark:border-slate-700">
                                        <img src="https://www.ivao.aero/publrelat/branding/svg_logos/{{ $user->division }}.svg"
                                            class="w-full h-full object-contain">
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <p class="text-5xl font-black text-slate-900 dark:text-white">{{ $user->division }}</p>
                                    <p class="text-sm font-bold text-slate-400 leading-relaxed max-w-[200px]">You are
                                        currently registered as an active member of this division.</p>
                                    <a href="https://ivao.aero/members/person/details5.asp?Id={{ $user->vid }}"
                                        target="_blank"
                                        class="inline-flex items-center gap-2 text-ivao-blue font-black text-xs uppercase tracking-widest mt-4 hover:gap-3 transition-all">
                                        View IVAO Profile
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Staff Bento Box -->
                        @if(!empty($user->staff))
                            <div
                                class="bg-ma-red text-white p-10 rounded-[2.5rem] shadow-2xl shadow-ma-red/20 relative overflow-hidden">
                                <div class="absolute top-0 right-0 p-8 opacity-20">
                                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08s5.97 1.09 6 3.08c-1.29 1.94-3.5 3.22-6 3.22z" />
                                    </svg>
                                </div>
                                <h3 class="text-3xl font-black mb-6 uppercase tracking-tighter">Division Staff</h3>
                                <div class="flex flex-wrap gap-3">
                                    @foreach($user->staff as $p)
                                        <div
                                            class="px-6 py-3 bg-white/20 backdrop-blur-md rounded-2xl border border-white/30 font-black text-sm tracking-widest uppercase">
                                            {{ is_array($p) ? ($p['shortName'] ?? $p['id'] ?? 'Staff') : $p }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Career Section -->
                    <div x-show="section === 'career'" x-transition class="space-y-8">
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- ATC Career -->
                            <div
                                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none">
                                <div class="flex items-center gap-4 mb-8">
                                    <div
                                        class="w-14 h-14 rounded-[1.25rem] bg-ivao-blue/10 dark:bg-ivao-blue/20 flex items-center justify-center text-ivao-blue">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3
                                            class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">
                                            ATC Career</h3>
                                        <p
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">
                                            Air Traffic Control</p>
                                    </div>
                                </div>

                                <div
                                    class="bg-slate-50 dark:bg-slate-950 p-6 rounded-3xl border border-slate-100 dark:border-slate-800 mb-6 flex items-center gap-4">
                                    <img src="https://ivao.aero/data/images/ratings/atc/{{ $user->rating_atc }}.gif"
                                        class="h-10 rounded shadow-sm">
                                    <p class="text-2xl font-black text-ivao-blue tracking-tight">
                                        @php
                                            $ratings_atc = [
                                                2 => 'AS1 - ATC Student 1',
                                                3 => 'AS2 - ATC Student 2',
                                                4 => 'AS3 - ATC Student 3',
                                                5 => 'ADC - Aerodrome Controller',
                                                6 => 'APC - Approach Controller',
                                                7 => 'ACC - Center Controller',
                                                8 => 'SEC - Senior Controller',
                                                9 => 'SAI - Senior ATC Instructor',
                                                10 => 'CAI - Chief ATC Instructor'
                                            ];
                                            echo $ratings_atc[$user->rating_atc] ?? 'Unknown';
                                        @endphp
                                    </p>
                                </div>

                                <div class="space-y-2">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1">
                                        Guest Controller Approvals</p>
                                    <div class="flex flex-wrap gap-2">
                                        @if(!empty($user->gca))
                                            @foreach($user->gca as $g)
                                                <span
                                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-black rounded-lg border border-slate-200 dark:border-slate-700">{{ $g }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-sm font-bold text-slate-400 italic">No external GCAs
                                                recorded</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Pilot Career -->
                            <div
                                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none">
                                <div class="flex items-center gap-4 mb-8">
                                    <div
                                        class="w-14 h-14 rounded-[1.25rem] bg-emerald-50 dark:bg-emerald-900/20 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3
                                            class="text-xl font-black text-slate-900 dark:text-white uppercase tracking-tighter">
                                            Pilot Career</h3>
                                        <p
                                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">
                                            Virtual Aviator</p>
                                    </div>
                                </div>

                                <div
                                    class="bg-slate-50 dark:bg-slate-950 p-6 rounded-3xl border border-slate-100 dark:border-slate-800 mb-6 flex items-center gap-4">
                                    <img src="https://ivao.aero/data/images/ratings/pilot/{{ $user->rating_pilot }}.gif"
                                        class="h-10 rounded shadow-sm">
                                    <p class="text-2xl font-black text-emerald-600 dark:text-emerald-400 tracking-tight">
                                        @php
                                            $ratings_pilot = [
                                                2 => 'FS1 - Basic Flight Student',
                                                3 => 'FS2 - Flight Student',
                                                4 => 'FS3 - Advanced Flight Student',
                                                5 => 'PP - Private Pilot',
                                                6 => 'SPP - Senior Private Pilot',
                                                7 => 'CP - Commercial Pilot',
                                                8 => 'ATP - Airline Transport Pilot',
                                                9 => 'SFI - Senior Flight Instructor',
                                                10 => 'CHFI - Chief Flight Instructor'
                                            ];
                                            echo $ratings_pilot[$user->rating_pilot] ?? 'Unknown';
                                        @endphp
                                    </p>
                                </div>

                                <div
                                    class="p-4 bg-emerald-50/50 dark:bg-emerald-900/10 rounded-2xl border border-emerald-100/50 dark:border-emerald-800/30">
                                    <p
                                        class="text-xs font-bold text-emerald-800 dark:text-emerald-300 leading-relaxed italic">
                                        "Your wings already exist. All you have to do is fly."</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Settings Section -->
                    <div x-show="section === 'settings'" x-transition>
                        <form action="{{ route('users.settings.update') }}" method="POST" class="space-y-8">
                            @csrf
                            <div
                                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 md:p-12 rounded-[2.5rem] shadow-xl shadow-slate-200/50 dark:shadow-none">
                                <h3
                                    class="text-2xl font-black text-slate-900 dark:text-white uppercase tracking-tighter mb-10 pb-4 border-b border-slate-50 dark:border-slate-800">
                                    Communication & Metadata</h3>

                                <div class="grid md:grid-cols-2 gap-10">
                                    <div class="space-y-2">
                                        <label
                                            class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Contact
                                            Email</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                            class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-3xl font-bold text-slate-900 dark:text-white focus:outline-none focus:ring-4 focus:ring-ivao-blue/10 focus:border-ivao-blue transition-all"
                                            required>
                                        @error('email') <p class="mt-1 text-xs text-ma-red font-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="space-y-2">
                                        <label
                                            class="block text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] ml-1">Discord
                                            Snowflake</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-6 flex items-center pointer-events-none text-slate-400">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495a18.2739 18.2739 0 00-5.487 0 11.7216 11.7216 0 00-.6172-1.2495.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1971.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.0822.0822 0 00.0312-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="discord" value="{{ old('discord', $user->discord) }}"
                                                placeholder="666794743728046100"
                                                class="w-full pl-16 pr-6 py-4 bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-3xl font-bold text-slate-900 dark:text-white focus:outline-none focus:ring-4 focus:ring-ivao-blue/10 focus:border-ivao-blue transition-all">
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="mt-12 p-8 bg-slate-50 dark:bg-slate-950 border border-slate-100 dark:border-slate-800 rounded-[2rem] flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-2xl bg-ma-green/10 text-ma-green flex items-center justify-center font-black">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-black text-slate-900 dark:text-white tracking-tight uppercase">
                                                Email Notifications</h4>
                                            <p class="text-xs font-bold text-slate-400">Receive division updates and
                                                training alerts.</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="notifications_enabled" value="1" {{ $user->notifications_enabled ? 'checked' : '' }} class="sr-only peer">
                                        <div
                                            class="w-14 h-8 bg-slate-200 dark:bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-ma-green shadow-inner">
                                        </div>
                                    </label>
                                </div>

                                <div class="mt-12 flex justify-end">
                                    <button type="submit"
                                        class="bg-ivao-blue text-white hover:bg-blue-800 px-12 py-5 rounded-[1.75rem] font-black text-xs uppercase tracking-[0.2em] shadow-2xl shadow-ivao-blue/30 transition-all hover:scale-105 active:scale-95">
                                        Commit Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection