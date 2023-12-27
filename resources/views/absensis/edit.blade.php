@extends('tmp')
@section('content')

<form action="{{ route('potongans.update', $potongan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method ('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP:</strong>
                <div class="select2-container">
                    <select class="form-select select2" name="user_id" id="user_id" required>
                        <option value="" disabled selected>Klik untuk memilih NiP</option>
                        @foreach ($np as $item)
                            <option value="{{ $item->id }}" {{ $potongan->user_id == $item->id ? 'selected' : '' }}>{{ $item->nip }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bulan:</strong>
                <input type="month" name="bulan" class="form-control" value="{{ $potongan->bulan }}" placeholder="bulan">
                @error('bulan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>zakat:</strong>
                <input type="text" name="zakat" class="form-control" value="{{ $potongan->zakat }}" placeholder="zakat">
                @error('zakat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Istri:</strong>
                <input type="text" name="tnj_istri" class="form-control" value="{{ $potongan->tnj_istri }}" placeholder="tnj_istri">
                @error('tnj_istri')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Anak:</strong>
                <input type="text" name="tnj_anak" class="form-control" value="{{ $potongan->tnj_anak }}" placeholder="tnj_anak">
                @error('tnj_anak')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Umum:</strong>
                <input type="text" name="tnj_umum" class="form-control" value="{{ $potongan->tnj_umum }}" placeholder="tnj_umum">
                @error('tnj_umum')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Beras:</strong>
                <input type="text" name="tnj_beras" class="form-control" value="{{ $potongan->tnj_beras }}" placeholder="tnj_beras">
                @error('tnj_beras')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PPH:</strong>
                <input type="text" name="pph" class="form-control" value="{{ $potongan->pph }}" placeholder="pph">
                @error('pph')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Struktural:</strong>
                <input type="text" name="tnj_struktural" class="form-control" value="{{ $potongan->tnj_struktural }}" placeholder="tnj_struktural">
                @error('tnj_struktural')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Fungsional:</strong>
                <input type="text" name="tnj_fungsional" class="form-control" value="{{ $potongan->tnj_fungsional }}" placeholder="tnj_fungsional">
                @error('tnj_fungsional')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Daerah Terpencil:</strong>
                <input type="text" name="tnj_terpencil" class="form-control" value="{{ $potongan->tnj_terpencil }}" placeholder="tnj_terpencil">
                @error('tnj_terpencil')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pembulatan:</strong>
                <input type="text" name="pembulatan" class="form-control" value="{{ $potongan->pembulatan }}" placeholder="pembulatan">
                @error('pembulatan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Kinerja:</strong>
                <input type="text" name="tnj_kinerja" class="form-control" value="{{ $potongan->tnj_kinerja }}" placeholder="tnj_kinerja">
                @error('tnj_kinerja')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Makan:</strong>
                <input type="text" name="tnj_makan" class="form-control" value="{{ $potongan->tnj_makan }}" placeholder="tnj_makan">
                @error('tnj_makan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Total potongan :</strong>
            <input type="text" name="total_potongan" id="total_potongan" class="form-control" value="{{ $potongan->total_potongan }}" placeholder="Total potongan" readonly>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2 ml-3">Submit</button>
</form>

<script>
    // Calculate total salary when any input field changes
    const calculateTotalSalary = () => {
        const zakat = parseFloat(document.getElementsByName('zakat')[0].value) || 0;
        const tnjIstri = parseFloat(document.getElementsByName('tnj_istri')[0].value) || 0;
        const tnjAnak = parseFloat(document.getElementsByName('tnj_anak')[0].value) || 0;
        const tnjUmum = parseFloat(document.getElementsByName('tnj_umum')[0].value) || 0;
        const tnjBeras = parseFloat(document.getElementsByName('tnj_beras')[0].value) || 0;
        const pph = parseFloat(document.getElementsByName('pph')[0].value) || 0;
        const tnjStruktural = parseFloat(document.getElementsByName('tnj_struktural')[0].value) || 0;
        const tnjFungsional = parseFloat(document.getElementsByName('tnj_fungsional')[0].value) || 0;
        const tnjTerpencil = parseFloat(document.getElementsByName('tnj_terpencil')[0].value) || 0;
        const pembulatan = parseFloat(document.getElementsByName('pembulatan')[0].value) || 0;
        const tnjKinerja = parseFloat(document.getElementsByName('tnj_kinerja')[0].value) || 0;
        const tnjMakan = parseFloat(document.getElementsByName('tnj_makan')[0].value) || 0;

        // Calculate total salary
        const totalSalary = zakat + tnjIstri + tnjAnak + tnjUmum + tnjBeras + pph + tnjStruktural + tnjFungsional + tnjTerpencil + pembulatan + tnjKinerja + tnjMakan /* Add other variables */ ;

        // Display the total salary in the 'total_potongan' input field
        document.getElementById('total_potongan').value = totalSalary;
    };

    // Listen for changes in input fields and recalculate total salary
    const inputFields = document.querySelectorAll('input[name="zakat"], input[name="tnj_istri"], input[name="tnj_anak"], input[name="tnj_umum"], input[name="tnj_beras"], input[name="pph"], input[name="tnj_struktural"], input[name="tnj_fungsional"], input[name="tnj_terpencil"], input[name="pembulatan"], input[name="tnj_kinerja"], input[name="tnj_makan"]');
    inputFields.forEach((input) => {
        input.addEventListener('input', calculateTotalSalary);
    });
</script>
@endsection
    