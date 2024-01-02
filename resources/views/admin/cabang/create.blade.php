@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Cabang
    </div>
    <div class="card-body">
        <form action="{{route('cabang.store')}}" method="post">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Cabang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Cabang" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No Telepon Cabang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_telp" placeholder="Masukan No Telepon Cabang" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Alamat Cabang</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" placeholder="Masukan Alamat Cabang"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection