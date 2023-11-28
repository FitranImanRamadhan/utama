@extends('tmp1')
@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<br>
<div class="d-flex justify-content-between mb-2">
    <a class="btn btn-success" href="{{ route('gajis.create') }}">Tambah Golongan</a>
</div>


<br>
<table id="example" class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">Gaji Pokok</th>
            <th scope="col">Tunjangan Istri</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach ($gajis as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$data->nip->nip}}</td>
            <td>{{ $data->gapok }}</td>
            <td>{{ $data->tnj_istri }}</td>
            <td>
                <form action="{{ route('gajis.destroy',$data->id) }}" method="Post">
                    <a class="btn btn-warning" href="{{ route('gajis.edit',$data->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection