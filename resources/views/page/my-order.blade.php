@extends('page.layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Pesanan Saya</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>

<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Foto Barang</th>
                                <th class="product-name">Nama Barang</th>
                                <th class="product-price">Harga</th>
                                <th class="quantity-input">Quantity</th>
                                <th class="quantity-input">Total Harga</th>
                                <th class="product-quantity">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $data)
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="{{asset('assets/img/produk/'.$data->foto_barang)}}" alt="Image"
                                        class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">{{$data->nama_barang}}</h2>
                                </td>
                                <td>Rp. {{number_format(($data->harga_jual), 0, ',', '.')}}</td>
                                <td class="quantity_input">
                                    <h2 class="h5 text-black">{{$data->quantity}}</h2>
                                </td>
                                <td>Rp. {{number_format(($data->total), 0, ',', '.')}}</td>
                                <td>
                                    @if ($data->status == 0)
                                    <span class="badge rounded-pill bg-warning text-dark">Menunggu Persetujuan</span>
                                    @elseif($data->status == 1)
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
            </form>
        </div>
    </div>
</div>
@endsection