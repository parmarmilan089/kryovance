<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <form id="form_add_user" method="POST" action="{{ route('update-user') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->id ?>" />
                <div class="row mb-3">
                    <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name', $user->first_name)}}" />
                        @if($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                </div>
                  <div class="row mb-3">
                    <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name', $user->last_name)}}" />
                        @if($errors->has('last_name'))
                        <div class="error">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mobile_no" class="col-sm-2 col-form-label">Mobile No</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{old('mobile_no', $user->mobile_no)}}" />
                        @if($errors->has('mobile_no'))
                        <div class="error">{{ $errors->first('mobile_no') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}" />
                        @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        ******
                    </div>
                </div>
                 <div class="row mb-3">
                    <label for=" " class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                         <label for="" class="col-sm-2 col-form-label">{{ $user->user_roles_name}}</label>
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