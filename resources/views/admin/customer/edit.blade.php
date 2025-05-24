<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <form id="form_add_customer" method="POST" action="{{ route('update-customer') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="customer_id" id="customer_id" value="{{ $customer->id }}" />

                <div class="row mb-3">
                    <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $customer->first_name) }}" />
                        @if($errors->has('firstname'))
                            <div class="error">{{ $errors->first('firstname') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $customer->last_name) }}" />
                        @if($errors->has('lastname'))
                            <div class="error">{{ $errors->first('lastname') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $customer->company_name) }}" />
                        @if($errors->has('company_name'))
                            <div class="error">{{ $errors->first('company_name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $customer->email) }}" />
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" />
                        @if($errors->has('phone'))
                            <div class="error">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            @if (session('success'))
                    <div class="alert alert-success">
                        <p class="text-center">{{ session('success') }}</p>
                    </div>
                @endif
            @if (session('error'))
                    <div class="alert alert-success">
                        <p class="text-center">{{ session('error') }}</p>
                    </div>
                @endif

        </div>
    </div>

</div>

@endsection
