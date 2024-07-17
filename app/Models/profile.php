<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $table = 'profil';

    protected $fillable = [
        'id_akun',
        'foto_akun'
    ];
}
