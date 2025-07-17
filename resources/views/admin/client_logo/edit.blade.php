<!-- Extends template page -->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Client Logo</h5>

            <form id="form_edit_logo" method="POST" action="{{ route('client-logos.update', $logo->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $logo->title) }}" required />
                        @if($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Image -->
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Logo Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image" />
                        @if($logo->image_path)
                            <img src="{{ asset('storage/' . $logo->image_path) }}" alt="{{ $logo->title }}" width="100" class="mt-2">
                        @endif
                        @if($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Logo</button>
                    <a href="{{ route('client-logos.index') }}" class="btn btn-secondary">Back</a>
                </div>

            </form><!-- End Horizontal Form -->

        </div>
    </div>
</div>
@endsection
