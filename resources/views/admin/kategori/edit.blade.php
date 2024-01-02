@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Ubah Kategori
    </div>
    <div class="card-body">
        <form action="{{route('kategori.update', $kategori->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama"
                        value="{{old('nama', $kategori->nama_kategori)}}" placeholder="Masukan Nama Kategori" />
                </div>
            </div>
            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection