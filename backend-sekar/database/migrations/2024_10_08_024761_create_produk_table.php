<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->char('nama', 50);
            $table->string('deskripsi', 3000);
            $table->integer('harga');
            $table->integer('stok');
            $table->string('gambar', 200);
            $table->integer('status');
            $table->integer('kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
