<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'nama',
        'tanggal',
        'visitor',
        'total_harga',
        'id_wisata',
        'id_akun'
    ];
}
