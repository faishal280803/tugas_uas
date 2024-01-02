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
                    <th>Status</th>
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
                    <td>{{$ts->harga_barang}}</td>
                    <td>
                        @if ($ts->status == 0)
                        <span class="badge rounded-pill bg-warning text-dark">Menunggu Persetujuan</span>
                        @elseif($ts->status == 1)
                        <span class="badge rounded-pill bg-success">Pembelian Berhasil</span>
                        @else
                        <span class="badge rounded-pill bg-danger">Pembelian Ditolak</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection