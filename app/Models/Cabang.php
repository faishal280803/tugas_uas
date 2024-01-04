<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabang';

    protected $fillable = [
        'nama_cabang',
        'no_telp_cabang',
        'alamat_cabang'
    ];
}
