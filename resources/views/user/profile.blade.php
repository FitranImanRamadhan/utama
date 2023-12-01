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
          <td>Tunjangan Anak</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_anak }}</td>@endauth
        </tr>
        <tr>
          <td>Tunjangan Umum</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_umum }}</td>@endauth
        </tr>
        <tr>
          <td>Tunjangan Beras</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_beras }}</td>@endauth
        </tr>
        <tr>
          <td>PPH</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->pph }}</td>@endauth
        </tr>
        <tr>
          <td>Tunjangan Struktural</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_struktural }}</td>@endauth
        </tr>
        <tr>
          <td>Tunjangan Funsional</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_fungsional }}</td>@endauth
        </tr>
        <tr>
          <td>Daerah Terpencil</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_terpencil }}</td>@endauth
        </tr>
        <tr>
          <td>Pembulatan</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->pembulatan }}</td>@endauth
        </tr>
        <tr>
          <td>Tunjangan Kinerja</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_kinerja }}</td>@endauth
        </tr>
        <tr>
          <td>Tunjangan Makan</td>
          @Auth<td>: RP. {{ Auth::user()->gaji->tnj_makan }}</td>@endauth
        </tr>
        <tr>
          <td class="text-primary"><strong>Bruto</strong></td>
          @Auth<td class="text-primary"><strong>: RP. {{ Auth::user()->gaji->total_gaji }}</strong></td>@endauth
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection