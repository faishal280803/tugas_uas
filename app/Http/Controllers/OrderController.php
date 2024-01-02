<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order($id)
    {
        $order = Order::create([
            'id_produk' => $id,
            'id_user' => auth()->id(),
            'status' => 0
        ]);


        if ($order) {
            return redirect('/')->with('message', 'Berhasil Memesan Barang!');
        } else {
            return redirect('/')->with('error', 'Gagal Memesan, Silahkan Coba lagi!');
        }
    }

    public function myOrder()
    {
        $data['order'] = Order::where('id_user', auth()->id())
            ->join('produk', 'produk.id', '=', 'order.id_produk')
            ->select('order.*', 'produk.*')->get();
        $data['is_active'] = '';
        return view('page.my-order', $data);
    }
}
