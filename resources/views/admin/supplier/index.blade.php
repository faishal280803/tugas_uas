@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <h6>List Supplier</h6>
        <a href="{{route('supplier.create')}}" class="btn btn-success btn-sm">Tambah Supplier</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomor = 1;
                @endphp
                @foreach ($supplier as $sp)
                <tr>
                    <td>{{$nomor++}}</td>
                    <td>{{$sp->nama_supplier}}</td>
                    <td>{{$sp->alamat_supplier}}</td>
                    <td>{{$sp->no_telepon}}</td>
                    <td>
                        <form action="{{route('supplier.destroy', $sp->id)}}" method="POST"
                            class="d-flex gap-2 align-content-center">
                            <a href="{{route('supplier.edit', $sp->id)}}" class="btn btn-warning btn-sm">Ubah</a>
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