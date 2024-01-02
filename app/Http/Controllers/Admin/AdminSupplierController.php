<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AdminSupplierController extends Controller
{
    public function index()
    {
        $data['supplier'] = Supplier::all();
        $data['is_active'] = 'supplier';
        return view('admin.supplier.index', $data);
    }

    public function create()
    {
        $data['is_active'] = 'supplier';
        return view('admin.supplier.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = Supplier::create([
            'nama_supplier' => $request->nama,
            'alamat_supplier' => $request->alamat,
            'no_telepon' => $request->no_telp
        ]);

        if ($supplier) {
            return redirect('admin/supplier')->with('message', 'Supplier Berhasil Ditambahkan!');
        } else {
            return redirect('admin/supplier/create')->with('error', 'Terjadi Kesalahan Saat Menambahkan Supplier, Mohon Ulangi!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Supplier $supplier)
    {
        $data['is_active'] = 'supplier';
        return view('admin.supplier.edit', compact('supplier'), $data);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier = Supplier::findOrFail($supplier->id);
        $supplier->update([
            'nama_supplier' => $request->input('nama'),
            'alamat_supplier' => $request->input('alamat'),
            'no_telepon' => $request->input('no_telp')
        ]);

        if ($supplier) {
            return redirect('admin/supplier')->with('message', 'Supplier Berhasil Diubah!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Mengubah Supplier, Mohon Ulangi!');
        }
    }

    public function destroy(Supplier $supplier)
    {
        $supplier = $supplier->delete();
        if ($supplier) {
            return redirect('admin/supplier')->with('message', 'Supplier Berhasil Dihapus!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Menghapus Supplier, Mohon Ulangi!');
        }
    }
}
