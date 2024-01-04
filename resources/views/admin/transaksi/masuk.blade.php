@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <h6>Transaksi Masuk</h6>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Nama Barang</th>
                    <th>Foto Barang</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $nomor = 1;
                @endphp
                @foreach ($transaksi as $ts)
                <tr>
                    <td>{{$nomor++}}</td>
                    <td>{{$ts->nama_lengkap}}</td>
                    <td>{{$ts->nama_barang}}</td>
                    <td>
                        <img src="{{asset('assets/img/produk/'.$ts->foto_barang)}}" alt="{{$ts->nama_barang}}"
                            class="img-fluid" width="80">
                    </td>
                    <td>Rp. {{number_format(($ts->harga_barang), 0, ',', '.')}}</td>
                    <td>{{$ts->quantity}}</td>
                    <td>Rp. {{number_format(($ts->total), 0, ',', '.')}}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <form action="{{route('transaksi.terima', $ts->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Terima</button>
                            </form>
                            <form action="{{route('transaksi.tolak', $ts->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection