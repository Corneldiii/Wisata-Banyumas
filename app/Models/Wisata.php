<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'table_wisata';

    protected $fillable = [
        'nama_wisata',
        'alamat',
        'deskripsi',
        'harga_tiket',
        'latitude',
        'longitude',
        'foto',
    ];
}

