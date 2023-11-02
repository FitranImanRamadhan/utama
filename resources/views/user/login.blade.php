@extends('layout')
@section('content')
<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0 ">
                        <div class="card-body ">
                            <h2 class="text-center">MOJIPP</h2>
                            @if(session('success'))
                            <p class="alert alert-success">{{ session('success') }}</p>
                            @endif
                            @if($errors->any())
                            @foreach($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                            @endforeach
                            @endif
                            <form action="{{ route('login.action') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label>nip <span class="text-danger">*</span></label>
                                    <input class="form-control" type="nip" name="nip" value="{{ old('nip') }}" />
                                </div>
                                <div class="mb-3">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" />
                                </div>
                                <div class="mb-3">
                                    <div class="text-center">
                                    <a class="btn btn-danger" href="{{ route('welcome') }}">Kembali</a>
                                    <button class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection