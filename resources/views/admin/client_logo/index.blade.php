<!-- Extends template page -->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="display: inline-block;">
                {{ isset($title) ? $title : 'Client Logos' }}
            </h5>
            <span style="float: right; margin-top: 10px;">
                <a class="text-center btn btn-primary" href="{{ route('client-logos.create') }}">Add New Logo</a>
            </span>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            <table class="dt-multilingual table border-top mt-3" id="logo_table">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="20%">Logo</th>
                        <th width="40%">Title</th>
                        <th width="30%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logos as $logo)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $logo->image_path) }}" alt="{{ $logo->title }}" width="80"></td>
                        <td>{{ $logo->title }}</td>
                        <td>
                            <a href="{{ route('client-logos.edit', $logo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('client-logos.destroy', $logo->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection

@section('customjs')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('public/admin/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

<script>
$(document).ready(function () {
    $('#logo_table').DataTable({
        searching: true,
        ordering: false
    });
});
</script>
@stop
