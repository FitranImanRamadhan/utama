@extends('tmp1')
@section('content')

<form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Use the PUT method for updating the user -->

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
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
                    <option value="{{ $item->id }}"{{ $user->jabatan_id == $item->id ? 'selected' : '' }}>
                                {{ $item->jabatan }}</option>
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
                    <option value="{{ $item->id }}"{{ $user->golongan_id == $item->id ? 'selected' : '' }}>
                                {{ $item->golongan }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nip:</strong>
                <input type="nip" name="nip" value="{{ $user->nip }}" class="form-control" placeholder="nip">
                @error('nip')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>password:</strong>
                <input type="password" name="password" value="{{ $user->password }}" class="form-control" placeholder="password">
                @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Level:</strong>
                <input type="text" name="position" value="{{ $user->position }}" class="form-control" placeholder="Position">
                @error('position')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departement:</strong>
                <input type="text" name="departement" value="{{ $user->departement }}" class="form-control" placeholder="Departement">
                @error('departement')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2 ml-3">Update</button>
    </div>
</form>
@endsection
