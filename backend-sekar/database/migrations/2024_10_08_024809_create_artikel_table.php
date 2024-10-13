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
            $table->string('title', 255); // Adjusted for better flexibility
            $table->text('body'); // Using text for larger content
            $table->boolean('status'); // 0: Draft, 1: Published
            $table->string('tag', 100); // Made more flexible for tags
            $table->string('gambar', 255)->nullable(); // Nullable image
            $table->integer('jumlah_pembaca')->default(0); // Default to 0 readers
            $table->date('publish_date'); // Renamed from 'Pdate'
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}
