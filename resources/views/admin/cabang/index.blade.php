@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <h6>List Cabang</h6>
        <a href="{{route('cabang.create')}}" class="btn btn-success btn-sm">Tambah Cabang</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Cabang</th>
                    <th>No Telp Cabang</th>
                    <th>Alamat Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomor = 1;
                @endphp
                @foreach ($cabang as $cb)
                <tr>
                    <td>{{$nomor++}}</td>
                    <td>{{$cb->nama_cabang}}</td>
                    <td>{{$cb->no_telp_cabang}}</td>
                    <td>{{$cb->alamat_cabang}}</td>
                    <td>
                        <form action="{{route('cabang.destroy', $cb->id)}}" method="POST"
                            class="d-flex gap-2 align-content-center">
                            <a href="{{route('cabang.edit', $cb->id)}}" class="btn btn-warning btn-sm">Ubah</a>
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