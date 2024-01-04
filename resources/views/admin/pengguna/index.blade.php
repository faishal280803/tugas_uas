@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <h6>List Pengguna</h6>
        <a href="{{route('kategori.create')}}" class="btn btn-success btn-sm">Tambah Pengguna</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomor = 1;
                @endphp
                @foreach ($pengguna as $pg)
                <tr>
                    <td>{{$nomor++}}</td>
                    <td>{{$pg->nama_lengkap}}</td>
                    <td>{{$pg->email}}</td>
                    <td><span class="text-capitalize">{{$pg->role}}</span></td>
                    <td>
                        <form action="{{route('pengguna.destroy', $pg->id)}}" method="POST"
                            class="d-flex gap-2 align-content-center">
                            <a href="{{route('pengguna.edit', $pg->id)}}" class="btn btn-warning btn-sm">Ubah</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection