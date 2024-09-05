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
        Schema::create('statusjemaat', function (Blueprint $table) {
            $table->id();
            $table->string('stambuk');
            $table->foreign('stambuk')->references('stambuk')->on('jemaat')->onDelete('cascade');
            $table->date('tanggalstatus');
            $table->string('status1');
            $table->string('status2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statusjemaat');
    }
};
