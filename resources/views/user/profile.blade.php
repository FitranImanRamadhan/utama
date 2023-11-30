@extends('tmp1')
@section('content')
<div class="container mt-5">
  <div class="row">
    <!-- Bagian Kiri: Foto dan Nama -->
    <div class="col-md-4">
      <img src="{{asset('assets2/img/price.jpg')}}" alt="Foto Profil" class="profile-img img-fluid mb-3">
      @Auth<h2 class="mb-3 text-center text-primary">{{ Auth::user()->name }}</h2>@endauth
    </div>

    <!-- Bagian Kanan: Detail Diri -->
    <div class="col-md-8">
      <h3 class="text-primary">Detail Diri</h3>
      <hr>
      <table class="table table-dark table-striped">
        <tr>
          <td>Gaji Pokok</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->gapok }}</td>@endauth
        </tr>
        <tr>
          <td>Tunjangan Istri</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_istri }}</td>@endauth
        </tr>
        <tr>
          <td>Pekerjaan</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->gapok }}</td>@endauth
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection