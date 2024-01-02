@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <h6>List Kategori</h6>
        <a href="{{route('kategori.create')}}" class="btn btn-success btn-sm">Tambah Kategori</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomor = 1;
                @endphp
                @foreach ($kategori as $kt)
                <tr>
                    <td>{{$nomor++}}</td>
                    <td>{{$kt->nama_kategori}}</td>
                    <td>
                        <form action="{{route('kategori.destroy', $kt->id)}}" method="POST"
                            class="d-flex gap-2 align-content-center">
                            <a href="{{route('kategori.edit', $kt->id)}}" class="btn btn-warning btn-sm">Ubah</a>
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