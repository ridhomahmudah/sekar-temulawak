<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'Nama' => 'required|string|max:50',
            'Email' => 'required|string|email|max:60', // memastikan email unik
            'Password' => 'required|string|min:8', // memastikan password minimal 8 karakter dan konfirmasi
        ]);

        // Jika validasi gagal, kembalikan respon error
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pengguna = Pengguna::create([
            'Nama' => $request->Nama,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password), // Hashing password
        ]);

        // Buat token untuk user (jika menggunakan token)
        // $token = $pengguna->createToken('auth_token')->plainTextToken;

        // Kembalikan respon sukses beserta data user dan token
        return response()->json([
            'Nama' => $pengguna->Nama,
            'Email' => $pengguna->Email,
            // 'token' => $token,
        ], 201);
    }
}
?>