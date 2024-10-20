<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{

    public function index(Request $request)
    {
        // Pastikan id_pelanggan dikirimkan (bisa dari token login atau localStorage)
        $id_pelanggan = $request->header('id_pengguna');

        if (!$id_pelanggan) {
            return response()->json(['error' => 'ID pelanggan tidak ditemukan'], 400);
        }

        // Ambil semua pesanan milik pelanggan berdasarkan id_pelanggan
        $pesananList = Pesanan::where('id_pelanggan', $id_pelanggan)
            ->with(['detailPesanan.produk']) // Include detail pesanan dan produk terkait
            ->get();

        // Cek apakah ada pesanan
        if ($pesananList->isEmpty()) {
            return response()->json(['message' => 'Tidak ada pesanan ditemukan'], 404);
        }

        // Return daftar pesanan dengan detail produk
        return response()->json($pesananList);
    }


    // Membuat pesanan baru saat checkout
    public function create(Request $request)
    {

        DB::beginTransaction();

        try {
            // Buat pesanan baru dengan metode pembayaran null
            $pesanan = Pesanan::create([
                'tanggal' => now(),
                'metode' => null, // Metode pembayaran belum dipilih
                'status' => 'PENDING', // Status pending
                'total_bayar' => $request->total_bayar,
                'id_pelanggan' => $request->id_pelanggan, // Pastikan pengguna sudah login
            ]);

            // Tambahkan detail pesanan
            foreach ($request->items as $item) {
                DetailPesanan::create([
                    'id_pesanan' => $pesanan->id_pesanan,
                    'id_produk' => $item['id_produk'],
                    'jumlah' => $item['jumlah'],
                    'harga' => $item['harga'],
                    'total' => $item['total'],
                ]);
            }

            // Hapus item dari keranjang setelah pesanan berhasil dibuat
            DB::table('keranjang')
                ->where('id_pelanggan', $request->id_pelanggan)
                ->whereIn('id_produk', array_column($request->items, 'id_produk'))
                ->delete();

            DB::commit();
            return response()->json(['message' => 'Pesanan berhasil dibuat', 'pesanan' => $pesanan]);
        } catch (\Exception $e) {
            DB::rollBack();
            // Debugging: Log error yang terjadi
            \Log::error('Error creating pesanan:', [
                'error' => $e->getMessage(),
                'request' => $request->all(), // Log request data untuk analisis lebih lanjut
            ]);
            return response()->json(['error' => 'Gagal membuat pesanan: ' . $e->getMessage()], 500);
        }
    }


    // Konfirmasi pesanan
    public function confirm(Request $request, $id_pesanan)
    {
        $pesanan = Pesanan::find($id_pesanan);

        if (!$pesanan || $pesanan->status != 'PENDING') {
            return response()->json(['error' => 'Pesanan tidak ditemukan atau sudah dikonfirmasi'], 404);
        }

        // Update pesanan dengan metode pembayaran dan alamat
        $pesanan->update([
            'metode' => $request->metode_pembayaran,
            'status' => 'MENUNGGU PEMBAYARAN', // Menunggu pembayaran
        ]);

        return response()->json(['message' => 'Pesanan berhasil dikonfirmasi']);
    }

    // Batalkan pesanan
    public function cancel($id_pesanan)
    {
        $pesanan = Pesanan::find($id_pesanan);

        if (!$pesanan || $pesanan->status != 'PENDING') {
            return response()->json(['error' => 'Pesanan tidak ditemukan atau tidak dapat dibatalkan'], 404);
        }

        $pesanan->delete(); // Hapus pesanan
        return response()->json(['message' => 'Pesanan dibatalkan']);
    }
}
