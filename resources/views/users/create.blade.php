@extends('tmp')
@section('content')

@if($errors->any())
                        @foreach($errors->all() as $err)
                        <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                        @endif
                        <form action="{{ route('register.action') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                            </div>
                            <div class="mb-3">
                                <label>nip<span class="text-danger">*</span></label>
                                <input class="form-control" type="nip" name="nip" value="{{ old('nip') }}" />
                            </div>
                            <div class="mb-3">
                                <label>Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password" />
                            </div>
                            <div class="mb-3">
                                <label>Password Confirmation<span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password_confirm" />
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
                                    <strong>Level:</strong>
                                    <input type="text" name="position" class="form-control" placeholder="Position">
                                    @error('position')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                             </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Register</button>
                                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                            </div>
                        </form>
@endsection
