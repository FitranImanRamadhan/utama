@extends('tmp1')
@section('content')

<form action="{{ route('gajis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP:</strong>
                <div class="select2-container">
                    <select class="form-select select2" name="user_id" id="user_id" required>
                        <option value="" disabled selected>Klik untuk memilih NiP</option>
                        @foreach ($np as $item)
                            <option value="{{ $item->id }}">{{ $item->nip }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bulan:</strong>
                <input type="month" name="bulan" class="form-control" placeholder="bulan">
                @error('bulan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Anak:</strong>
                <input type="text" name="tnj_anak" class="form-control" placeholder="tnj_anak">
                @error('tnj_anak')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Umum:</strong>
                <input type="text" name="tnj_umum" class="form-control" placeholder="tnj_umum">
                @error('tnj_umum')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Beras:</strong>
                <input type="text" name="tnj_beras" class="form-control" placeholder="tnj_beras">
                @error('tnj_beras')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PPH:</strong>
                <input type="text" name="pph" class="form-control" placeholder="pph">
                @error('pph')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Struktural:</strong>
                <input type="text" name="tnj_struktural" class="form-control" placeholder="tnj_struktural">
                @error('tnj_struktural')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Fungsional:</strong>
                <input type="text" name="tnj_fungsional" class="form-control" placeholder="tnj_fungsional">
                @error('tnj_fungsional')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Daerah Terpencil:</strong>
                <input type="text" name="tnj_terpencil" class="form-control" placeholder="tnj_terpencil">
                @error('tnj_terpencil')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pembulatan:</strong>
                <input type="text" name="pembulatan" class="form-control" placeholder="pembulatan">
                @error('pembulatan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Kinerja:</strong>
                <input type="text" name="tnj_kinerja" class="form-control" placeholder="tnj_kinerja">
                @error('tnj_kinerja')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Makan:</strong>
                <input type="text" name="tnj_makan" class="form-control" placeholder="tnj_makan">
                @error('tnj_makan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Total Gaji :</strong>
            <input type="text" name="total_gaji" id="total_gaji" class="form-control" placeholder="Total Gaji" readonly>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2 ml-3">Submit</button>
</form>

<script>
    // Calculate total salary when any input field changes
    const calculateTotalSalary = () => {
        const gapok = parseFloat(document.getElementsByName('gapok')[0].value) || 0;
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
        const totalSalary = gapok + tnjIstri + tnjAnak + tnjUmum + tnjBeras + pph + tnjStruktural + tnjFungsional + tnjTerpencil + pembulatan + tnjKinerja + tnjMakan /* Add other variables */ ;

        // Display the total salary in the 'total_gaji' input field
        document.getElementById('total_gaji').value = totalSalary;
    };

    // Listen for changes in input fields and recalculate total salary
    const inputFields = document.querySelectorAll('input[name="gapok"], input[name="tnj_istri"], input[name="tnj_anak"], input[name="tnj_umum"], input[name="tnj_beras"], input[name="pph"], input[name="tnj_struktural"], input[name="tnj_fungsional"], input[name="tnj_terpencil"], input[name="pembulatan"], input[name="tnj_kinerja"], input[name="tnj_makan"]');
    inputFields.forEach((input) => {
        input.addEventListener('input', calculateTotalSalary);
    });
</script>
@endsection
    