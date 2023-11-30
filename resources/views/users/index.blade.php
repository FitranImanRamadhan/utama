@extends('tmp1')
@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-between mb-2">
<div class="text-end mb-2">
    <a class="btn btn-success" style="margin-top: 20px;" href="{{ route('users.exportPdf') }}">Export</a>
</div>
<div class="text-end mb-2">
    <a class="btn btn-success" style="margin-top: 20px;" href="{{ route('users.create') }}">Add User</a>
</div>
</div>


<br>
<table id="example" class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Golongan</th>
            <th scope="col">Pangkat</th>
            <th scope="col">Level</th> 
            <th scope="col">Gaji</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach ($users as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$data->nip}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->jabatan->jabatan}}</td>
            <td>{{$data->golongan->golongan}}</td>
            <td>{{$data->golongan->pangkat}}</td>
            <td>{{$data->position}}</td>
            <td>{{ $data->gaji->gapok }}</td>
            <td>
                <form action="{{ route('users.destroy', $data->id) }}" method="POST">
                    <a class="btn btn-warning" href="{{ route('users.edit', $data->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delet</button>
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