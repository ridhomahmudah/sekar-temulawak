<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_Pengguna'); // Primary key dengan auto-increment
            $table->char('nama', 50);
            $table->char('telp', 16)->nullable();
            $table->char('email', 60)->unique();
            $table->char('password', 16)->nullable();
            $table->char('alamat', 250)->nullable();
            $table->integer('role')->nullable();
            $table->string('google_id', 255)->nullable();
            $table->string('google_token', 255)->nullable();
            $table->string('google_refresh_token', 255)->nullable();
            $table->timestamps(6); // Menambah kolom `created_at` dan `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};


?>