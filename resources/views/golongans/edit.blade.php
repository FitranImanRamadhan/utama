@extends('tmp')
@section('content')
<form action="{{ route('golongans.update',$golongan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>golongan Name:</strong>
                <input type="text" name="name" value="{{ $golongan->golongan }}" class="form-control" placeholder="golongan golongan">
                @error('golongan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> pangkat:</strong>
                <input type="pangkat" name="pangkat" class="form-control" placeholder="golongan pangkat" value="{{ $golongan->pangkat }}">
                @error('pangkat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> alias:</strong>
                <input type="text" name="alias" value="{{ $golongan->alias }}" class="form-control" placeholder="golongan alias">
                @error('alias')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@endsection