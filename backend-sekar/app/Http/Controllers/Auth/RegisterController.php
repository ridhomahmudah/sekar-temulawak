<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    public function redirect()
    {
        return response()->json(['redirect_url' => Socialite::driver('google')->redirect()->getTargetUrl()]);
    }

    public function callback(Request $request)
    {
        try {
            $socialUser = Socialite::driver($request)->user();
            
            $user = Pengguna::updateOrCreate([
                'google_id' => $socialUser->id,
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);

            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google authentication failed');
        }
    }
}
?>