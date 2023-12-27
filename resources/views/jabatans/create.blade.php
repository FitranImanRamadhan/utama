@extends('tmp')
@section('content')
<form action="{{ route('jabatans.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Jabatan:</strong>
                <input type="text" name="nama_jabatan" class="form-control" placeholder="nama_jabatan">
                @error('nama_jabatan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gaji Pokok:</strong>
                <input type="number" name="gaji_pokok" class="form-control" placeholder="gaji_pokok">
                @error('gaji_pokok')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2 ml-3">Submit</button>
    </div>
</form>
@endsection