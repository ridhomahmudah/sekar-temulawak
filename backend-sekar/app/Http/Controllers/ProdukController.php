<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Produk; // Pastikan model Produk di-import
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProdukController extends Controller
{
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Produk::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
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

    public function store(Request $request)
    {
        // Menampilkan semua data yang diterima dari permintaan
        Log::info('Request received:', $request->all());

        // Memeriksa apakah token CSRF ada
        if (!$request->session()->has('_token')) {
            Log::warning('CSRF token is missing!');
        }

        return response()->json($request->all());
        // return view('admin-produk.insert', [
        //     'title' => 'Tambah Produk'
        // ]);
    }
}
