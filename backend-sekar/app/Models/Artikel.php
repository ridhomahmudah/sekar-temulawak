<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel'; // Nama tabel jika berbeda dari konvensi
    protected $primaryKey = 'id_artikel';

    // Properti untuk mass assignment
    protected $fillable = [
        'title',
        'body',
        'status',
        'tag',
        'gambar',
        'jumlah_pembaca',
        'publish_date', // Pastikan sesuai dengan nama kolom di database
    ];

    // Properti untuk tipe data
    protected $casts = [
        'status' => 'boolean', // Cast to boolean
        'jumlah_pembaca' => 'integer', // Cast to integer
        'publish_date' => 'date', // Cast to date
    ];
}
