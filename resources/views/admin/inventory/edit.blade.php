<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
    
            <form id="form_add_category" action="{{ route('inventories.update', $inventory->id) }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Model Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="model_name" class="form-control" required value="{{$inventory->model_name}}">
                        @if($errors->has('model_name'))
                            <div class="error">{{ $errors->first('model_name') }}</div>
                        @endif
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-qty">Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" name="qty" class="form-control" required value="{{$inventory->qty}}">
                        @if($errors->has('qty'))
                            <div class="error">{{ $errors->first('qty') }}</div>
                        @endif
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-category">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-control"  required>
                            <option value="">Select Category</option >
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{$category->id == $inventory->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">Save</button>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>

@endsection