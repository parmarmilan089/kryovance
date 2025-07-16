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
                <a class="text-center btn btn-primary" href="{{URL::route('add-category')}}" >Add Category    </a>
            </span>
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
        ajax: "{{route('json-category')}}",
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
    
    $(document).on('click', '.btnDelete', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: admin_path + "/delete-category",
                    type: "POST",
                    data: {delete_id: id},
                    success: function (data) {
                        var data = jQuery.parseJSON(data);
                        var status = data.status;
                        var message = data.message;
                        if (status == false) {
                            // getToastMessage(message, 'error', 'Error');
                        } else {
                            // getToastMessage(message, 'success', 'Success');
                        }
                        table.draw();
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Record has been deleted.',
                            customClass: {confirmButton: 'btn btn-success'}
                        });
                    }
                });
            }
        });
    });
});
</script>
 @stop