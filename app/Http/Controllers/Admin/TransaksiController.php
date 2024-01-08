<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class TransaksiController extends Controller
{
    public function masuk()
    {
        $data['is_active'] = 'masuk';
        $data['transaksi'] = DB::table('order')
            ->join('users', 'users.id', '=', 'order.id_user')
            ->join('produk', 'produk.id', '=', 'order.id_produk')
            ->select(
                'order.*',
                'users.nama_lengkap',
                'produk.nama_barang',
                'produk.foto_barang',
                'produk.harga_jual as harga_barang',
            )
            ->where('status', 0)->get();
        return view('admin.transaksi.masuk', $data);
    }

    public function selesai()
    {
        $data['is_active'] = 'selesai';
        $data['transaksi'] = DB::table('order')
            ->join('users', 'users.id', '=', 'order.id_user')
            ->join('produk', 'produk.id', '=', 'order.id_produk')
            ->select(
                'order.*',
                'users.nama_lengkap',
                'produk.nama_barang',
                'produk.foto_barang',
                'produk.harga_jual as harga_barang',
            )->get();
        return view('admin.transaksi.selesai', $data);
    }

    public function terima($id)
    {
        $order = Order::findOrFail($id);
        $produk = Produk::findOrFail($order->id_produk);
        $order->update([
            'status' => 1,
        ]);
        $produk->update([
            'stok' => $produk->stok - $order->quantity,
        ]);

        if ($order && $produk) {
            return redirect(URL::previous())->with('message', 'Pesanan Berhasil Diterima!');
        } else {
            return redirect(URL::previous())->with('error', 'Terjadi Kesalahan Saat Menerima Pesanan, Mohon Ulangi!');
        }
    }

    public function tolak($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 2,
        ]);

        if ($order) {
            return redirect(URL::previous())->with('message', 'Pesanan Berhasil Ditolak!');
        } else {
            return redirect(URL::previous())->with('error', 'Terjadi Kesalahan Saat Menolak Pesanan, Mohon Ulangi!');
        }
    }
}
