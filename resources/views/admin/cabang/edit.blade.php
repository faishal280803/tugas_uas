@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Ubah Cabang
    </div>
    <div class="card-body">
        <form action="{{route('cabang.update', $cabang->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Cabang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{old('nama', $cabang->nama_cabang)}}"
                        placeholder="Masukan Nama Cabang" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No Telepon Cabang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_telp"
                        value="{{old('no_telp', $cabang->no_telp_cabang)}}" placeholder="Masukan No Telepon Cabang" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Alamat Cabang Cabang</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat"
                        placeholder="Masukan Alamat Cabang">{{old('alamat', $cabang->alamat_cabang)}}</textarea>
                </div>
            </div>
            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection