<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'jumlah',
        'id_pelanggan',
        'id_produk',
    ];

    // Relasi ke model Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pelanggan', 'id_pengguna');
    }

    // Relasi ke model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
