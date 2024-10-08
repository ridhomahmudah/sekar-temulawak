<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontenStaticTable extends Migration
{
    public function up()
    {
        Schema::create('konten_static', function (Blueprint $table) {
            $table->id('id_Konten');
            $table->char('halaman', 1);
            $table->string('isi', 2000);
            $table->char('foto', 200);
        });
    }

    public function down()
    {
        Schema::dropIfExists('konten_static');
    }
}
