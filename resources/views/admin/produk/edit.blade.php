@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Ubah Produk
    </div>
    <div class="card-body">
        <form action="{{route('produk.update', $produk->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{old('nama', $produk->nama_barang)}}"
                        placeholder="Masukan Nama Barang" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Foto Barang</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="foto" accept="image" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="kategori" class="form-control">
                        <option value="" selected disabled>Pilih...</option>
                        @foreach ($kategori as $kt)
                        <option value="{{$kt->id}}" {{$produk->id_kategori == $kt->id ? 'selected' :
                            ''}}>{{$kt->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Cabang</label>
                <div class="col-sm-10">
                    <select name="cabang" class="form-control">
                        <option value="" selected disabled>Pilih...</option>
                        @foreach ($cabang as $cb)
                        <option value="{{$cb->id}}" {{$produk->id_cabang == $cb->id ? 'selected' :
                            ''}}>{{$cb->nama_cabang}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Supplier</label>
                <div class="col-sm-10">
                    <select name="supplier" class="form-control">
                        <option value="" selected disabled>Pilih...</option>
                        @foreach ($supplier as $sp)
                        <option value="{{$sp->id}}" {{$produk->id_supplier == $sp->id ? 'selected' :
                            ''}}>{{$sp->nama_supplier}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Harga Jual</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="harga_jual"
                        value="{{old('harga_jual', $produk->harga_jual)}}" placeholder="Masukan Harga Jual" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Harga Beli</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="harga_beli"
                        value="{{old('harga_beli', $produk->harga_beli)}}" placeholder="Masukan Harga Beli" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="stok" value="{{old('stok', $produk->stok)}}"
                        placeholder="Masukan Jumlah Stok" />
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection