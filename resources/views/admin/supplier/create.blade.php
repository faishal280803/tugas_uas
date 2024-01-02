@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Supplier
    </div>
    <div class="card-body">
        <form action="{{route('supplier.store')}}" method="post">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Supplier</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Supplier" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Alamat Supplier</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" placeholder="Masukan Alamat Supplier"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No Telepon Supplier</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_telp"
                        placeholder="Masukan No Telepon Supplier" />
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection