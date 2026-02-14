<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cabangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_cabang');
            $table->text('alamat');
            $table->string('telepon', 20);
            $table->string('jam_buka', 50)->default('10:00');
            $table->string('jam_tutup', 50)->default('22:00');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cabangs');
    }
};
