@extends('layouts.main')

@section('title', 'Learning Pathways')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-ivao-blue to-blue-900 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-extrabold mb-6 font-heading flex items-center justify-center gap-4">
                <svg class="w-12 h-12 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                    </path>
                </svg>
                Learning Pathways
            </h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed">
                Your journey to becoming a skilled pilot or controller in the IVAO Morocco Division
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-[#F8F9FA] dark:bg-slate-900 transition-colors duration-300">
        <div class="container mx-auto px-6">
            <!-- Introduction -->
            <div class="max-w-4xl mx-auto text-center mb-16">
                <p class="text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                    We have designed specific learning paths to help you gain experience and skills in the most effective
                    way on the Moroccan network and within the IVAO system.
                </p>
                <div class="flex flex-wrap gap-4 justify-center mt-8">
                    <a href="https://ivao.aero/members/person/register.htm" target="_blank"
                        class="px-8 py-3 bg-ivao-blue text-white font-bold rounded-full hover:bg-blue-900 transition-colors shadow-lg">
                        Register on IVAO
                    </a>
                    <a href="https://training.ivao.aero" target="_blank"
                        class="px-8 py-3 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 transition-colors shadow-lg">
                        Access Training
                    </a>
                </div>
            </div>

            <!-- Two Column Layout -->
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- PILOT PATHWAY -->
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8 border border-slate-200 dark:border-slate-700 transition-colors duration-300">
                    <div class="text-center mb-8">
                        <div
                            class="w-20 h-20 mx-auto bg-blue-50 dark:bg-blue-900/20 text-ivao-blue dark:text-blue-400 rounded-2xl flex items-center justify-center mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Becoming a Pilot</h2>
                        <p class="text-slate-500 dark:text-slate-400">Your flight training progression</p>
                    </div>

                    <!-- Pilot Pathway Visual -->
                    <div class="space-y-6">
                        <!-- Stage 1 -->
                        <div class="relative pl-8 pb-8 border-l-4 border-blue-300 dark:border-blue-800">
                            <div
                                class="absolute -left-3 top-0 w-6 h-6 rounded-full bg-ivao-blue border-4 border-white dark:border-slate-800 shadow">
                            </div>
                            <div class="bg-blue-50 dark:bg-blue-900/30 rounded-xl p-6 transition-colors duration-300">
                                <h3 class="text-xl font-bold text-ivao-blue dark:text-blue-300 mb-2">First Steps as a Pilot
                                </h3>
                                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                                    <p><strong class="text-slate-800 dark:text-slate-200">When:</strong> When you join IVAO
                                    </p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Why:</strong> Learn the basics and
                                        perform your first
                                        online flight</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Typical routes:</strong>
                                        GMMN–GMMX, GMMN–GMAD</p>
                                </div>
                            </div>
                        </div>

                        <!-- Stage 2 -->
                        <div class="relative pl-8 pb-8 border-l-4 border-blue-300 dark:border-blue-800">
                            <div
                                class="absolute -left-3 top-0 w-6 h-6 rounded-full bg-ivao-blue border-4 border-white dark:border-slate-800 shadow">
                            </div>
                            <div class="bg-blue-50 dark:bg-blue-900/30 rounded-xl p-6 transition-colors duration-300">
                                <h3 class="text-xl font-bold text-ivao-blue dark:text-blue-300 mb-2">Basic Flight Training
                                    (BFT)</h3>
                                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                                    <p><strong class="text-slate-800 dark:text-slate-200">When:</strong> After your first
                                        flight</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Why:</strong> Gain essential
                                        knowledge for VFR and IFR
                                        flying</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Focus:</strong> ICAO procedures in
                                        Morocco, IFR
                                        between major airports, Eurocontrol coordination</p>
                                </div>
                            </div>
                        </div>

                        <!-- Stage 3 -->
                        <div class="relative pl-8">
                            <div
                                class="absolute -left-3 top-0 w-6 h-6 rounded-full bg-ivao-blue border-4 border-white dark:border-slate-800 shadow">
                            </div>
                            <div class="bg-blue-50 dark:bg-blue-900/30 rounded-xl p-6 transition-colors duration-300">
                                <h3 class="text-xl font-bold text-ivao-blue dark:text-blue-300 mb-2">Advanced Pilot Modules
                                </h3>
                                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                                    <p><strong class="text-slate-800 dark:text-slate-200">When:</strong> After BFT</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Why:</strong> Specialize in
                                        aircraft types or
                                        procedures</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Examples:</strong> RNAV
                                        approaches, Long-haul from
                                        GMMN, Oceanic procedures</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CONTROLLER PATHWAY -->
                <div
                    class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8 border border-slate-200 dark:border-slate-700 transition-colors duration-300">
                    <div class="text-center mb-8">
                        <div
                            class="w-20 h-20 mx-auto bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">Becoming an ATC</h2>
                        <p class="text-slate-500 dark:text-slate-400">Your controller training progression</p>
                    </div>

                    <!-- ATC Pathway Visual -->
                    <div class="space-y-6">
                        <!-- AS1 -->
                        <div class="relative pl-8 pb-8 border-l-4 border-emerald-300 dark:border-emerald-800">
                            <div
                                class="absolute -left-3 top-0 w-6 h-6 rounded-full bg-emerald-600 border-4 border-white dark:border-slate-800 shadow">
                            </div>
                            <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-xl p-6 transition-colors duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">AS1: First Steps
                                </h3>
                                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                                    <p><strong class="text-slate-800 dark:text-slate-200">When:</strong> When you join IVAO
                                    </p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Why:</strong> Learn basics and
                                        perform first ATC
                                        session</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Positions:</strong> GMMN_DEL,
                                        GMME_DEL</p>
                                </div>
                            </div>
                        </div>

                        <!-- AS2 -->
                        <div class="relative pl-8 pb-8 border-l-4 border-emerald-300 dark:border-emerald-800">
                            <div
                                class="absolute -left-3 top-0 w-6 h-6 rounded-full bg-emerald-600 border-4 border-white dark:border-slate-800 shadow">
                            </div>
                            <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-xl p-6 transition-colors duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">AS2: Basic Ground
                                </h3>
                                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                                    <p><strong class="text-slate-800 dark:text-slate-200">When:</strong> After 10 hours</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Why:</strong> Learn ground
                                        movement control</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Positions:</strong> GMMX_GND,
                                        GMAD_GND, GMME_GND</p>
                                </div>
                            </div>
                        </div>

                        <!-- AS3 -->
                        <div class="relative pl-8 pb-8 border-l-4 border-emerald-300 dark:border-emerald-800">
                            <div
                                class="absolute -left-3 top-0 w-6 h-6 rounded-full bg-emerald-600 border-4 border-white dark:border-slate-800 shadow">
                            </div>
                            <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-xl p-6 transition-colors duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">AS3: Aerodrome
                                    (ADC)</h3>
                                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                                    <p><strong class="text-slate-800 dark:text-slate-200">When:</strong> After 25 hours +
                                        exam</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Why:</strong> Manage DEL/GND/TWR
                                        procedures</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Positions:</strong> GMMN_TWR and
                                        other TWR positions</p>
                                </div>
                            </div>
                        </div>

                        <!-- APC -->
                        <div class="relative pl-8 pb-8 border-l-4 border-emerald-300 dark:border-emerald-800">
                            <div
                                class="absolute -left-3 top-0 w-6 h-6 rounded-full bg-emerald-600 border-4 border-white dark:border-slate-800 shadow">
                            </div>
                            <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-xl p-6 transition-colors duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">APC: Approach</h3>
                                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                                    <p><strong class="text-slate-800 dark:text-slate-200">When:</strong> After obtaining ADC
                                    </p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Why:</strong> Learn vectoring and
                                        sequencing</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Positions:</strong> GMMN_APP,
                                        GMMX_APP, GMAD_APP</p>
                                </div>
                            </div>
                        </div>

                        <!-- ACC -->
                        <div class="relative pl-8">
                            <div
                                class="absolute -left-3 top-0 w-6 h-6 rounded-full bg-emerald-600 border-4 border-white dark:border-slate-800 shadow">
                            </div>
                            <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-xl p-6 transition-colors duration-300">
                                <h3 class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-2">ACC: Area Control
                                </h3>
                                <div class="space-y-2 text-sm text-slate-600 dark:text-slate-400">
                                    <p><strong class="text-slate-800 dark:text-slate-200">When:</strong> After APC</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Why:</strong> Handle en-route
                                        traffic and sector
                                        management</p>
                                    <p><strong class="text-slate-800 dark:text-slate-200">Position:</strong> GMMM_CTR
                                        (Casablanca FIR)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-16 bg-gradient-to-r from-ivao-blue to-blue-900 rounded-2xl p-12 text-center text-white">
                <h2 class="text-3xl font-bold mb-4">Ready to Start Your Journey?</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Join thousands of aviation enthusiasts worldwide and begin your training today
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="https://ivao.aero/members/person/register.htm" target="_blank"
                        class="px-8 py-4 bg-white text-ivao-blue font-bold rounded-full hover:bg-slate-100 transition-colors shadow-lg text-lg">
                        Register Now
                    </a>
                    <a href="https://training.ivao.aero" target="_blank"
                        class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-ivao-blue transition-colors text-lg">
                        Browse Training
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection