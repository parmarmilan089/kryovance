<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <form id="form_add_user" method="POST" action="{{ route('store-customer') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- First Name -->
                <div class="row mb-3">
                    <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname')}}" />
                        @if($errors->has('firstname'))
                            <div class="error">{{ $errors->first('firstname') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Last Name -->
                <div class="row mb-3">
                    <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname')}}" />
                        @if($errors->has('lastname'))
                            <div class="error">{{ $errors->first('lastname') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Company Name -->
                <div class="row mb-3">
                    <label for="company" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="company" name="company" value="{{old('company')}}" />
                        @if($errors->has('company'))
                            <div class="error">{{ $errors->first('company') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" />
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Phone -->
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{old('phone')}}" />
                        @if($errors->has('phone'))
                            <div class="error">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>

                <!-- Default Password -->
                <input type="hidden" name="password" value="defaultpassword123" />

                <!-- Role Selection -->
                {{--  <div class="row mb-3">
                    <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="role_id" name="role_id">
                            <option value="">Select role</option>
                            <option value="1">Seller</option>
                            <option value="2">Distributor</option>
                            <option value="3">Gov.Employee</option>
                            <option value="4">Wholesaler</option>
                            <option value="5">Retailer</option>
                        </select>
                        @if($errors->has('role_id'))
                            <div class="error">{{ $errors->first('role_id') }}</div>
                        @endif
                    </div>
                </div>  --}}

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create Customer</button>
                </div>
            </form><!-- End Horizontal Form -->

        </div>
    </div>

</div>

@endsection
