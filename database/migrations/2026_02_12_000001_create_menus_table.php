<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration — buat tabel menus.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu', 100);
            $table->unsignedInteger('harga');
            $table->string('kategori', 50);
            $table->timestamps();
        });
    }

    /**
     * Rollback migration — hapus tabel menus.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
