<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan model Produk di-import
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua produk dari database
        $produk = Produk::all(); // Jika kamu ingin menerapkan paginasi, gunakan Produk::paginate($perPage)

        // Mengembalikan response JSON dengan status 200 dan data produk
        return response()->json($produk);
    }
}
