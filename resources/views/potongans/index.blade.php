@extends('tmp')
@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <br>

    <div class="d-flex justify-content-between mb-2">
        <a class="btn btn-success" href="{{ route('potongans.create') }}">Tambah Golongan</a>

    </div>

    <br>

    <div class="table-responsive">
        <table id="example" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">NIP</th>
                    <th class="text-center" scope="col">Bulan</th>
                    <th class="text-center" scope="col">Zakat</th>
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
                    <th class="text-center" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1 @endphp
                @foreach ($potongans as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->user->nip }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->bulan)->format('F Y') }}</td>
                        <td>{{ $data->zakat }}</td>
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
                                $total_gaji = $data->zakat +
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
                        <td>
                            <form action="{{ route('potongans.destroy', $data->id) }}" method="Post" class="d-flex justify-content-start">
                                <a class="btn btn-warning me-2" href="{{ route('potongans.edit', $data->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
@endsection
