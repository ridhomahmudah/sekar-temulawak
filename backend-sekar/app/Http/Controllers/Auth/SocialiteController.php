<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

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

    public function callback()
    {


        Log::info('Masuk ke callback Google');
        // Log the incoming request state
        Log::info('Request State: ' . request('state'));
        $socialUser = Socialite::driver('google')->stateless()->user();
        $user = Pengguna::where('google_id', $socialUser->id)->first();
        Log::info('Pengguna berhasil diambil: ', (array) $socialUser);

        if(!$user){
            Pengguna::updateOrCreate([
                'google_id' => $socialUser->id,
                'Nama' => $socialUser->name,
                'Email' => $socialUser->email,
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);
        }

        $frontendUrl = 'http://localhost:5173/';
        $token = $socialUser->token;
        return redirect($frontendUrl . '?tkn=' . $token);
    }
}
