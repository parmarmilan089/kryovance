<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="display: inline-block;"><?php echo (isset($title)) ? $title : ''; ?></h5>
            
        </div>
    </div>
</div>
@endsection