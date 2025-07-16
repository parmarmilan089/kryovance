<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form id="update_user" method="POST"  action="{{ route('update-user-profile') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" />
                        @if($errors->has('first_name'))
                        <div class="error">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Last name </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" />
                        @if($errors->has('last_name'))
                        <div class="error">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" />
                        @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="profile_image" name="profile_image" />
                        @if($user->profile_image_path !=null)
                        <img src="{{ getStoragePath() . $user->profile_image_path }}" alt="user-avatar" class="d-block rounded mt-2" height="100" id="uploadedAvatar">
                        @endif
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>

@endsection