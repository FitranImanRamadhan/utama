@extends('tmp1')
@section('content')

<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Name">
            @error('name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Jabatan:</strong>
        <div class="select2-container">
            <select class="form-select select2" name="jabatan_id" id="jabatan_id" required>
                <option value="" disabled selected>Klik untuk memilih jabatan</option>
                @foreach ($jbt as $item)
                    <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Golongan:</strong>
        <div class="select2-container">
            <select class="form-select select2" name="golongan_id" id="golongan_id" required>
                <option value="" disabled selected>Klik untuk memilih golongan</option>
                @foreach ($gln as $item)
                    <option value="{{ $item->id }}">{{ $item->golongan }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nip:</strong>
                <input type="text" name="nip" class="form-control" placeholder="nip">
                @error('nip')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position:</strong>
                <input type="text" name="password" class="form-control" placeholder="password">
                @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position:</strong>
                <input type="text" name="position" class="form-control" placeholder="Position">
                @error('position')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departement:</strong>
                <input type="text" name="departement" class="form-control" placeholder="Departement">
                @error('departement')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2 ml-3">Submit</button>
    </div>
</form>
@endsection