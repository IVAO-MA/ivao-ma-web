@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-ivao-blue text-white min-h-[85vh] flex items-center justify-center overflow-hidden">
        <!-- Hero Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.jpeg') }}" alt="Morocco Aviation" class="w-full h-full object-cover">
            <!-- Dark Gradient Overlay for Text Readability -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-black/30"></div> <!-- Extra solid dimming -->
        </div>

        <div class="relative z-20 max-w-6xl mx-auto text-center px-6 mt-10">
            <div class="mb-6 inline-block">
                <span
                    class="py-1 px-4 rounded-full bg-white/20 border border-white/30 text-sm font-bold tracking-widest uppercase text-white shadow-sm backdrop-blur-sm">
                    Welcome on Board
                </span>
            </div>
            <h1
                class="text-6xl md:text-9xl font-extrabold mb-8 tracking-tighter leading-none text-white drop-shadow-2xl font-heading">
                WELCOME TO <br /> <span class="text-white">MOROCCO</span>
            </h1>
            <p
                class="text-xl md:text-2xl text-slate-100 mb-12 font-light max-w-2xl mx-auto leading-relaxed drop-shadow-lg text-shadow-sm">
                The Gateway to Africa. Discover a land of diverse landscapes, rich culture, and challenging aviation
                adventures.
            </p>

            <div class="flex flex-col sm:flex-row gap-8 justify-center items-center">
                <a href="#"
                    class="px-10 py-5 bg-ma-red text-white font-bold text-lg rounded-full hover:bg-red-700 hover:scale-105 transition-all duration-200 shadow-xl uppercase tracking-wide border-2 border-transparent hover:border-white/20">
                    START FLYING
                </a>
                <a href="https://ivao.aero/register" target="_blank"
                    class="px-10 py-5 bg-white text-ivao-blue font-bold text-lg rounded-full hover:bg-gray-100 hover:scale-105 transition-all duration-200 shadow-xl uppercase tracking-wide">
                    JOIN IVAO
                </a>
            </div>
        </div>
    </section>

    <!-- Quick Actions Grid -->
    <section class="relative z-30 -mt-24 mx-6 md:mx-auto max-w-7xl">
        <div class="bg-white rounded-2xl p-1.5 border border-slate-200 shadow-2xl">
            <div class="bg-slate-50 rounded-xl p-6 grid grid-cols-2 md:grid-cols-6 gap-4">
                <!-- Get Started -->
                <a href="{{ route('coming-soon') }}"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-ivao-blue/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-ivao-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-ivao-blue transition-colors">Get
                        Started!</span>
                </a>
                <!-- Discord -->
                <a href="#"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-[#5865F2]/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-[#5865F2]" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1892.3775-.2842a.074.074 0 01.0783-.0105c3.9269 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1258.095.2517.1891.3775.283a.077.077 0 01-.0069.1287c-.5969.343-1.2185.644-1.8711.8916a.0758.0758 0 00-.0419.1064c.3529.7001.7643 1.3649 1.226 1.9942a.0766.0766 0 00.0842.0276c1.9507-.6066 3.9402-1.5219 6.002-3.0294a.077.077 0 00.0313-.055c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.419-2.1568 2.419z" />
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-[#5865F2] transition-colors">Discord</span>
                </a>
                <!-- Wiki -->
                <a href="{{ route('wiki.index') }}"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-ivao-light/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-ivao-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-ivao-light transition-colors">Wiki</span>
                </a>
                <!-- Charts -->
                <a href="{{ route('airports.index') }}"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-ma-red/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-ma-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-ma-red transition-colors">Charts</span>
                </a>
                <!-- Sectorfiles -->
                <a href="{{ route('coming-soon') }}"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-ivao-green/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-ivao-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-ivao-green transition-colors">Sectorfiles</span>
                </a>
                <!-- Tours -->
                <a href="https://tours.ivao.aero" target="_blank"
                    class="group flex flex-col items-center justify-center p-4 rounded-xl hover:bg-white hover:shadow-md transition-all duration-200 border border-transparent hover:border-slate-100">
                    <div
                        class="w-12 h-12 rounded-full bg-stone-500/10 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-slate-700 font-bold text-sm tracking-wide group-hover:text-stone-500 transition-colors">Tours</span>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 bg-[#F8F9FA]">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <!-- Brand Logo (SVG) -->
                    <img src="{{ asset('images/logo.svg') }}" class="w-auto h-20 mb-8" alt="IVAO Logo">
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-6 font-heading leading-tight">IVAO – International
                        Virtual<br>Aviation Organisation</h2>

                    <div class="prose prose-lg text-slate-600 mb-8">
                        <p>
                            IVAO is a dedicated, independent, free of charge, service to enthusiasts and individuals
                            enjoying and participating in the flight simulation community worldwide.
                        </p>
                        <p>
                            You will find the IVAO Morocco website full of resources to make your online flying or
                            controlling enjoyable. If you have any questions, please do not hesitate to ask our staff via
                            the forum or e-mail.
                        </p>
                        <p>
                            We welcome members with all levels of experience in aviation, from the seasoned pilot/controller
                            to the desktop enthusiast. We provide comprehensive training to members on request.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 items-center">
                        <p class="font-bold text-slate-800 text-lg">Are you interested?</p>
                        <a href="https://ivao.aero/register" target="_blank"
                            class="px-8 py-3 bg-ivao-blue text-white font-bold rounded-full hover:bg-blue-900 transition-colors shadow-md">
                            Sign up today!
                        </a>
                    </div>
                </div>
                <!-- IVAO Live Widget -->
                <div class="w-full">
                    <div class="ivao-widget" id="ivao-widget">
                        <!-- Header: stats bar -->
                        <div class="ivao-header">
                            <div class="ivao-title">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4zM3 6h18M16 10a4 4 0 01-8 0" />
                                </svg>
                                <span>IVAO Morocco Live</span>
                                <span class="ivao-live-dot" id="liveDot"></span>
                            </div>
                            <div class="ivao-stats">
                                <span class="ivao-stat"><span id="depCount">{{ count($flights['departures']) }}</span>
                                    DEP</span>
                                <span class="ivao-divider">/</span>
                                <span class="ivao-stat"><span id="arrCount">{{ count($flights['arrivals']) }}</span>
                                    ARR</span>
                            </div>
                        </div>

                        <!-- Tab switcher -->
                        <div class="ivao-tabs">
                            <button class="ivao-tab active" data-tab="departures">Departures</button>
                            <button class="ivao-tab" data-tab="arrivals">Arrivals</button>
                        </div>

                        <!-- Flight tables -->
                        <div class="ivao-body">
                            <div class="ivao-panel active" id="panel-departures">
                                @include('partials._ivao_table', ['flights' => $flights['departures'], 'type' => 'departures'])
                            </div>
                            <div class="ivao-panel" id="panel-arrivals">
                                @include('partials._ivao_table', ['flights' => $flights['arrivals'], 'type' => 'arrivals'])
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="ivao-footer">
                            <span class="ivao-updated">Updated <span
                                    id="lastUpdated">{{ date('H:i', strtotime($flights['updatedAt'] ?? 'now')) }}</span>
                                UTC</span>
                            <span class="ivao-refresh">Refresh in <span id="countdown">60</span>s</span>
                        </div>
                    </div>
                </div>

                <script>
                    (function () {
                        const tabs = document.querySelectorAll('.ivao-tab');
                        const panels = {
                            departures: document.getElementById('panel-departures'),
                            arrivals: document.getElementById('panel-arrivals')
                        };
                        let countdown = 60;
                        let timer;

                        // --- Tab logic ---
                        tabs.forEach(tab => {
                            tab.addEventListener('click', () => {
                                tabs.forEach(t => t.classList.remove('active'));
                                tab.classList.add('active');
                                Object.values(panels).forEach(p => p.classList.remove('active'));
                                panels[tab.dataset.tab].classList.add('active');
                            });
                        });

                        // --- Countdown + refresh ---
                        function tick() {
                            const el = document.getElementById('countdown');
                            if (el) {
                                el.textContent = countdown;
                                if (countdown <= 0) { refresh(); countdown = 60; }
                                countdown--;
                            }
                        }
                        timer = setInterval(tick, 1000);

                        function refresh() {
                            // Flash live dot
                            const dot = document.getElementById('liveDot');
                            if (dot) {
                                dot.style.opacity = '0.2';
                                setTimeout(() => dot.style.opacity = '1', 400);
                            }

                            fetch('{{ route("ivao.refresh") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                                }
                            })
                                .then(r => r.json())
                                .then(data => {
                                    if (data.error) return;
                                    renderTable('panel-departures', data.departures, 'departures');
                                    renderTable('panel-arrivals', data.arrivals, 'arrivals');
                                    document.getElementById('depCount').textContent = data.departures.length;
                                    document.getElementById('arrCount').textContent = data.arrivals.length;
                                    document.getElementById('lastUpdated').textContent = formatUTC(data.updatedAt);
                                })
                                .catch(e => console.error('IVAO refresh failed:', e));
                        }

                        function renderTable(panelId, flights, type) {
                            const panel = document.getElementById(panelId);
                            if (!flights || flights.length === 0) {
                                panel.innerHTML = '<div class="ivao-empty">No active ' + type + ' at the moment.</div>';
                                return;
                            }
                            let html = `<table class="ivao-table">
                                <thead><tr>
                                    <th>Callsign</th><th>VID</th><th>Route</th><th>Aircraft</th><th>Alt / Spd</th><th>State</th>
                                </tr></thead><tbody>`;

                            flights.forEach(f => {
                                const stateClass = getStateClass(f.state, f.onGround);
                                const vidHtml = f.userId
                                    ? `<a href="https://ivao.aero/Member.aspx?ID=${f.userId}" target="_blank">${f.userId}</a>`
                                    : '—';
                                html += `<tr>
                                    <td class="ivao-callsign">${f.callsign}</td>
                                    <td class="ivao-vid">${vidHtml}</td>
                                    <td class="ivao-route"><strong>${f.departure}</strong> → <strong>${f.arrival}</strong></td>
                                    <td class="ivao-route">${f.aircraft}</td>
                                    <td class="ivao-route">${f.altitude.toLocaleString()} ft &nbsp; ${f.groundSpeed} kts</td>
                                    <td><span class="ivao-state ${stateClass}"><span class="ivao-state-dot"></span>${f.state}</span></td>
                                </tr>`;
                            });
                            html += '</tbody></table>';
                            panel.innerHTML = html;
                        }

                        function getStateClass(state, onGround) {
                            if (onGround) return 'state-ground';
                            if (state === 'En Route') return 'state-enroute';
                            if (state === 'Approach' || state === 'Departure') return 'state-approach';
                            return 'state-other';
                        }

                        function formatUTC(iso) {
                            if (!iso) return '—';
                            const d = new Date(iso);
                            return d.getUTCHours().toString().padStart(2, '0') + ':' + d.getUTCMinutes().toString().padStart(2, '0');
                        }
                    })();
                </script>
            </div>
        </div>
    </section>

    <!-- Division Calendar Schedule -->
    <section class="py-20 bg-white border-y border-slate-200">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-4 font-heading tracking-tight">Division Schedule</h2>
                <p class="text-slate-500">Upcoming events, exams, and training sessions.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Event Item -->
                <div
                    class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-ivao-blue"></div>
                    <span
                        class="inline-block px-3 py-1 bg-blue-50 text-ivao-blue text-xs font-bold rounded-full mb-3 uppercase tracking-wide">Event</span>
                    <h3 class="font-bold text-slate-800 text-lg mb-1 group-hover:text-ivao-blue transition-colors">
                        Casablanca Fly-In</h3>
                    <p class="text-slate-500 text-sm mb-4">Saturday, 25 Oct • 1800z</p>
                    <a href="#" class="text-sm font-bold text-ivao-blue hover:underline">View Details &rarr;</a>
                </div>

                <!-- Online Day -->
                <div
                    class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-ivao-light"></div>
                    <span
                        class="inline-block px-3 py-1 bg-indigo-50 text-ivao-light text-xs font-bold rounded-full mb-3 uppercase tracking-wide">Online
                        Day</span>
                    <h3 class="font-bold text-slate-800 text-lg mb-1 group-hover:text-ivao-light transition-colors">Morocco
                        Online Day</h3>
                    <p class="text-slate-500 text-sm mb-4">Monday, 27 Oct • 1900z</p>
                    <a href="#" class="text-sm font-bold text-ivao-light hover:underline">Join &rarr;</a>
                </div>

                <!-- Exam -->
                <div
                    class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-ma-red"></div>
                    <span
                        class="inline-block px-3 py-1 bg-red-50 text-ma-red text-xs font-bold rounded-full mb-3 uppercase tracking-wide">Exam</span>
                    <h3 class="font-bold text-slate-800 text-lg mb-1 group-hover:text-ma-red transition-colors">ADC Exam -
                        GMMN</h3>
                    <p class="text-slate-500 text-sm mb-4">Thursday, 30 Oct • 2000z</p>
                    <a href="#" class="text-sm font-bold text-ma-red hover:underline">Details &rarr;</a>
                </div>

                <!-- Training -->
                <div
                    class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-ivao-green"></div>
                    <span
                        class="inline-block px-3 py-1 bg-green-50 text-ivao-green text-xs font-bold rounded-full mb-3 uppercase tracking-wide">Training</span>
                    <h3 class="font-bold text-slate-800 text-lg mb-1 group-hover:text-ivao-green transition-colors">Pilot
                        First Steps</h3>
                    <p class="text-slate-500 text-sm mb-4">Friday, 31 Oct • 1500z</p>
                    <a href="#" class="text-sm font-bold text-ivao-green hover:underline">Register &rarr;</a>
                </div>
            </div>

            <div class="mt-12 flex justify-center">
                <a href="{{ route('events.index') }}"
                    class="px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-full hover:bg-slate-200 transition-colors">
                    View Full Calendar
                </a>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-20 bg-[#F8F9FA] border-t border-slate-200">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-12 font-heading tracking-tight">Our Partners</h2>
            <div
                class="flex flex-wrap justify-center gap-12 items-center opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                <!-- Partner Placeholders -->
                <div
                    class="h-16 w-48 bg-white rounded-lg flex items-center justify-center text-slate-400 font-bold border border-slate-200 shadow-sm">
                    PARTNER 1
                </div>
                <div
                    class="h-16 w-48 bg-white rounded-lg flex items-center justify-center text-slate-400 font-bold border border-slate-200 shadow-sm">
                    PARTNER 2
                </div>
                <div
                    class="h-16 w-48 bg-white rounded-lg flex items-center justify-center text-slate-400 font-bold border border-slate-200 shadow-sm">
                    PARTNER 3
                </div>
                <div
                    class="h-16 w-48 bg-white rounded-lg flex items-center justify-center text-slate-400 font-bold border border-slate-200 shadow-sm">
                    PARTNER 4
                </div>
            </div>
        </div>
    </section>
@endsection