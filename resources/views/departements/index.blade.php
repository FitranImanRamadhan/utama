@extends('tmp')
@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<br>
<div class="d-flex justify-content-between mb-2">
    <a class="btn btn-success" href="{{ route('departements.create') }}">Add Departement</a>
    <div>
        <a class="btn btn-success" href="{{ route('departement.exportExcel') }}">Export Excel</a>
        <a class="btn btn-success" href="{{ route('departements.exportPdf') }}">Export PDF</a>
    </div>
</div>


<br>
<table id="example" class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Location</th>
            <th scope="col">Manager id</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach ($departements as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->location}}</td>
            <td>
                {{
                    (isset($data->manager->email)) ?
                $data->manager->email :
                'Tidak Ada'
                }}
            </td>
            <td>
                <form action="{{ route('departements.destroy',$data->id) }}" method="Post">
                    <a class="btn btn-warning" href="{{ route('departements.edit',$data->id) }}">Edit</a>
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