<?php

namespace App\Http\Controllers;

use App\Models\Artikel; // Pastikan untuk mengimpor model Artikel
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    // Method untuk mengambil semua artikel
    public function index()
    {
        $artikels = Artikel::all(); // Mengambil semua data artikel
        return response()->json($artikels); // Mengembalikan data dalam format JSON
    }

    // Method untuk mengambil artikel berdasarkan ID
    public function show($id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
        }

        return response()->json($artikel);
    }
}
