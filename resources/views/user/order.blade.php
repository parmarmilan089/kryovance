<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
<style>
    .nav-link {
      color: #333;
    }
    .nav-link:hover {
        background-color: #ce0b2b; /* Background color on hover */
        color: white; /* Text color on hover */
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
    <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="user/assets/images/breadcrumb/bg_01.jpg">
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
            @if($orders->isEmpty())
                <p>No orders found.</p>
            @else
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
                    <h2>Profile</h2>
                    <form action="{{ route('customer.profile.update') }}" method="POST">
                        @csrf
                        <div class="reg_form">
                            <div class="form_item">
                                <input type="text" name="firstname" placeholder="First Name" value="{{ old('firstname', $customer['fname']) }}">
                                @error('firstname')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname', $customer['lname']) }}">
                                @error('lastname')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="text" name="company" placeholder="Company Name" value="{{ old('company', $customer['company_name']) }}">
                                @error('company')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email', $customer['email']) }}">
                                @error('email')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form_item">
                                <input type="tel" name="phone" placeholder="Phone" value="{{ old('phone', $customer['phone']) }}">
                                @error('phone')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="custom_btn bg_default_red text-uppercase mb_50">Update Profile</button>
                            @if(session('success'))
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
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>₹{{ number_format($order->total, 2) }}</td>
                                    <td>{{ ucfirst($order->payment_method) }}</td>
                                    <td>
                                        <span class="badge {{ $order->payment_status == 'paid' ? 'badge-success' : 'badge-warning' }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                            {{ ucfirst($order->status) }}
                                    </td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('order.details', $order->id) }}" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- You can add full orders table here -->
                  </div>
                </div>
            </div>

            @endif
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
