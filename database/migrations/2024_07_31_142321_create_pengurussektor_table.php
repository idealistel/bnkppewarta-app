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
        Schema::create('pengurussektor', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->date('prdawal');
            $table->date('prdakhir');
            $table->string('koordinator');
            $table->string('sekretaris');
            $table->string('bendahara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurussektor');
    }
};
