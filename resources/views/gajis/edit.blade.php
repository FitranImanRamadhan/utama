@extends('tmp1')
@section('content')

<form action="{{ route('gajis.update', $gaji->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Use the PUT method for updating the user -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIP:</strong>
                <div class="select2-container">
                    <select class="form-select select2" name="user_id" id="user_id" required>
                        <option value="disable" disabled selected>Klik untuk memilih jabatan</option>
                        @foreach ($np as $item)
                            <option value="{{ $item->id }}"{{ $gaji->user_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nip }}</option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gaji Pokok:</strong>
                <input type="text" name="gapok" value="{{ $gaji->gapok }}" class="form-control" placeholder="GajiPokok">
                @error('gapok')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan Istri:</strong>
                <input type="text" name="tnj_istri" value="{{ $gaji->tnj_istri }}" class="form-control" placeholder="tnj_istri">
                @error('tnj_istri')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2 ml-3">Update</button>
    </div>
</form>
<script>
    // Fungsi untuk menampilkan NIP pada dropdown saat tombol edit diklik
    function tampilkanNIP(nipTerpilih) {
        document.getElementById('user_id').value = nipTerpilih;
    }

    // Panggil fungsi saat tombol edit diklik
    document.getElementById('tombolEdit').addEventListener('click', function() {
        var nipTerpilih = "nilai_yang_ingin_ditampilkan"; // Ganti dengan nilai NIP yang ingin ditampilkan
        tampilkanNIP(nipTerpilih);
    });
</script>
@endsection