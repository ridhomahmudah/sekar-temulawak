<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan pengguna ke database
        DB::table('pengguna')->insert([
            'nama' => 'John Doe',
            'telp' => '081234567890',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
            'alamat' => 'Jl. Mawar No. 123, Jakarta',
            'role' => 1, // 1 = pelanggan
            'google_id' => null,
            'google_token' => null,
            'google_refresh_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
