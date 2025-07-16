<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>

            <form id="form_add_role" method="POST" action="{{ route('store-role') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">  Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="title">
                        @if($errors->has('title'))
                        <div class="error">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                </div>
                <!-- User Type Radio Buttons -->
                <div class="row mb-3">
                    <label for="user_type" class="col-sm-2 col-form-label">User Type</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="seller" value="1" required>
                            <label class="form-check-label" for="seller">Seller</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="distributer" value="2" required>
                            <label class="form-check-label" for="distributer">Distributor</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="gov_employee" value="3" required>
                            <label class="form-check-label" for="gov_employee">Government Employee</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="retailer" value="4" required>
                            <label class="form-check-label" for="retailer">Retailer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="Wholesaler" value="5" required>
                            <label class="form-check-label" for="Wholesaler">Wholesaler</label>
                        </div>

                        @if($errors->has('user_type'))
                            <div class="error">{{ $errors->first('user_type') }}</div>
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End Horizontal Form -->
            <!-- Displaying session messages -->
            @if(session('error'))
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

        </div>
    </div>

</div>

@endsection
