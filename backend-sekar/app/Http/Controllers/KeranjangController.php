<?php

namespace App\Http\Controllers;

use App\Models\Keranjang; // Pastikan model Keranjang sudah ada
use DB;
use Illuminate\Http\Request;
use Log;

class KeranjangController extends Controller
{
    /**
     * Mendapatkan semua produk di keranjang untuk pengguna tertentu.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idPengguna = $request->header('id_pengguna');

        // Ambil semua item di keranjang untuk pengguna ini
        $keranjangs = Keranjang::with('produk') // Mengambil data produk yang terkait
            ->where('id_pelanggan', $idPengguna) // Filter berdasarkan ID pengguna
            ->get();

        // Kembalikan response dalam format JSON
        return response()->json($keranjangs);
    }

    /**
     * Menambahkan produk ke keranjang (Opsional).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_produk' => 'required|exists:produk,id_produk', // Pastikan produk ada
            'kuantitas' => 'required|integer|min:1', // Kuantitas minimal 1
            'id_pengguna' => 'required|integer', // Pastikan ID pengguna ada
        ]);

        // Cek apakah produk sudah ada di keranjang untuk pengguna ini
        $keranjangItem = Keranjang::where('id_pelanggan', $validatedData['id_pengguna'])
            ->where('id_produk', $validatedData['id_produk'])
            ->first();

        if ($keranjangItem) {
            // Jika produk sudah ada di keranjang, update jumlahnya
            Keranjang::where('id_produk', $validatedData['id_produk'])
                ->update(['jumlah' => $keranjangItem->jumlah + $validatedData['kuantitas']]);
            return response()->json(['Model' => Keranjang::get()]);
        } else {
            // Jika produk belum ada, tambahkan ke keranjang
            Keranjang::create([
                'jumlah' => $validatedData['kuantitas'],
                'id_pelanggan' => $validatedData['id_pengguna'], // Ambil ID pengguna dari request
                'id_produk' => $validatedData['id_produk'],
            ]);

            return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang']);
        }
    }

    // Fungsi untuk menghapus produk dari keranjang
    public function destroy($id)
    {
        \Log::info("Menghapus produk dari keranjang dengan id_keranjang: " . $id);

        // Gunakan DB facade untuk menghapus item
        $deleted = DB::table('keranjang')->where('id_produk', $id)->delete();

        if ($deleted) {
            \Log::info("Produk dengan id_keranjang: " . $id . " berhasil dihapus.");
            return response()->json(['message' => 'Produk berhasil dihapus dari keranjang']);
        } else {
            \Log::error("Produk dengan id_keranjang: " . $id . " tidak ditemukan.");
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
    }



}

