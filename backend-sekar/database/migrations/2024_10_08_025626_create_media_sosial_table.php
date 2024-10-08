<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaSosialTable extends Migration
{
    public function up()
    {
        Schema::create('media_sosial', function (Blueprint $table) {
            $table->id('id_Media');
            $table->char('nama', 50);
            $table->char('url', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_sosial');
    }
}
