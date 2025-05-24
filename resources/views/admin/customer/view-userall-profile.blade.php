<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"></h5>

                {{-- Basic Info --}}
                <h4 class="text-uppercase">
                    <b>
                        Basic Information
                    </b>
                </h4>
                <div class="row mb-3">
                    <div class="col-md-6"><label>First Name</label>
                        <div class="form-control">{{ $customer->fname  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Last Name</label>
                        <div class="form-control">{{ $customer->lname  ?? '-' }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label>Primary Email</label>
                        <div class="form-control">{{ $customer->email  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Primary Phone</label>
                        <div class="form-control">{{ $customer->phone  ?? '-' }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label>Secondary Email</label>
                        <div class="form-control">{{ $customer->email_2 ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Secondary Phone</label>
                        <div class="form-control">{{ $customer->phone_2  ?? '-' }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6"><label>Other Email</label>
                        <div class="form-control">{{ $customer->email_3  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Other Phone</label>
                        <div class="form-control">{{ $customer->phone_3  ?? '-' }}</div>
                    </div>
                </div>

                <hr>
                <h4 class="text-uppercase"><b>Company & Tax Info</b></h4>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Company Name</label>
                        <div class="form-control">{{ $customer->company_name  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>GST Number</label>
                        <div class="form-control">{{ $customer->gst_number  ?? '-' }}</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>PAN Number</label>
                        <div class="form-control">{{ $customer->pan_number  ?? '-' }}</div>
                    </div>
                </div>

                <hr>
                <h4 class="text-uppercase"><b>Bank Details</b></h4>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Bank Holder Name</label>
                        <div class="form-control">{{ $customer->bank_holder_name  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Bank Account Number</label>
                        <div class="form-control">{{ $customer->bank_account_number  ?? '-' }}</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>IFSC Code</label>
                        <div class="form-control">{{ $customer->ifsc_code  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Bank Name</label>
                        <div class="form-control">{{ $customer->bank_name  ?? '-' }}</div>
                    </div>
                </div>

                <hr>
                <h4 class="text-uppercase">Import Export Code</h4>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Import Code</label>
                        <div class="form-control">{{ $customer->import_code  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Export Code</label>
                        <div class="form-control">{{ $customer->export_code  ?? '-' }}</div>
                    </div>
                </div>

                <hr>
                <h4 class="text-uppercase"><b>Address Details</b></h4>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Address</label>
                        <div class="form-control">{{ $customer->address  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>City</label>
                        <div class="form-control">{{ $customer->city  ?? '-' }}</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>State</label>
                        <div class="form-control">{{ $customer->state  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Country</label>
                        <div class="form-control">{{ $customer->country  ?? '-' }}</div>
                    </div>
                </div>

                <hr>
                <h4 class="text-uppercase"><b>Partner Details</b></h4>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Partner Name 1</label>
                        <div class="form-control">{{ $customer->partner_name_1  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Partner Role 1</label>
                        <div class="form-control">{{ $customer->partner_role_1  ?? '-' }}</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Partner Name 2</label>
                        <div class="form-control">{{ $customer->partner_name_2  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Partner Role 2</label>
                        <div class="form-control">{{ $customer->partner_role_2  ?? '-' }}</div>
                    </div>
                </div>

                <hr>
                <h4 class="text-uppercase"><b>Employee Details</b></h4>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Employee Name 1</label>
                        <div class="form-control">{{ $customer->employee_name_1  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Position 1</label>
                        <div class="form-control">{{ $customer->employee_position_1  ?? '-' }}</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label>Employee Name 2</label>
                        <div class="form-control">{{ $customer->employee_name_2  ?? '-' }}</div>
                    </div>
                    <div class="col-md-6"><label>Position 2</label>
                        <div class="form-control">{{ $customer->employee_position_2  ?? '-' }}</div>
                    </div>
                </div>

                <hr>
                {{-- Customer Verification --}}
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Verification Status</label>
                        <div class="form-control">
                            @if ($customer->customer_verification_status)
                                <span class="text-success">Verified</span>
                            @else
                                <span class="text-danger">Not Verified</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Verify Button --}}
                @if (!$customer->customer_verification_status)
                    <form method="POST" action="{{ route('admin.customers.verify', $customer->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success text-uppercase">Verify User</button>
                    </form>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        <p class="text-center">{{ session('success') }}</p>
                    </div>
                @endif

            </div>
        </div>

    </div>
@endsection
