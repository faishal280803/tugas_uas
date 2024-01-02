@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Produk
    </div>
    <div class="card-body">
        <form action="{{route('produk.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Barang" />
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
                        <option value="{{$kt->id}}">{{$kt->nama_kategori}}</option>
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
                        <option value="{{$cb->id}}">{{$cb->nama_cabang}}</option>
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
                        <option value="{{$sp->id}}">{{$sp->nama_supplier}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Harga Jual</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="harga_jual" placeholder="Masukan Harga Jual" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Harga Beli</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="harga_beli" placeholder="Masukan Harga Beli" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="stok" placeholder="Masukan Jumlah Stok" />
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection