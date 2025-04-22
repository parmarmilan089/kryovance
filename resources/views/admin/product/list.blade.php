<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')

<!--<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">-->
<link rel="stylesheet" href="view-source:https://bootstrapmade.com/content/vendors/simple-datatables/style.css">
<style>

    /*
        .dataTables_paginate paging_simple_numbers {text-align: right;}
        .paginate_button current {

        }
       .paginate_button , .paginate_button next, .paginate_button current{

        background-color: rgba(124, 125, 182, 0.08);
        padding: 0.625rem 0.5125rem;
      min-width: calc( 2rem + 0px );
      font-size: 0.75rem;
      line-height: 1;
        }
        .paginate_button .current {

      background-color: #016EAF;
     border-color: #016EAF;
      color: #fff;
      box-shadow: 0 0.125rem 0.25rem rgba(105, 108, 255, 0.4);
        }*/
</style>
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo (isset($title)) ? $title : ''; ?></h5>
            <table class=" table border-top" id="product_table" >
                <thead>
                    <tr>
                        <th >Sr. No</th>
                        <th >Image</th>
                        <th >Name</th>
                        <th >Model No</th>
                        <th >Price</th>
                        <th >Country from Imported</th>
                        <th >Manufacture Date</th>
                        <th >Imported Date</th>
                        <th >Brand</th>
                        <th  >Product Added Date</th>
                        <th >Actions</th>
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
<script src="https://bootstrapmade.com/content/vendors/simple-datatables/simple-datatables.js"></script>

<script src="{{ asset('public/admin/assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<!--<script src="{{ asset('public/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>-->
<script>
$(document).ready(function () {
    var table = $('#product_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('json-product')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: "image", name: 'images'},
            {data: "name", name: 'name'},
            {data: "model_no", name: 'model_no'},
            {data: "price", name: 'price'},
            {data: "country", name: 'country'},
            {data: "manufacture_date", name: 'manufacture_date'},
            {data: "imported_date", name: 'imported_date'},
            {data: "brand", name: 'brand'},
            {data: "product_added_date", name: 'product_added_date'},
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
                    url: admin_path + "/delete-product",
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
