<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class IvaoAuthController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id' => config('services.ivao.client_id'),
            'redirect_uri' => config('services.ivao.redirect_uri'),
            'response_type' => 'code',
            'scope' => 'openid profile email discord',
            'state' => Str::random(40),
        ]);

        return redirect('https://sso.ivao.aero/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        $code = $request->code;

        if (!$code) {
            return redirect()->route('home')->with('error', 'Authentication failed.');
        }

        // 1. Get Token
        $response = Http::withoutVerifying()->asForm()->post('https://api.ivao.aero/v2/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => config('services.ivao.client_id'),
            'client_secret' => config('services.ivao.client_secret'),
            'redirect_uri' => config('services.ivao.redirect_uri'),
            'code' => $code,
        ]);

        if ($response->failed()) {
            return redirect()->route('home')->with('error', 'Failed to retrieve IVAO token.');
        }

        $token = $response->json()['access_token'];

        // 2. Get User Info
        $userResponse = Http::withoutVerifying()->withToken($token)->get('https://api.ivao.aero/v2/users/me');

        if ($userResponse->failed()) {
            return redirect()->route('home')->with('error', 'Failed to retrieve IVAO user info.');
        }

        $ivaoUser = $userResponse->json();

        // 3. Login or Create User
        $user = User::updateOrCreate(
            ['vid' => $ivaoUser['id']],
            [
                'name' => $ivaoUser['firstName'] . ' ' . $ivaoUser['lastName'],
                'email' => $ivaoUser['email'],
                'rating_atc' => $ivaoUser['rating']['atcRating']['id'] ?? 0,
                'rating_pilot' => $ivaoUser['rating']['pilotRating']['id'] ?? 0,
                'division' => $ivaoUser['divisionId'] ?? 'MA',
                'staff' => array_map(fn($s) => $s['shortName'] ?? $s['id'] ?? 'Staff', $ivaoUser['userStaffPositions'] ?? []),
                'gca' => array_column($ivaoUser['gcas'] ?? [], 'divisionId'),
                'discord' => $ivaoUser['familyProfile']['discordUserId'] ?? null,
                'ivao_token' => $token,
                'password' => Str::random(32), // Random password for SSO users
            ]
        );

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Logged in successfully via IVAO!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
