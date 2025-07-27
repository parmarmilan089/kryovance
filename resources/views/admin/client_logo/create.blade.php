<!-- Extends template page -->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Client Logo</h5>

            <form id="form_add_logo" method="POST" action="{{ route('client-logos.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required />
                        @if($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Image -->
                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Logo Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image" required />
                        @if($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Add Logo</button>
                    <a href="{{ route('client-logos.index') }}" class="btn btn-secondary">Back</a>
                </div>

            </form><!-- End Horizontal Form -->

        </div>
    </div>
</div>
@endsection
