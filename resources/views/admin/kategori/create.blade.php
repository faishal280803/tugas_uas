@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Kategori
    </div>
    <div class="card-body">
        <form action="{{route('kategori.store')}}" method="post">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Kategori" />
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection