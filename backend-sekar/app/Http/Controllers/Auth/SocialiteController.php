<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function redirect()
    {
        try {
            Log::info('Memulai redirect Google');
            $url = Socialite::driver('google')->redirect()->getTargetUrl();

            Log::info('URL redirect Google: ' . $url);
            Log::info('State parameter: ' . session('state'));
            return response()->json(['redirect_url' => $url]);
        } catch (\Exception $e) {
            Log::error('Error saat redirect Google: ' . $e->getMessage());
            return response()->json(['error' => 'Tidak dapat memulai autentikasi Google: ' . $e->getMessage()], 500);
        }
    }

    public function callback(Request $request)
    {
        Log::info('Masuk ke callback Google');
        
        $authCode = $request->query('code');

        Log::info('Received auth code: ' . $authCode);
        Log::info('Request State: ' . request('state'));
        Log::info('Request Code: ' . request('code'));

        $socialUser = Socialite::driver('google')->stateless()->user();

        // Update atau buat pengguna baru
        if (
            Pengguna::where('google_id', $socialUser->getId())->exists()
        ) {
            Pengguna::where('google_id', $socialUser->getId())->update([
                'Nama' => $socialUser->getName(),
                'Email' => $socialUser->getEmail(),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);
        } else {
            Pengguna::create([
                'Nama' => $socialUser->getName(),
                'Email' => $socialUser->getEmail(),
                'google_id' => $socialUser->getId(),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshtoken,
            ]);
        }
        $cookie = cookie('athtkn', $socialUser->token, 60, null, null, true, true); // HTTP-only dan secure

        return response()->json([
            'Nama' => $socialUser->getName(),
            'Email' => $socialUser->getEmail(),
            'google_id' => $socialUser->getId(),
            'google_token' => $socialUser->token,
            'login' => true,
        ])->cookie($cookie);

    }
}

