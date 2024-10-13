<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->date('tanggal');
            $table->integer('metode')->nullable();
            $table->enum('status', ['PENDING', 'BELUMDIBAYAR', 'SUDAHDIBAYAR', 'DIBATALKAN'])->default('PENDING');
            $table->integer('total_bayar');
            $table->timestamps();

            // Foreign key untuk pelanggan
            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
