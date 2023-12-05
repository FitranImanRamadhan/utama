@extends('tmp1')
@section('content')
    @if(session('success'))
        <div class="alert alert-primary alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <br>
    <form onsubmit="event.preventDefault(); tampilkanTabel(event);" method="GET" action="{{ route('gaji.bulan', ['bulan' => 'nilai_bulan', 'tahun' => 'nilai_tahun']) }}">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="bulan" class="form-label">Bulan:</label>
                <select class="form-select" id="bulan" name="bulan">
                    <option value="">Pilih Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <!-- Tambahkan pilihan bulan lainnya -->
                    <!-- ... -->
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="tahun" class="form-label">Tahun:</label>
                <select class="form-select" id="tahun" name="tahun">
                    <option value="">Pilih Tahun</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <!-- Tambahkan pilihan tahun lainnya jika diperlukan -->
                    <!-- ... -->
                </select>
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>


    <br>

    <div class="table-responsive" id="tabel-gaji" style="display: none;">
    <!-- Tabel yang akan disembunyikan -->
    <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">NIP</th>
                    <th class="text-center" scope="col">Bulan</th>
                    <th class="text-center" scope="col">Gaji Pokok</th>
                    <th class="text-center" scope="col">Tunjangan Istri</th>
                    <th class="text-center" scope="col">Tunjangan Anak</th>
                    <th class="text-center" scope="col">Tunjangan Umum</th>
                    <th class="text-center" scope="col">Tunjangan Beras</th>
                    <th class="text-center" scope="col">PPH</th>
                    <th class="text-center" scope="col">Tunjangan Struktural</th>
                    <th class="text-center" scope="col">Tunjangan Fungsional</th>
                    <th class="text-center" scope="col">Daerah Terpencil</th>
                    <th class="text-center" scope="col">Pembulatan</th>
                    <th class="text-center" scope="col">Tunjangan Kinerja</th>
                    <th class="text-center" scope="col">Tunjangan Makan</th>
                    <th class="text-center" scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1 @endphp
                @foreach ($gajis as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->user->nip }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->bulan)->format('F Y') }}</td>
                        <td>{{ $data->gapok }}</td>
                        <td>{{ $data->tnj_istri }}</td>
                        <td>{{ $data->tnj_anak }}</td>
                        <td>{{ $data->tnj_umum }}</td>
                        <td>{{ $data->tnj_beras }}</td>
                        <td>{{ $data->pph }}</td>
                        <td>{{ $data->tnj_struktural }}</td>
                        <td>{{ $data->tnj_fungsional }}</td>
                        <td>{{ $data->tnj_terpencil }}</td>
                        <td>{{ $data->pembulatan }}</td>
                        <td>{{ $data->tnj_kinerja }}</td>
                        <td>{{ $data->tnj_makan }}</td>
                        <td>
                            <?php
                                $total_gaji = $data->gapok +
                                    $data->tnj_istri +
                                    $data->tnj_anak +
                                    $data->tnj_umum +
                                    $data->tnj_beras +
                                    $data->pph +
                                    $data->tnj_struktural +
                                    $data->tnj_fungsional +
                                    $data->tnj_terpencil +
                                    $data->pembulatan +
                                    $data->tnj_kinerja +
                                    $data->tnj_makan;
                            ?>
                            {{ $total_gaji }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true
            });
        });
    </script>
    <script>
    function tampilkanTabel(event) {
        event.preventDefault(); // Mencegah perilaku default dari form submit
        document.getElementById('tabel-gaji').style.display = 'block';
    }
</script>
@endsection
