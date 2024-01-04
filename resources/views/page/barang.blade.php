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
                <button style="border: none" class="product-item" data-id="{{$data->id}}">
                    <img src="{{asset('assets/img/produk/'.$data->foto_barang)}}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{$data->nama_barang}}</h3>
                    <strong class="product-price">Rp. {{number_format(($data->harga_jual), 0, ',', '.')}}</strong>
                    <span class="icon-cross">
                        <img src="{{asset('assets/images/cart.svg')}}" class="img-fluid">
                    </span>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="formOrder">
                @csrf
                <div class="modal-body">
                    <label>Quantity Order</label>
                    <input type="number" class="form-control" name="quantity" id="quantity_input">
                </div>
                <div class="modal-footer">
                    @if (Auth::check())
                    <button type="submit" class="btn btn-primary">Confirmation</button>
                    @else
                    <button type="submit" class="btn btn-primary" disabled>Confirmation</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.product-item').click(function(){
            var id = $(this).data('id');
            $('#orderModal').modal('show');
            $('#formOrder').attr('action', '/order/' + id);
        })
    });
</script>
@endsection