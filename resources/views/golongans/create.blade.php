@extends('tmp1')

@section('content')
<div class="container">
    <form action="{{ route('golongans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="golongan">Golongan:</label>
            <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Masukkan Golongan">
        </div>

        <div class="form-group">
            <label for="pangkat">Pangkat:</label>
            <input type="text" name="pangkat" id="pangkat" class="form-control" placeholder="Pangkat akan diisi otomatis">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- <script>
document.getElementById('golongan').addEventListener('input', function() {
    const golongan = this.value;
    const pangkatField = document.getElementById('pangkat');

    // Logika pemetaan golongan ke pangkat
    if (golongan === '4C') {
        pangkatField.value = 'PNS SENIOR';
    } else if (golongan === '4B') {
        pangkatField.value = 'PNS JUNIOR';
    } else {
        // Jika golongan bukan "4C" atau "4B", reset nilai pangkat
        pangkatField.value = '';
    }
});

</script> -->
@endsection
