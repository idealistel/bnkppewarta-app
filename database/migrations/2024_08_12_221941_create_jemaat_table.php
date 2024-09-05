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
        Schema::create('jemaat', function (Blueprint $table) {
            $table->string('stambuk')->unique()->primary();
            $table->string('keluarga_id');
            $table->foreign('keluarga_id')->references('keluarga_id')->on('keluarga')->onDelete('cascade');
            $table->string('nama');
            $table->string('alias')->nullable();
            $table->string('jeniskelamin');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('hubungankeluarga');
            $table->string('namaayah')->nullable();
            $table->string('namaibu')->nullable();
            $table->string('statusbaptis');
            $table->date('tanggalbaptis')->nullable();
            $table->string('gerejabaptis')->nullable();
            $table->string('resortbaptis')->nullable();
            $table->string('aktabaptis')->nullable();
            $table->string('statussidi');
            $table->date('tanggalsidi')->nullable();
            $table->string('gerejasidi')->nullable();
            $table->string('resortsidi')->nullable();
            $table->string('aktasidi')->nullable();
            $table->string('statusnikah');
            $table->date('tanggalnikah')->nullable();
            $table->string('gerejanikah')->nullable();
            $table->string('resortnikah')->nullable();
            $table->string('aktanikah')->nullable();
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->date('tanggaldaftar')->nullable();
            $table->string('hp')->nullable();
            $table->string('status')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jemaat');
    }
};
