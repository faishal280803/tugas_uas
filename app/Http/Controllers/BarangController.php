<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data['produk'] = Produk::all();
        $data['is_active'] = 'barang';
        return view('page.barang', $data);
    }
}
