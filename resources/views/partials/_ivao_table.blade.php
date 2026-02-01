{{-- $flights = array of mapped flights, $type = 'departures' | 'arrivals' --}}

@if (empty($flights))
    <div class="ivao-empty">No active {{ $type }} at the moment.</div>
@else
    <table class="ivao-table">
        <thead>
            <tr>
                <th>Callsign</th>
                <th>VID</th>
                <th>Route</th>
                <th>Aircraft</th>
                <th>Alt / Spd</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flights as $f)
                @php
                    $stateClass = match (true) {
                        $f['onGround'] => 'state-ground',
                        $f['state'] === 'En Route' => 'state-enroute',
                        in_array($f['state'], ['Approach', 'Departure']) => 'state-approach',
                        default => 'state-other',
                    };
                @endphp
                <tr>
                    <td class="ivao-callsign">{{ $f['callsign'] }}</td>
                    <td class="ivao-vid">
                        @if ($f['userId'])
                            <a href="https://ivao.aero/Member.aspx?ID={{ $f['userId'] }}" target="_blank">{{ $f['userId'] }}</a>
                        @else
                            —
                        @endif
                    </td>
                    <td class="ivao-route">
                        <strong>{{ $f['departure'] }}</strong> → <strong>{{ $f['arrival'] }}</strong>
                    </td>
                    <td class="ivao-route">{{ $f['aircraft'] }}</td>
                    <td class="ivao-route">{{ number_format($f['altitude']) }} ft &nbsp; {{ $f['groundSpeed'] }} kts</td>
                    <td>
                        <span class="ivao-state {{ $stateClass }}">
                            <span class="ivao-state-dot"></span>
                            {{ $f['state'] }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif