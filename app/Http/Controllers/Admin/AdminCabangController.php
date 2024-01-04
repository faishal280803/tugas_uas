<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use Illuminate\Http\Request;

class AdminCabangController extends Controller
{
    public function index()
    {
        $data['cabang'] = Cabang::all();
        $data['is_active'] = 'cabang';
        return view('admin.cabang.index', $data);
    }

    public function create()
    {
        $data['is_active'] = 'cabang';
        return view('admin.cabang.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $cabang = Cabang::create([
            'nama_cabang' => $request->nama,
            'no_telp_cabang' => $request->no_telp,
            'alamat_cabang' => $request->alamat
        ]);

        if ($cabang) {
            return redirect('admin/cabang')->with('message', 'Cabang Berhasil Ditambahkan!');
        } else {
            return redirect('admin/cabang/create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Cabang, Mohon Ulangi!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Cabang $cabang)
    {
        $data['is_active'] = 'cabang';
        return view('admin.cabang.edit', compact('cabang'), $data);
    }

    public function update(Request $request, Cabang $cabang)
    {
        $cabang = Cabang::findOrFail($cabang->id);
        $cabang->update([
            'nama_cabang' => $request->input('nama'),
            'no_telp_cabang' => $request->input('no_telp'),
            'alamat_cabang' => $request->input('alamat')
        ]);

        if ($cabang) {
            return redirect('admin/cabang')->with('message', 'Cabang Berhasil Diubah!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Mengubah Cabang, Mohon Ulangi!');
        }
    }

    public function destroy(Cabang $cabang)
    {
        $cabang = $cabang->delete();
        if ($cabang) {
            return redirect('admin/cabang')->with('message', 'Cabang Berhasil Dihapus!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Menghapus Cabang, Mohon Ulangi!');
        }
    }
}
