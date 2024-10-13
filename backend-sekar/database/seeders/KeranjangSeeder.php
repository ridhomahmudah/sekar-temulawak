<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan ID pengguna dan produk
        $idPengguna = DB::table('pengguna')->where('email', 'johndoe@example.com')->value('id_Pengguna');
        $idProduk = DB::table('produk')->where('id_produk', '2')->value('id_produk');

        // Menambahkan produk ke keranjang pengguna
        DB::table('keranjang')->insert([
            'jumlah' => 2, // Jumlah produk yang ditambahkan ke keranjang
            'id_pelanggan' => $idPengguna,
            'id_produk' => $idProduk,
        ]);
    }
}
