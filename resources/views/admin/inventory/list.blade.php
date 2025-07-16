<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="display: inline-block;"><?php echo (isset($title)) ? $title : ''; ?></h5>
            <span style="float: right; margin-top: 10px;" >
                <a class="text-center btn btn-primary" href="{{route('inventories.create')}}" >Add Inentory</a>
            </span>
            <table class="dt-multilingual table border-top" id="category_table" >
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventories as $inventory)
                        <tr>
                            <td>{{ $inventory->model_name }}</td>
                            <td>{{ $inventory->qty }}</td>
                            <td>{{ $inventory->category->name }}</td>
                            <td>
                                <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this inventory?')">
                                        Delete
                                    </button>
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
        