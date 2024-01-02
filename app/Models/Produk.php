<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'nama_barang',
        'foto_barang',
        'id_kategori',
        'id_cabang',
        'id_supplier',
        'harga_jual',
        'harga_beli',
        'stok'
    ];
}
