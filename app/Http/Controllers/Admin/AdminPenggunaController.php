<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPenggunaController extends Controller
{
    public function index()
    {
        $data['is_active'] = 'pengguna';
        $data['pengguna'] = User::all();
        return view('admin.pengguna.index', $data);
    }

    public function create()
    {
        $data['is_active'] = 'pengguna';
        return view('admin.pengguna.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $pengguna = User::create([
            'nama_lengkap' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        if ($pengguna) {
            return redirect('admin/pengguna')->with('message', 'Pengguna Berhasil Ditambahkan!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Menambahkan Pengguna, Mohon Ulangi!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(User $pengguna)
    {
        $data['is_active'] = 'pengguna';
        return view('admin.pengguna.edit', compact('pengguna'), $data);
    }

    public function update(Request $request, User $pengguna)
    {
        $pengguna = User::findOrFail($pengguna->id);

        if (empty($request->input('password'))) {
            $pengguna->update([
                'nama_lengkap' => $request->input('nama'),
                'email' => $request->input('email'),
                'role' => $request->input('role')
            ]);
            if ($pengguna) {
                return redirect('admin/pengguna')->with('message', 'Pengguna Berhasil Diubah!');
            } else {
                return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Mengubah Pengguna, Mohon Ulangi!');
            }
        } else {
            $pengguna->update([
                'nama_lengkap' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => $request->input('role')
            ]);
            if ($pengguna) {
                return redirect('admin/pengguna')->with('message', 'Pengguna Berhasil Diubah!');
            } else {
                return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Mengubah Pengguna, Mohon Ulangi!');
            }
        }
    }

    public function destroy(User $pengguna)
    {
        $pengguna = $pengguna->delete();
        if ($pengguna) {
            return redirect('admin/pengguna')->with('message', 'Pengguna Berhasil Dihapus!');
        } else {
            return redirect(url()->previous())->with('error', 'Terjadi Kesalahan Saat Menghapus Pengguna, Mohon Ulangi!');
        }
    }
}
