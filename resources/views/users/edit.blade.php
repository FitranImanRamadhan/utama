@extends('tmp')
@section('content')

<form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
        <div class="form-group">
    <label for="jabatan_id">Jabatan:</label>
    <select class="form-control" name="jabatan_id" id="jabatan_id" required>
        <option disabled value>Pilih Jabatan</option>
        @foreach ($jbt as $item)
            <option value="{{ $item->id }}" {{ $item->id == $user->jabatan_id ? 'selected' : '' }}>{{ $item->jabatan }}</option>
        @endforeach
    </select>
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
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control" placeholder="Password">
                @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position:</strong>
                <input type="text" name="position" value="{{ $user->position }}" class="form-control" placeholder="Position">
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
        <button type="submit" class="btn btn-primary mt-2 ml-3">Update</button>
    </div>
</form>
@endsection