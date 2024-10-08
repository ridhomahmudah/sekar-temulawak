<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->id('id_pesan');
            $table->char('subject', 60);
            $table->string('body', 2000);
            $table->date('tanggal');
            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id_pengguna')->on('pengguna');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesan');
    }
}
