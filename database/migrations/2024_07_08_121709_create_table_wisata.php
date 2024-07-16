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
        Schema::create('table_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->string('alamat');
            $table->text('deskripsi');
            $table->decimal('harga_tiket');
            $table->decimal('latitude',20,15);
            $table->decimal('longitude',20,15);
            $table->string('foto'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_wisata');
    }
};
