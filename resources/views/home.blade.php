@extends('tmp1')
@section('content')
<div class="container mt-5">
    <!-- Bagian Kanan: Detail Gaji -->
    <div class="">
      @if(auth()->user()->gaji()->exists())
        @php
          // Inisialisasi objek Carbon dengan bulan yang diinginkan
          $carbonInstance = \Carbon\Carbon::now()->startOfMonth();
          $gajiBulanIni = auth()->user()->gaji()->where('bulan', $carbonInstance->format('Y-m'))->first();
        @endphp
        @if($gajiBulanIni)
        <h3>Gaji</h3>
          <table class="table table-dark table-striped">
            <tr>
              <td>Gaji Pokok</td>
              <td>: RP. {{ $gajiBulanIni->gapok }}</td>
            </tr>
            <tr>
              <td>Tunjangan Istri</td>
              <td>: RP. {{ $gajiBulanIni->tnj_istri }}</td>
            </tr>
            <tr>
              <td>Tunjangan Anak</td>
              <td>: RP. {{ $gajiBulanIni->tnj_anak }}</td>
            </tr>
            <tr>
              <td>Tunjangan Umum</td>
              <td>: RP. {{ $gajiBulanIni->tnj_umum }}</td>
            </tr>
            <tr>
              <td>Tunjangan Beras</td>
              <td>: RP. {{ $gajiBulanIni->tnj_beras }}</td>
            </tr>
            <tr>
              <td>PPH</td>
              <td>: RP. {{ $gajiBulanIni->pph }}</td>
            </tr>
            <tr>
              <td>Tunjangan Struktural</td>
              <td>: RP. {{ $gajiBulanIni->tnj_struktural }}</td>
            </tr>
            <tr>
              <td>Tunjangan Fungsional</td>
              <td>: RP. {{ $gajiBulanIni->tnj_fungsional }}</td>
            </tr>
            <tr>
              <td>Tunjangan Terpencil</td>
              <td>: RP. {{ $gajiBulanIni->tnj_terpencil }}</td>
            </tr>
            <tr>
              <td>Tunjangan Pembulatan</td>
              <td>: RP. {{ $gajiBulanIni->pembulatan }}</td>
            </tr>
            <tr>
              <td>Tunjangan Kinerja</td>
              <td>: RP. {{ $gajiBulanIni->tnj_kinerja }}</td>
            </tr>
            <tr>
              <td>Tunjangan Makan</td>
              <td>: RP. {{ $gajiBulanIni->tnj_makan }}</td>
            </tr>
            <tr>
              <td class="text text-primary">Butto</td>
              <td class="text text-primary">: RP. {{ $gajiBulanIni->total_gaji }}</td>
            </tr>
            <!-- Sisipkan kolom lainnya sesuai kebutuhan -->
          </table>
        @else
          <p>Tidak ada data gaji untuk bulan ini.</p>
        @endif
      @else
        <p>Tidak ada data gaji.</p>
      @endif

       
      @if(auth()->user()->potongan()->exists())
    @php
        // Inisialisasi objek Carbon dengan bulan yang diinginkan
        $carbonInstance = \Carbon\Carbon::now()->startOfMonth();
        $potonganBulanIni = auth()->user()->potongan()->where('bulan', $carbonInstance->format('Y-m'))->first();
    @endphp
    @if($potonganBulanIni)
        <h3>Potongan</h3>
        <table class="table table-dark table-striped">
            <tr>
                <td>Zakat</td>
                <td>: RP. {{ $potonganBulanIni->zakat }}</td>
            </tr>
            <tr>
              <td>Tunjangan Istri</td>
              <td>: RP. {{ $gajiBulanIni->tnj_istri }}</td>
            </tr>
            <tr>
              <td>Tunjangan Anak</td>
              <td>: RP. {{ $gajiBulanIni->tnj_anak }}</td>
            </tr>
            <tr>
              <td>Tunjangan Umum</td>
              <td>: RP. {{ $gajiBulanIni->tnj_umum }}</td>
            </tr>
            <tr>
              <td>Tunjangan Beras</td>
              <td>: RP. {{ $gajiBulanIni->tnj_beras }}</td>
            </tr>
            <tr>
              <td>PPH</td>
              <td>: RP. {{ $gajiBulanIni->pph }}</td>
            </tr>
            <tr>
              <td>Tunjangan Struktural</td>
              <td>: RP. {{ $gajiBulanIni->tnj_struktural }}</td>
            </tr>
            <tr>
              <td>Tunjangan Fungsional</td>
              <td>: RP. {{ $gajiBulanIni->tnj_fungsional }}</td>
            </tr>
            <tr>
              <td>Tunjangan Terpencil</td>
              <td>: RP. {{ $gajiBulanIni->tnj_terpencil }}</td>
            </tr>
            <tr>
              <td>Tunjangan Pembulatan</td>
              <td>: RP. {{ $gajiBulanIni->pembulatan }}</td>
            </tr>
            <tr>
              <td>Tunjangan Kinerja</td>
              <td>: RP. {{ $gajiBulanIni->tnj_kinerja }}</td>
            </tr>
            <tr>
              <td>Tunjangan Makan</td>
              <td>: RP. {{ $gajiBulanIni->tnj_makan }}</td>
            </tr>
            <tr>
              <td class="text text-primary">Butto</td>
              <td class="text text-primary">: RP. {{ $gajiBulanIni->total_gaji }}</td>
            </tr>
            <!-- Sisipkan kolom lainnya sesuai kebutuhan -->
          </table>
        @else
          <p>Tidak ada data potongan untuk bulan ini.</p>
        @endif
      @else
        <p>Tidak ada data gaji.</p>
      @endif

  </div>
</div>
@endsection
