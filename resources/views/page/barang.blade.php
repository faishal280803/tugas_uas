@extends('page.layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Barang</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            @foreach ($produk as $data)
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                @if (Auth::check())
                <a class="product-item" href="/order/{{$data->id}}">
                    <img src="{{asset('assets/img/produk/'.$data->foto_barang)}}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{$data->nama_barang}}</h3>
                    <strong class="product-price">Rp. {{number_format(($data->harga_beli), 0, ',', '.')}}</strong>

                    <span class="icon-cross">
                        <img src="{{asset('assets/images/cart.svg')}}" class="img-fluid">
                    </span>
                </a>
                @else
                <a class="product-item" href="#">
                    <img src="{{asset('assets/img/produk/'.$data->foto_barang)}}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{$data->nama_barang}}</h3>
                    <strong class="product-price">Rp. {{number_format(($data->harga_beli), 0, ',', '.')}}</strong>

                    <span class="icon-cross">
                        <img src="{{asset('assets/images/cart.svg')}}" class="img-fluid">
                    </span>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection