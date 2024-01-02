@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <h6>List Produk</h6>
        <a href="{{route('produk.create')}}" class="btn btn-success btn-sm">Tambah Produk</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Foto Barang</th>
                    <th>Kategori</th>
                    <th>Cabang</th>
                    <th>Supplier</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomor = 1;
                @endphp
                @foreach ($produk as $pk)
                <tr>
                    <td>{{$nomor++}}</td>
                    <td>{{$pk->nama_barang}}</td>
                    <td><img src="{{asset('assets/img/produk/'.$pk->foto_barang)}}" alt="" class="img-fluid"></td>
                    <td>{{$pk->nama_kategori}}</td>
                    <td>{{$pk->nama_cabang}}</td>
                    <td>{{$pk->nama_supplier}}</td>
                    <td>{{$pk->harga_jual}}</td>
                    <td>{{$pk->harga_beli}}</td>
                    <td>{{$pk->stok}}</td>
                    <td>
                        <form action="{{route('produk.destroy', $pk->id)}}" method="POST"
                            class="d-flex gap-2 align-content-center">
                            <a href="{{route('produk.edit', $pk->id)}}" class="btn btn-warning btn-sm">Ubah</a>
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