<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Str::random(60);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            // Kembalikan response dengan token dan nama pengguna
            return response()->json([
                'message' => 'Login berhasil',
                'Nama' => $user->nama,
                'token' => $token, // Gunakan Laravel Sanctum atau Passport untuk token
                'id' => $user->id_Pengguna, // Gunakan Laravel Sanctum atau Passport untuk token
            ]);
        }

        return response()->json(['message' => 'Email atau password salah, silahkan coba lagi'], 401);
    }
}



?>