<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->date('tanggal');
            $table->integer('total_penjualan');
            $table->integer('produk_terjual');
            $table->integer('jumlah_pesanan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
