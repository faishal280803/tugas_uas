<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        if ($request->input('quantity') > $produk->stok) {
            return redirect(url()->previous())->with('error', 'Stok Hanya ada ' . $produk->stok . '!');
        } else {
            $order = Order::create([
                'id_produk' => $id,
                'id_user' => auth()->id(),
                'quantity' => $request->input('quantity'),
                'total' => $produk->harga_jual * $request->input('quantity'),
                'status' => 0
            ]);

            if ($order) {
                return redirect(url()->previous())->with('message', 'Berhasil Memesan Barang!');
            } else {
                return redirect(url()->previous())->with('error', 'Gagal Memesan, Silahkan Coba lagi!');
            }
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
