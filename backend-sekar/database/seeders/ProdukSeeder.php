<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        // Daftar produk yang ingin diisi
        $produks = [
            [
                'nama' => 'Jamu Temulawak',
                'deskripsi' => 'Jamu alami yang terbuat dari temulawak, dipercaya dapat meningkatkan stamina dan kesehatan tubuh.',
                'harga' => 20000,
                'stok' => 50,
                'gambar' => 'images/jamu_temulawak.jpg',
                'status' => 1,
                'kategori' => 1,
            ],
            [
                'nama' => 'Minuman Ekstrak Temulawak',
                'deskripsi' => 'Minuman sehat dari ekstrak temulawak, membantu detoksifikasi tubuh dan meningkatkan metabolisme.',
                'harga' => 25000,
                'stok' => 30,
                'gambar' => 'images/minuman_ekstrak_temulawak.jpg',
                'status' => 1,
                'kategori' => 1,
            ],
            [
                'nama' => 'Sabun Herbal Temulawak',
                'deskripsi' => 'Sabun mandi alami yang terbuat dari temulawak, memberikan kesegaran dan kelembapan pada kulit.',
                'harga' => 15000,
                'stok' => 20,
                'gambar' => 'images/sabun_herbal_temulawak.jpg',
                'status' => 1,
                'kategori' => 2,
            ],
            [
                'nama' => 'Kapsul Temulawak',
                'deskripsi' => 'Kapsul herbal dari ekstrak temulawak, praktis dan mudah dikonsumsi untuk kesehatan harian.',
                'harga' => 30000,
                'stok' => 15,
                'gambar' => 'images/kapsul_temulawak.jpg',
                'status' => 1,
                'kategori' => 2,
            ],
            [
                'nama' => 'Teh Temulawak',
                'deskripsi' => 'Teh herbal yang menyegarkan dengan aroma khas temulawak, ideal untuk relaksasi.',
                'harga' => 12000,
                'stok' => 25,
                'gambar' => 'images/teh_temulawak.jpg',
                'status' => 1,
                'kategori' => 3,
            ],
            [
                'nama' => 'Minyak Temulawak',
                'deskripsi' => 'Minyak alami dari temulawak, dapat digunakan untuk perawatan kulit dan pijat.',
                'harga' => 22000,
                'stok' => 10,
                'gambar' => 'images/minyak_temulawak.jpg',
                'status' => 1,
                'kategori' => 3,
            ],
            [
                'nama' => 'Masker Wajah Temulawak',
                'deskripsi' => 'Masker wajah alami dari temulawak, membantu mencerahkan dan menjaga kelembapan kulit.',
                'harga' => 18000,
                'stok' => 18,
                'gambar' => 'images/masker_wajah_temulawak.jpg',
                'status' => 1,
                'kategori' => 4,
            ],
            [
                'nama' => 'Krim Temulawak',
                'deskripsi' => 'Krim wajah yang terbuat dari temulawak, merawat kulit wajah dan mengurangi jerawat.',
                'harga' => 25000,
                'stok' => 12,
                'gambar' => 'images/krim_temulawak.jpg',
                'status' => 1,
                'kategori' => 4,
            ],
            [
                'nama' => 'Sirup Temulawak',
                'deskripsi' => 'Sirup manis dan segar yang terbuat dari temulawak, cocok untuk campuran minuman atau langsung diminum.',
                'harga' => 17000,
                'stok' => 8,
                'gambar' => 'images/sirup_temulawak.jpg',
                'status' => 1,
                'kategori' => 5,
            ],
            [
                'nama' => 'Ruang Aroma Temulawak',
                'deskripsi' => 'Pengharum ruangan alami berbasis temulawak, memberikan suasana segar dan menenangkan.',
                'harga' => 29000,
                'stok' => 5,
                'gambar' => 'images/ruang_aroma_temulawak.jpg',
                'status' => 1,
                'kategori' => 5,
            ],
        ];

        // Menginsert data produk ke dalam tabel
        DB::table('produk')->insert($produks);
    }
}
