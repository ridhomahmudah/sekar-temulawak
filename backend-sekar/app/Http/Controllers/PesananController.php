<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    // Membuat pesanan baru saat checkout
    public function create(Request $request)
{
    // Debugging: Log input request
    \Log::info('Create Pesanan Request:', [
        'total_bayar' => $request->total_bayar,
        'id_pelanggan' => $request->id_pelanggan,
        'items' => $request->items,
    ]);

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

        // Debugging: Log pesanan yang baru dibuat
        \Log::info('Pesanan created:', ['pesanan' => $pesanan]);

        // Tambahkan detail pesanan
        foreach ($request->items as $item) {
            // Debugging: Log setiap item yang akan ditambahkan
            \Log::info('Adding item to pesanan:', $item);
            DetailPesanan::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'id_produk' => $item['id_produk'],
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
                'total' => $item['total'],
            ]);
        }

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

        if (!$pesanan || $pesanan->status != 1) {
            return response()->json(['error' => 'Pesanan tidak ditemukan atau sudah dikonfirmasi'], 404);
        }

        // Update pesanan dengan metode pembayaran dan alamat
        $pesanan->update([
            'metode' => $request->metode_pembayaran,
            'status' => 2, // Menunggu pembayaran
        ]);

        return response()->json(['message' => 'Pesanan berhasil dikonfirmasi']);
    }

    // Batalkan pesanan
    public function cancel($id_pesanan)
    {
        $pesanan = Pesanan::find($id_pesanan);

        if (!$pesanan || $pesanan->status != 1) {
            return response()->json(['error' => 'Pesanan tidak ditemukan atau tidak dapat dibatalkan'], 404);
        }

        $pesanan->delete(); // Hapus pesanan
        return response()->json(['message' => 'Pesanan dibatalkan']);
    }
}
