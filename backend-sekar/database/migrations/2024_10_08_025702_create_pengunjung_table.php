<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengunjungTable extends Migration
{
    public function up()
    {
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->date('tanggal');
            $table->integer('jumlah');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengunjung');
    }
}
