<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangTable extends Migration
{
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id('id_Keranjang');
            $table->integer('jumlah');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_produk');
            $table->timestamps(6);
            $table->foreign('id_pelanggan')->references('id_pengguna')->on('pengguna');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
        });
    }

    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}
