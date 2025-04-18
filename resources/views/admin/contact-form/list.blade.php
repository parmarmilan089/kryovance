<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="display: inline-block;"><?php echo (isset($title)) ? $title : ''; ?></h5>
            <table class="dt-multilingual table border-top" id="category_table" >
                <thead>
                    <tr>
                        <th width="10%">Sr. No</th>
                        <th width="20%">Name</th>
                        <th width="10%">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
 @section('customjs')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('public/admin/assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('public/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script>
$(document).ready(function () {
    var table = $('#category_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('json-contact')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: "name", name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        searching: true,
        paging: true,
        info: true,
        pageLength: 10,
        order: [[0, 'desc']]
    });
});
</script>
 @stop