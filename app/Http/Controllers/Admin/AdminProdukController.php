<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        $data['is_active'] = 'produk';
        $data['produk'] = Produk::join('kategori', 'kategori.id', '=', 'produk.id_kategori')->join('cabang', 'cabang.id', '=', 'produk.id_cabang')->join('supplier', 'supplier.id', '=', 'produk.id_supplier')
            ->select('produk.*', 'kategori.nama_kategori', 'cabang.nama_cabang', 'supplier.nama_supplier')->get();
        return view('admin.produk.index', $data);
    }

    public function create()
    {
        $data['is_active'] = 'produk';
        $data['kategori'] = Kategori::all();
        $data['cabang'] = Cabang::all();
        $data['supplier'] = Supplier::all();
        return view('admin.produk.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'kategori' => 'required',
            'cabang' => 'required',
            'supplier' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move('assets/img/produk', $imageName);

            $produk = Produk::create([
                'nama_barang' => $request->nama,
                'foto_barang' => $imageName,
                'id_kategori' => $request->kategori,
                'id_cabang' => $request->cabang,
                'id_supplier' => $request->supplier,
                'harga_jual' => $request->harga_jual,
                'harga_beli' => $request->harga_beli,
                'stok' => $request->stok
            ]);

            if ($produk) {
                return redirect('admin/produk')->with('message', 'Produk Berhasil Ditambahkan!');
            } else {
                return redirect('admin/produk/create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Produk, Mohon Ulangi!');
            }
        } else {
            return redirect('admin/produk/create')->with('error', 'Foto Produk Tidak Ada, Silahkan Ulangi Dan Tambahkan Foto Produk!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Produk $produk)
    {
        $data['is_active'] = 'produk';
        $data['kategori'] = Kategori::all();
        $data['cabang'] = Cabang::all();
        $data['supplier'] = Supplier::all();
        return view('admin.produk.edit', compact('produk'), $data);
    }

    public function update(Request $request, Produk $produk)
    {
        $produk = Produk::findOrFail($produk->id);
        if ($request->hasFile('foto')) {
            $path = 'assets/img/produk/' . $produk->foto_barang;
            unlink($path);
            $image = $request->file('foto');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move('assets/img/produk', $imageName);
            $produk->update([
                'nama_barang' => $request->input('nama'),
                'foto_barang' => $imageName,
                'id_kategori' => $request->input('kategori'),
                'id_cabang' => $request->input('cabang'),
                'id_supplier' => $request->input('supplier'),
                'harga_jual' => $request->input('harga_jual'),
                'harga_beli' => $request->input('harga_beli'),
                'stok' => $request->input('stok')
            ]);

            if ($produk) {
                return redirect('admin/produk')->with('message', 'Produk Berhasil Diubah!');
            } else {
                return redirect('admin/produk/create')->with('error', 'Terjadi Kesalahan Saat Mengubah Produk, Mohon Ulangi!');
            }
        } else {
            $produk->update([
                'nama_barang' => $request->input('nama'),
                'id_kategori' => $request->input('kategori'),
                'id_cabang' => $request->input('cabang'),
                'id_supplier' => $request->input('supplier'),
                'harga_jual' => $request->input('harga_jual'),
                'harga_beli' => $request->input('harga_beli'),
                'stok' => $request->input('stok')
            ]);

            if ($produk) {
                return redirect('admin/produk')->with('message', 'Produk Berhasil Diubah!');
            } else {
                return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Mengubah Produk, Mohon Ulangi!');
            }
        }
    }

    public function destroy(Produk $produk)
    {
        $path = 'assets/img/produk/' . $produk->foto_barang;
        unlink($path);
        $produk = $produk->delete();
        if ($produk) {
            return redirect('admin/produk')->with('message', 'Produk Berhasil Dihapus!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Menghapus Produk, Mohon Ulangi!');
        }
    }
}
