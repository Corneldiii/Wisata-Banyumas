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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal');
            $table->integer('visitor');
            $table->integer('total_harga');
            $table->unsignedBigInteger('id_wisata');
            $table->unsignedBigInteger('id_akun');
            $table->timestamps();

            $table->foreign('id_wisata')->references('id')->on('table_wisata')->onDelete('cascade');
            $table->foreign('id_akun')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
