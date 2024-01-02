<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['produk'] = Produk::latest()->take(3)->get();
        $data['is_active'] = 'home';
        return view('page.index', $data);
    }
}
