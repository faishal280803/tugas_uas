@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Pengguna
    </div>
    <div class="card-body">
        <form action="{{route('pengguna.store')}}" method="post">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Masukan Email" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Masukan Password" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select name="role" class="form-control">
                        <option value="user" selected disabled>Pilih...</option>
                        <option value="user">Users</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection