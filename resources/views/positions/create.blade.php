@extends('tmp')
@section('content')
<form action="{{ route('positions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>jabatan:</strong>
                <input type="text" name="jabatan" class="form-control" placeholder="jabatan">
                @error('jabatan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2 ml-3">Submit</button>
    </div>
</form>
@endsection