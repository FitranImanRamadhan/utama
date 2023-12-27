@extends('tmp')

@section('content')
<div class="container">
    <h2>Edit Data Golongan</h2>
    <form action="{{ route('golongans.update', $golongan->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan metode HTTP PUT untuk mengupdate data -->

        <div class="form-group">
            <label for="golongan">Golongan:</label>
            <input type="text" name="golongan" id="golongan" class="form-control" value="{{ $golongan->golongan }}" placeholder="Masukkan Golongan">
        </div>

        <div class="form-group">
            <label for="pangkat">Pangkat:</label>
            <input type="text" name="pangkat" id="pangkat" class="form-control" value="{{ $golongan->pangkat }}" placeholder="Pangkat akan diisi otomatis" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<script>
document.getElementById('golongan').addEventListener('input', function() {
    const golongan = this.value;
    const pangkatField = document.getElementById('pangkat');

    // Logika pemetaan golongan ke pangkat (sama seperti pada create.blade.php)
    if (golongan === '4C') {
        pangkatField.value = 'PNS SENIOR';
    } else if (golongan === '4B') {
        pangkatField.value = 'PNS JUNIOR';
    } else {
        pangkatField.value = '';
    }
});
</script>
@endsection
