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
                <input type="hidden" id="hidden-images" name="image_files" value="">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
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
                        <input type="text" class="form-control" id="model_no" name="model_no" placeholder="Enter Model No">
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
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price"/>
                        @if($errors->has('price'))
                        <div class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="mrp" class="col-sm-2 col-form-label">MRP</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="mrp" name="mrp" placeholder="Enter MRP"/>
                        @if($errors->has('mrp'))
                        <div class="error">{{ $errors->first('mrp') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter SKU"/>
                        @if($errors->has('sku'))
                        <div class="error">{{ $errors->first('sku') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand Name"/>
                        @if($errors->has('brand'))
                        <div class="error">{{ $errors->first('brand') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Images</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple />
                        <div id="image-list" class="mt-3 d-flex flex-wrap"></div> <!-- Preview goes here -->
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
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" />
                        @if($errors->has('expiry_date'))
                        <div class="error">{{ $errors->first('expiry_date') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="imported_date" class="col-sm-2 col-form-label">Imported Date</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="imported_date" name="imported_date" />
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
    $(document).ready(function() {
    const MAX_IMAGES = 5;
    let filesArray = [];

    // File input change handler
    $('#image').on('change', function(e) {
        if (this.files.length) {
            // Check if total files would exceed limit
            if (filesArray.length + this.files.length > MAX_IMAGES) {
                Swal.fire({
                    icon: 'error',
                    title: 'Too many images',
                    text: `You can upload maximum ${MAX_IMAGES} images. You already have ${filesArray.length}.`,
                });
                $(this).val(''); // Clear the input
                return;
            }

            // Add new files to array
            $.each(this.files, function(i, file) {
                const fileExists = filesArray.some(existingFile =>
                    existingFile.name === file.name &&
                    existingFile.size === file.size
                );

                if (!fileExists) {
                    filesArray.push(file);
                }
            });

            // Update the file input
            updateFileInput();
            updatePreview();
        }
    });

    // Form submission handler
    $('#form_add_product').on('submit', function(e) {
        console.log('Submitting', filesArray.length, 'images');
        // The form will submit normally with all files
    });

    // Update the actual file input with files from our array
    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        filesArray.forEach(file => dataTransfer.items.add(file));
        $('#image')[0].files = dataTransfer.files;
    }

    // Update the preview display
    function updatePreview() {
        $('#image-list').empty();

        $.each(filesArray, function(index, file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewDiv = $('<div>').addClass('image-preview me-2 mb-2')
                    .css({
                        'position': 'relative',
                        'width': '100px',
                        'height':'100px',
                    });

                const img = $('<img>')
                    .attr('src', e.target.result)
                    .addClass('img-thumbnail')
                    .css({
                        'height':'100px',
                        'object-fit':'cover'
                    });

                const removeBtn = $('<button>')
                    .attr('type', 'button')
                    .addClass('btn btn-danger btn-sm')
                    .css({
                        'position': 'absolute',
                        'top': '0',
                        'right': '0'
                    })
                    .html('<i class="bi bi-trash"></i>')
                    .on('click', function() {
                        confirmRemoveImage(index);
                    });

                previewDiv.append(img).append(removeBtn);
                $('#image-list').append(previewDiv);
            };

            reader.readAsDataURL(file);
        });
    }

    // Confirm image removal with SweetAlert
    function confirmRemoveImage(index) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This image will be removed!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                removeImage(index);
            }
        });
    }

    // Remove image from array and update UI
    function removeImage(index) {
        filesArray.splice(index, 1);
        updateFileInput();
        updatePreview();

        Swal.fire(
            'Removed!',
            'Your image has been removed.',
            'success'
        );
    }
});
$(document).ready(function () {
    $('#country').select2({
        placeholder: "Select a country",
        allowClear: true
    });
    });


    // Handle category change for inventory selection
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
