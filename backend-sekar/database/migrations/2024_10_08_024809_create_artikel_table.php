<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('id_artikel');
            $table->char('title', 70);
            $table->string('body', 2000);
            $table->integer('status');
            $table->char('tag', 30);
            $table->char('gambar', 200);
            $table->integer('jumlah_pembaca');
            $table->date('publish');
            $table->date('Pdate');
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}
