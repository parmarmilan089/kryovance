<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <form id="form_add_role" method="POST" action="{{ route('update-role') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="role_id" id="role_id" value="<?php echo $role->id ?>" />
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">  Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $role->name)}}" />
                        @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
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