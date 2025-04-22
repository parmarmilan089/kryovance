<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <form id="form_add_product" method="POST" action="{{ route('update-product') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="product_id" id="product_id" value="<?php echo $product->id ?>" />
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $product->name)}}" />
                        @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="5">{{$product->description}}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="model_no" class="col-sm-2 col-form-label">Model No </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="model_no" name="model_no" value="{{old('model_no', $product->model_no)}}" />
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
                                <option value="{{$row->id}}" {{$row->id == $product->category_id ? 'selected' : ''}}>{{$row->name}}</option>
                                @endforeach
                                @endif
                        </select>
                        @if($errors->has('start_date'))
                        <div class="error">{{ $errors->first('start_date') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inventory_id" class="col-sm-2 col-form-label">Inventory</label>
                    <div class="col-sm-10">
                        <select name="inventory_id" id="inventory_id" class="form-control">
                            <option value="">Select Inventory</option>
                            @if(!empty($inventories))
                                @foreach($inventories as $inv)
                                    <option value="{{ $inv->id }}" {{ $product->inventory_id == $inv->id ? 'selected' : '' }}>
                                        {{ $inv->model_name }} - Qty: {{ $inv->qty }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('inventory_id'))
                            <div class="error">{{ $errors->first('inventory_id') }}</div>
                        @endif
                    </div>
                </div>

  <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}" />
                        @if($errors->has('price'))
                        <div class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sku" name="sku" value="{{$product->sku}}" />
                        @if($errors->has('sku'))
                        <div class="error">{{ $errors->first('sku') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="brand" name="brand" value="{{$product->brand}}" />
                        @if($errors->has('brand'))
                        <div class="error">{{ $errors->first('brand') }}</div>
                        @endif
                    </div>
              </div>
                 <div class="row mb-3">
                    <label for="mrp" class="col-sm-2 col-form-label">MRP</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="mrp" name="mrp" value="{{$product->mrp}}" />
                        @if($errors->has('mrp'))
                        <div class="error">{{ $errors->first('mrp') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Images</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple />
                        <div id="image-list" class="mt-3 d-flex flex-wrap">
                            <!-- Existing Images -->
                            @foreach($product_images as $image)
                                <div class="image-preview me-2 mb-2" style="position: relative; width: 100px; height: 100px;">
                                    <img src="{{ asset('storage/'.$image->file_path) }}"
                                         class="img-thumbnail"
                                         style="height: 100px; object-fit: cover;">
                                    <button type="button"
                                            class="btn btn-danger btn-sm remove-existing-image"
                                            style="position: absolute; top: 0px; right: 0px;"
                                            data-image-id="{{ $image->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="deleted_images" id="deleted-images" value="">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="manufacture_date" class="col-sm-2 col-form-label">Manufacture Date</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="manufacture_date" name="manufacture_date" value="{{$product->manufacture_date}}" />
                        @if($errors->has('manufacture_date'))
                        <div class="error">{{ $errors->first('manufacture_date') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="country" class="col-sm-2 col-form-label">Country from Imported</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="country" name="country">
                            <option value="" selected>Select Country</option>
                            <option value="China">China</option>
                            <option value="United States">United States</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Germany">Germany</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Japan">Japan</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Australia">Australia</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Russia">Russia</option>
                            <option value="Italy">Italy</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Vietnam">Vietnam</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{$product->expiry_date}}" />
                        @if($errors->has('expiry_date'))
                        <div class="error">{{ $errors->first('expiry_date') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="imported_date" class="col-sm-2 col-form-label">Imported Date</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="imported_date" name="imported_date" value="{{$product->imported_date}}" />
                        @if($errors->has('imported_date'))
                        <div class="error">{{ $errors->first('imported_date') }}</div>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $('#country').select2();
    $(document).ready(function() {
        $('#country').val("{{ $product->country }}").trigger('change');
    });
    $(document).ready(function() {
    const MAX_IMAGES = 10;
    let filesArray = [];
    let deletedImages = [];

    // Handle new file selection
    $('#image').on('change', function() {
        const existingCount = $('#image-list .image-preview').length - filesArray.length; // Only count existing DB images

        if (this.files.length + filesArray.length + existingCount > MAX_IMAGES) {
            Swal.fire('Error', `Maximum ${MAX_IMAGES} images allowed`, 'error');
            $(this).val('');
            return;
        }

        Array.from(this.files).forEach(file => {
            if (!filesArray.some(f => f.name === file.name && f.size === file.size)) {
                filesArray.push(file);
                previewImage(file);
            }
        });

        updateFileInput(); // Update the actual file input
        $(this).val('');
    });

    // Update the actual file input with files from our array
    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        filesArray.forEach(file => dataTransfer.items.add(file));
        $('#image')[0].files = dataTransfer.files;
    }

    // Form submission handler - ensure files are updated
    $('#form_add_product').on('submit', function(e) {
        updateFileInput(); // Critical: Update files before submission

        // Optional: Validate if needed
        if (filesArray.length === 0 && $('.remove-existing-image').length === 0) {
            e.preventDefault();
            Swal.fire('Error', 'Please upload at least one image', 'error');
        }
    });

    // Rest of your code (previewImage, remove handlers) remains the same...
    // Remove existing image
    $(document).on('click', '.remove-existing-image', function() {
        const imageId = $(this).data('image-id');
        const $previewDiv = $(this).closest('.image-preview');

        Swal.fire({
            title: 'Delete Image?',
            text: "This image will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                deletedImages.push(imageId);
                $('#deleted-images').val(JSON.stringify(deletedImages));
                $previewDiv.remove();
            }
        });
    });

    // Preview new image
    function previewImage(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const index = filesArray.length - 1;
            const previewDiv = $(`
                <div class="image-preview me-2 mb-2" style="position: relative; width: 100px; height: 100px;">
                    <img src="${e.target.result}"
                         class="img-thumbnail"
                         style="height: 100px; object-fit: cover;">
                    <button type="button"
                            class="btn btn-danger btn-sm remove-new-image"
                            style="position: absolute; top: 0px; right: 0px;"
                            data-index="${index}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            `);
            $('#image-list').append(previewDiv);
        };
        reader.readAsDataURL(file);
    }

    // Remove new image (before upload)
    $(document).on('click', '.remove-new-image', function() {
        const index = $(this).data('index');
        const $previewDiv = $(this).closest('.image-preview');

        Swal.fire({
            title: 'Remove Image?',
            text: "This image won't be uploaded",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Remove'
        }).then((result) => {
            if (result.isConfirmed) {
                filesArray.splice(index, 1);
                $previewDiv.remove();
                updateFileInput(); // Update the actual file input
            }
        });
    });

    // Your category AJAX code remains the same...
    $('#category_id').on('change', function() {
        var categoryId = $(this).val();
        let url = "{{ route('get-inventory-by-category', ':id') }}";
        url = url.replace(':id', categoryId);

        if (categoryId) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#inventory_id').empty();
                    $('#inventory_id').append('<option value="">Select Inventory</option>');
                    $.each(data, function(key, value) {
                        $('#inventory_id').append('<option value="' + value.id + '">' + value.model_name + ' - Qty: ' + value.qty + '</option>');
                    });
                }
            });
        } else {
            $('#inventory_id').empty().append('<option value="">Select Inventory</option>');
        }
    });
});
</script>
@endsection
