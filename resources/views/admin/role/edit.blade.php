<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="col-lg-12">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Customer Role</h5>

            <form id="form_add_role" method="POST" action="{{ route('update-role') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="role_id" id="role_id" value="{{ $role->id }}" />

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->title) }}" />
                        @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>

                <!-- User Type (Radio Buttons) -->
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">User Type</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="seller" value="1" {{ $role->user_type == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="seller">
                                Seller
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="distributor" value="2" {{ $role->user_type == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="distributor">
                                Distributor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="gov_employee" value="3" {{ $role->user_type == 3 ? 'checked' : '' }}>
                            <label class="form-check-label" for="gov_employee">
                                Gov Employee
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="retailer" value="4" {{ $role->user_type == 4 ? 'checked' : '' }}>
                            <label class="form-check-label" for="retailer">Retailer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" id="Wholesaler" value="5" {{ $role->user_type == 5 ? 'checked' : '' }}>
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

        </div>
    </div>

</div>

@endsection
