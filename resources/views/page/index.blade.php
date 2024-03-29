@extends('page.layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Grosir FTH</h1>
                    <p class="mb-4">Grosir dengan harga yang sangat terjangkau dan pengiriman yang sangat aman dan juga
                        cepat.</p>
                    <p><a href="/barang" class="btn btn-secondary me-2">Beli Sekarang</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{asset('assets/img/grosir.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Produk terbaru kami.</h2>
                <p class="mb-4">Berikut ini adalah produk terbaru kami jika ingin melihat produk kami lebih banyak klik
                    dibawah ini. </p>
                <p><a href="/barang" class="btn">Lihat Lebih Banyak</a></p>
            </div>
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

<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h2 class="section-title">Kenapa Memilih Kami</h2>
                <p>Grosir FTH adalah grosir dengan harga yang sangat terjangkau selain itu grosir kami juga dalam
                    pengiriman yang terjamin aman dan cepat.</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{asset('assets')}}/images/truck.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Cepat &amp; Gratis Pengiriman</h3>
                            <p>Pengiriman di grosir kami gratis dan juga sangat amat cepat.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{asset('assets')}}/images/bag.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Mudah Berbelanja</h3>
                            <p>Berbelanja di grosir kami sangatlah mudah tinggal klik barang akan datang.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{asset('assets')}}/images/support.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>24/7 Support</h3>
                            <p>Kami mempunyai admin yang selalu aktif 24/7 untuk membantu anda saat anda mengalami
                                kesulitan saat berbelanja di grosir kami.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{asset('assets')}}/images/return.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Bebas Pengembalian</h3>
                            <p>Jika ada barang yang tidak sesuai makan akan dengan sangat mudah untuk dikembalikan
                                dengan syarat tertentu.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="{{asset('assets/img/bg.jpeg')}}" alt="Image" class="img-fluid">
                </div>
            </div>

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