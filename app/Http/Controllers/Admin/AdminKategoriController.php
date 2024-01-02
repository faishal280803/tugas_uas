<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::all();
        $data['is_active'] = 'kategori';
        return view('admin.kategori.index', $data);
    }

    public function create()
    {
        $data['is_active'] = 'kategori';
        return view('admin.kategori.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama
        ]);

        if ($kategori) {
            return redirect('admin/kategori')->with('message', 'Kategori Berhasil Ditambahkan!');
        } else {
            return redirect('admin/kategori/create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Kategori, Mohon Ulangi!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Kategori $kategori)
    {
        $data['is_active'] = 'kategori';
        return view('admin.kategori.edit', compact('kategori'), $data);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori = Kategori::findOrFail($kategori->id);
        $kategori->update([
            'nama_kategori' => $request->input('nama')
        ]);

        if ($kategori) {
            return redirect('admin/kategori')->with('message', 'Kategori Berhasil Diubah!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Mengubah Kategori, Mohon Ulangi!');
        }
    }

    public function destroy(Kategori $kategori)
    {
        $kategori = $kategori->delete();

        if ($kategori) {
            return redirect('admin/kategori')->with('message', 'Kategori Berhasil Dihapus!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Menghapus Kategori, Mohon Ulangi!');
        }
    }
}
