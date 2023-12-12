<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'data_user' => User::all(),
        ];
        //return view('index', $data);
        return view('Admin.Master.User.user', $data);
    }

    public function store(Request $request)
    {
        // insert data ke table mahasiswa
        User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role'     => $request->input('role'),
        ]);
        // alihkan halaman ke halaman mahasiswa
        return redirect('/user')->with('succes', 'Data Berhasil Di Simpan');
    }

    public function update(Request $request, $id)
    {
        // insert data ke table mahasiswa
        User::where('id', $id)
            ->where('id', $id)
            ->update([
                'name'     => $request->input('name'),
                'email'    => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role'     => $request->input('role'),
            ]);
        // alihkan halaman ke halaman mahasiswa
        return redirect('/user')->with('succes', 'Data Berhasil Di Ubah');
    }

    public function destroy ($id)
    {
        // insert data ke table mahasiswa
        User::where('id', $id)
            ->destroy();
        // alihkan halaman ke halaman mahasiswa
        return redirect('/user')->with('succes', 'Data Berhasil Di Hapus');
    }
}
