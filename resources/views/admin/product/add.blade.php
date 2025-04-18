<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <form id="form_add_product" method="POST" action="{{ route('store-product') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                        @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Model No </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="model_no" name="model_no">
                        @if($errors->has('model_no'))
                        <div class="error">{{ $errors->first('model_no') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" id="category_id"  class="form-control" >
                           <option value="">Select</option>
                                @if(!empty($category_list))
                                @foreach ($category_list as $k=> $row)
                                <option value="{{$row->id}}" >{{$row->name}}</option>
                                @endforeach
                                @endif
                        </select>
                        @if($errors->has('start_date'))
                        <div class="error">{{ $errors->first('start_date') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inventory_id" class="col-sm-2 col-form-label">Model</label>
                    <div class="col-sm-10">
                        <select name="inventory_id" id="inventory_id" class="form-control">
                            <option value="">Select Inventory</option>
                        </select>
                        @if($errors->has('inventory_id'))
                        <div class="error">{{ $errors->first('inventory_id') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="price" name="price" />
                        @if($errors->has('price'))
                        <div class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sku" name="sku" />
                        @if($errors->has('sku'))
                        <div class="error">{{ $errors->first('sku') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="brand" name="brand" />
                        @if($errors->has('brand'))
                        <div class="error">{{ $errors->first('brand') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mrp" class="col-sm-2 col-form-label">MRP</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="mrp" name="mrp" />
                        @if($errors->has('mrp'))
                        <div class="error">{{ $errors->first('mrp') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image" />
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="manufacture_date" class="col-sm-2 col-form-label">Manufacture Date</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="manufacture_date" name="manufacture_date" />
                        @if($errors->has('manufacture_date'))
                        <div class="error">{{ $errors->first('manufacture_date') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" />
                        @if($errors->has('expiry_date'))
                        <div class="error">{{ $errors->first('expiry_date') }}</div>
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>

@endsection

@section('customjs')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
    $('#category_id').on('change', function () {
        var categoryId = $(this).val();
        let url = "{{ route('get-inventory-by-category', ':id') }}";
        url = url.replace(':id', categoryId);

        if (categoryId) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    $('#inventory_id').empty();
                    $('#inventory_id').append('<option value="">Select Inventory</option>');
                    $.each(data, function (key, value) {
                        $('#inventory_id').append('<option value="' + value.id + '">' + value.model_name + ' - Qty: ' + value.qty + '</option>');
                    });
                }
            });
        } else {
            $('#inventory_id').empty().append('<option value="">Select Inventory</option>');
        }
    });
</script>
@endsection