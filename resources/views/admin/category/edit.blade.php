<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <form id="form_add_category" method="POST" action="{{ route('update-category') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="category_id" id="category_id" value="<?php echo $category->id ?>" />
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">  Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $category->name)}}" />
                        @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image">
                        @if($category->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $category->image) }}" width="100">
                            </div>
                        @endif
                        @if($errors->has('image'))
                            <div class="error">{{ $errors->first('image') }}</div>
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
