<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'nama']
        ];
    }

    // Menentukan nama tabel jika tidak sesuai dengan konvensi
    protected $table = 'produk';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        // 'status',
        // 'kategori',
    ];

    // Jika perlu, bisa menambahkan relasi dengan model lain
    // Misalnya, relasi ke model Keranjang jika ada
    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class, 'id_produk', 'id_produk');
    }
}
