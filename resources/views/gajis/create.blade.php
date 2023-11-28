@extends('tmp1')
@section('content')

<form action="{{ route('gajis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP:</strong>
                <div class="select2-container">
                    <select class="form-select select2" name="nip_id" id="nip_id" required>
                        <option value="" disabled selected>Klik untuk memilih jabatan</option>
                        @foreach ($np as $item)
                            <option value="{{ $item->id }}">{{ $item->nip }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gapok:</strong>
                <input type="text" name="gapok" class="form-control" placeholder="gapok">
                @error('gapok')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Istri:</strong>
                <input type="text" name="tnj_istri" class="form-control" placeholder="tnj_istri">
                @error('tnj_istri')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2 ml-3">Submit</button>
    </div>
</form>
@endsection
