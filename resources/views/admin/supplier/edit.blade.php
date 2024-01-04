@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Ubah Supplier
    </div>
    <div class="card-body">
        <form action="{{route('supplier.update', $supplier->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Supplier</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama"
                        value="{{old('nama', $supplier->nama_supplier)}}" placeholder="Masukan Nama Supplier" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Alamat Supplier</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat"
                        placeholder="Masukan Alamat Supplier">{{old('alamat', $supplier->alamat_supplier)}}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_telp"
                        value="{{old('no_telp', $supplier->no_telepon)}}" placeholder="Masukan No Telepon Supplier" />
                </div>
            </div>
            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection