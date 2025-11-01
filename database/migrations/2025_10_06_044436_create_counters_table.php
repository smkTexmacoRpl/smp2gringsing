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
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('siswa')->default(0);
            $table->bigInteger('alumni')->default(0);
            $table->bigInteger('guru')->default(0);
            $table->bigInteger('tendik')->default(0);
            $table->bigInteger('kelas')->default(0);
            $table->bigInteger('staff')->default(0);
            $table->bigInteger('penghargaan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
