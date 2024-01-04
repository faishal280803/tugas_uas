@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Ubah Pengguna
    </div>
    <div class="card-body">
        <form action="{{route('pengguna.update', $pengguna->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{old('nama', $pengguna->nama_lengkap)}}"
                        placeholder="Masukan Nama Lengkap" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{old('email', $pengguna->email)}}"
                        placeholder="Masukan Email" />
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
                        <option value="user" {{$pengguna->role == "user" ? 'selected' : ''}}>Users</option>
                        <option value="admin" {{$pengguna->role == "admin" ? 'selected' : ''}}>Admin</option>
                    </select>
                </div>
            </div>
            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection