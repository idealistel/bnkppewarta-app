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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->string('keluarga_id')->unique()->primary();
            $table->foreignId('kelurahan_id')->references('id')->on('kelurahan');
            $table->foreignId('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->string('nama');
            $table->string('alias')->nullable();
            $table->text('alamat');
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};
