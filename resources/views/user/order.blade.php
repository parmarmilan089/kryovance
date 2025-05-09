<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
    <style>
        .nav-link {
            color: #333;
        }

        .nav-link:hover {
            background-color: #ce0b2b;
            /* Background color on hover */
            color: white;
            /* Text color on hover */
        }

        .nav-link.active {
            background-color: #ce0b2b !important;
            font-weight: bold;
            color: white;
        }

        .content-section {
            display: none;
        }
    </style>
    <main>
        <!-- breadcrumb_section - start
                                ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix"
            data-background="user/assets/images/breadcrumb/bg_01.jpg">
            <div class="overlay" data-bg-color="#1d1d1d"></div>
            <div class="container">
                <h1 class="page_title text-white">Cart Page</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="#!">Home</a></li>
                    <li>Shop</li>
                    <li>Shopping Cart</li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb_section - end
                                ================================================== -->


        <!-- Order - start
                                ================================================== -->
        <section class="cart_section sec_ptb_140 clearfix">
            <div class="container-fluid">
                <div class="d-flex">
                    <!-- Vertical Navbar -->
                    <div class="d-flex flex-column p-3 bg-light" style="width: 250px; height: 100vh;">
                        {{--  <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                    <span class="fs-4">Dashboard</span>
                  </a>
                  <hr>  --}}
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link active" onclick="showSection('profile')">Profile</a>
                            </li>
                            <li class="mt-2">
                                <a class="nav-link" onclick="showSection('orders')">Orders</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Content Area -->
                    <div class="p-4" id="content" style="flex-grow: 1;">
                        <!-- Profile Section -->
                        <div id="profile" class="content-section" style="display: block;">
                            <div class="d-flex">
                                <div>
                                    <h2>Profile</h2>
                                </div>
                                <div class="m-1 mx-4">
                                    @if ($customer['customer_verification_status'] == 1)
                                        <span class="badge bg-success text-white" style="font-size: 14px;">Verified</span>
                                    @else
                                        <span class="badge bg-warning text-dark" style="font-size: 14px;">Not Verified</span>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('customer.profile.update') }}" method="POST">
                                @csrf
                                <div class="reg_form">

                                    {{-- Basic Info --}}
                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="firstname" placeholder="First Name"
                                                value="{{ old('firstname', $customer['fname']) }}">
                                            @error('firstname')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="lastname" placeholder="Last Name"
                                                value="{{ old('lastname', $customer['lname']) }}">
                                            @error('lastname')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="email" name="email" placeholder="Primary Email"
                                                value="{{ old('email', $customer['email']) }}">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="tel" name="phone" placeholder="Primary Phone"
                                                value="{{ old('phone', $customer['phone']) }}">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="email" name="email_2" placeholder="Secondary Email"
                                                value="{{ old('email_2', $customer['email_2']) }}">
                                            @error('email_2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="tel" name="phone_2" placeholder="Secondary Phone"
                                                value="{{ old('phone_2', $customer['phone_2']) }}">
                                            @error('phone_2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="email" name="email_3" placeholder="Other Email"
                                                value="{{ old('email_3', $customer['email_3']) }}">
                                            @error('email_3')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="tel" name="phone_3" placeholder="Other Phone"
                                                value="{{ old('phone_3', $customer['phone_3']) }}">
                                            @error('phone_3')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="gst_number" placeholder="GST Number"
                                                value="{{ old('gst_number', $customer['gst_number']) }}">
                                            @error('gst_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="pan_number" placeholder="PAN Number"
                                                value="{{ old('pan_number', $customer['pan_number']) }}">
                                            @error('pan_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="company" placeholder="Company Name"
                                                value="{{ old('company', $customer['company_name']) }}">
                                            @error('company')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <h4 class="text-uppercase">Bank Details</h4>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="bank_holder_name" placeholder="Bank Holder Name"
                                                value="{{ old('bank_holder_name', $customer['bank_holder_name']) }}">
                                            @error('bank_holder_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="bank_account_number"
                                                placeholder="Bank Account Number"
                                                value="{{ old('bank_account_number', $customer['bank_account_number']) }}">
                                            @error('bank_account_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="ifsc_code" placeholder="IFSC Code"
                                                value="{{ old('ifsc_code', $customer['ifsc_code']) }}">
                                            @error('ifsc_code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="bank_name" placeholder="Bank Name"
                                                value="{{ old('bank_name', $customer['bank_name']) }}">
                                            @error('bank_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <h4 class="text-uppercase">Import Export Code</h4>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="import_code" placeholder="Import Code (Optional)"
                                                value="{{ old('import_code', $customer['import_code']) }}">
                                            @error('import_code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="export_code" placeholder="Export Code (Optional)"
                                                value="{{ old('export_code', $customer['export_code']) }}">
                                            @error('export_code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <h4 class="text-uppercase">Address Details</h4>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="address" placeholder="Address"
                                                value="{{ old('address', $customer['address']) }}">
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="city" placeholder="City"
                                                value="{{ old('city', $customer['city']) }}">
                                            @error('city')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="state" placeholder="State"
                                                value="{{ old('state', $customer['state']) }}">
                                            @error('state')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="country" placeholder="Country"
                                                value="{{ old('country', $customer['country']) }}">
                                            @error('country')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <h4 class="text-uppercase">Partner Details</h4>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="partner_name_1" placeholder="Partner Name"
                                                value="{{ old('partner_name_1', $customer['partner_name_1']) }}">
                                            @error('partner_name_1')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="partner_role_1" placeholder="Partner Role / Type"
                                                value="{{ old('partner_role_1', $customer['partner_role_1']) }}">
                                            @error('partner_role_1')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="partner_name_2" placeholder="Partner Name"
                                                value="{{ old('partner_name_2', $customer['partner_name_2']) }}">
                                            @error('partner_name_2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="partner_role_2" placeholder="Partner Role / Type"
                                                value="{{ old('partner_role_2', $customer['partner_role_2']) }}">
                                            @error('partner_role_2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <h4 class="text-uppercase">Employee Details</h4>

                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="employee_name_1" placeholder="Employee Name"
                                                value="{{ old('employee_name_1', $customer['employee_name_1']) }}">
                                            @error('employee_name_1')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="employee_position_1"
                                                placeholder="Position / Short Role"
                                                value="{{ old('employee_position_1', $customer['employee_position_1']) }}">
                                            @error('employee_position_1')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form_item col-md-6">
                                            <input type="text" name="employee_name_2" placeholder="Employee Name"
                                                value="{{ old('employee_name_2', $customer['employee_name_2']) }}">
                                            @error('employee_name_2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form_item col-md-6">
                                            <input type="text" name="employee_position_2"
                                                placeholder="Position / Short Role"
                                                value="{{ old('employee_position_2', $customer['employee_position_2']) }}">
                                            @error('employee_position_2')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit"
                                                class="custom_btn bg_default_red text-uppercase mb_50">Update
                                                Profile</button>
                                        </div>
                                    </div>

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            <p class="text-center">{{ session('success') }}</p>
                                        </div>
                                    @endif

                                </div>
                            </form>
                        </div>

                        <!-- Orders Section -->
                        <div id="orders" class="content-section">
                            <h2>Orders</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Total Amount</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            <td>₹{{ number_format($order->total, 2) }}</td>
                                            <td>{{ ucfirst($order->payment_method) }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $order->payment_status == 'paid' ? 'badge-success' : 'badge-warning' }}">
                                                    {{ ucfirst($order->payment_status) }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ ucfirst($order->status) }}
                                            </td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('order.details', $order->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- You can add full orders table here -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- order_section - end
                                ================================================== -->


    </main>
    <!-- main body - end
                            ================================================== -->
@endsection
@section('scripts')
    <script>
        function showSection(sectionId) {
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => section.style.display = 'none');

            // Remove active class from all nav links
            const links = document.querySelectorAll('.nav-link');
            links.forEach(link => link.classList.remove('active'));

            // Show selected section
            document.getElementById(sectionId).style.display = 'block';

            // Add active class to clicked link
            event.target.classList.add('active');
        }
    </script>
@endsection
