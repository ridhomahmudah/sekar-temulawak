<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Produk; // Pastikan model Produk di-import

class ProdukController extends Controller
{
    public function admin_index(Request $request)
    {
        $search = $request->input('search');

        $produks = Produk::when($search, function ($query, $search) {
            $query->where('nama', 'LIKE', "%{$search}%")
                ->orWhere('harga', 'LIKE', "%{$search}%");
        })->paginate(12);

        return view('admin-produk.index', [
            'title' => 'Daftar Produk',
            'produks' => $produks,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('admin-produk.insert', [
            'title' => 'Tambah Produk'
        ]);
    }
    public function index(Request $request)
    {
        // Mengambil semua produk dari database
        $produk = Produk::all(); // Jika kamu ingin menerapkan paginasi, gunakan Produk::paginate($perPage)

        // Mengembalikan response JSON dengan status 200 dan data produk
        return response()->json($produk);
    }

    public function store()
    {
        // Log::info('Request received:', $request->all());
        // dd($request->all());

        return view('admin-produk.insert', [
            'title' => 'Tambah Produk'
        ]);
    }
}
