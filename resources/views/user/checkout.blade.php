<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
<!-- main body - start
    ================================================== -->
    <main>



        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section text-white text-center text-uppercase d-flex align-items-end clearfix" data-background="user/assets/images/breadcrumb/bg_01.jpg">
            <div class="overlay" data-bg-color="#1d1d1d"></div>
            <div class="container">
                <h1 class="page_title text-white">Checkout</h1>
                <ul class="breadcrumb_nav ul_li_center clearfix">
                    <li><a href="#!">Home</a></li>
                    <li>Shop</li>
                    <li>Checkout</li>
                </ul>
            </div>
        </section>
        <!-- breadcrumb_section - end
        ================================================== -->


        <!-- checkout_section - start
        ================================================== -->
        <section class="checkout_section sec_ptb_140 clearfix">
            <div class="container">
                <ul class="checkout_step ul_li clearfix">
                    <li class="activated"><a href="{{route('shopping-cart')}}"><span>01.</span> Shopping Cart</a></li>
                    <li class="active"><a href="#"><span>02.</span> Checkout</a></li>
                    <li><a href="#"><span>03.</span> Order Completed</a></li>
                </ul>

                @guest('customer')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout_collapse_content">
                                <div class="wrap_heade">
                                    <p class="mb-0">
                                        Returning customer? <a class="collapsed" data-toggle="collapse" href="#loginform_collapse" aria-expanded="false" role="button">Click here to login</a>
                                    </p>
                                </div>
                                <div id="loginform_collapse" class="collapse_form_wrap collapse">
                                    <div class="card-body">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form_item">
                                                        <input type="email" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form_item">
                                                        <input type="password" name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="login_button">
                                                <div class="checkbox_item">
                                                    <label for="remember_checkbox"><input id="remember_checkbox" type="checkbox"> Remember me</label>
                                                </div>
                                                <button type="submit" class="custom_btn bg_default_red">Login Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-6">
                            <div class="checkout_collapse_content">
                                <div class="wrap_heade">
                                    <p class="mb-0">
                                        <i class="ti-info-alt"></i>
                                        Have a coupon? <a class="collapsed" data-toggle="collapse" href="#coupon_collapse" aria-expanded="false">Click here to enter your code</a>
                                    </p>
                                </div>
                                <div id="coupon_collapse" class="collapse_form_wrap collapse">
                                    <div class="card-body">
                                        <form action="#">
                                            <div class="form_item">
                                                <input type="text" name="coupon" placeholder="Coupon Code">
                                            </div>
                                            <button type="submit" class="custom_btn bg_default_red">Apply coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                @endguest

                <form action="{{route('order.place')}}" method="post" id="checkoutForm">
                    @csrf
                    <input type="hidden" name="order_id" id="order_id" value="{{ isset($order) ? $order->id : '' }}">

                    <!-- Error message display -->
                    <div id="error-message" class="alert alert-danger" style="display: none;"></div>

                    <div class="billing_form mb_50">
                        <h3 class="form_title">Billing details</h3>
                        <div class="form_wrap">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form_item">
                                        <span class="input_title">First Name<sup>*</sup></span>
                                        <input type="text" name="first_name" value="{{ auth('customer')->user()->fname }}">
                                        @error('first_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form_item">
                                        <span class="input_title">Last Name<sup>*</sup></span>
                                        <input type="text" name="last_name" value="{{ auth('customer')->user()->lname }}">
                                        @error('last_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form_item">
                                <span class="input_title">Company Name<sup>*</sup></span>
                                <input type="text" name="company_name" value="{{ auth('customer')->user()->company_name }}">
                                @error('company_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="option_select">
                                <span class="input_title">Country<sup>*</sup></span>
                                <select name="country">
                                    <option value="IND" selected>India</option>
                                    <option value="USA">United States</option>
                                </select>
                            </div>

                            <div class="form_item">
                                <span class="input_title">Address<sup>*</sup></span>
                                <input type="text" name="address" placeholder="House number and street name" value="{{ auth('customer')->user()->address }}">
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form_item">
                                <span class="input_title">Town/City<sup>*</sup></span>
                                <input type="text" name="city" value="{{ auth('customer')->user()->city }}">
                                @error('city')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form_item">
                                <span class="input_title">Postcode / Zip<sup>*</sup></span>
                                <input type="text" name="zip_code" value="">
                                @error('zip_code')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form_item">
                                <span class="input_title">Phone<sup>*</sup></span>
                                <input type="tel" name="phone" value="{{ auth('customer')->user()->phone }}">
                                @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form_item">
                                <span class="input_title">Email Address<sup>*</sup></span>
                                <input type="email" name="email" value="{{ auth('customer')->user()->email }}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <!-- <div class="checkbox_item">
                                <label for="account_create_checkbox"><input id="account_create_checkbox" type="checkbox"> Create an account?</label>
                            </div> -->

                            <div class="form_item mb-0">
                                <span class="input_title">Order notes<sup>*</sup></span>
                                <textarea name="order_note" placeholder="Note about your order, eg. special notes fordelivery."></textarea>
                                @error('order_note')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="billing_form">
                        <h3 class="form_title ">Your order</h3>
                        <div class="form_wrap">

                            <div class="checkout_table">
                                <table class="table text-center mb_20">
                                    <thead class="text-uppercase text-uppercase">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $item)
                                            <tr>
                                                <td>
                                                    <div class="cart_product">
                                                        <div class="item_image">
                                                            <img src="{{$item['image']}}" alt="image_not_found">
                                                        </div>
                                                        <div class="item_content">
                                                            <h4 class="item_title mb-0"> {{ \Illuminate\Support\Str::limit($item['name'], 40, '..') }}</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_text">₹{{$item['price']}}</span>
                                                </td>
                                                <td>
                                                    <span class="quantity_text">{{$item['quantity']}}</span>
                                                </td>
                                                <td><span class="total_price">₹{{$item['price'] * $item['quantity']}}</span></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-left">
                                                <span class="subtotal_text">TOTAL</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="total_price">₹{{$subtotal}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="billing_payment_mathod">
                                <ul class="ul_li_block clearfix">
                                    <li>
                                        <div class="checkbox_item mb-0 pl-0">
                                            <label for="cash_delivery"><input id="cash_delivery" type="radio" name="payment_method" value="cod"> Cash On Delivery</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox_item mb-0 pl-0">
                                            <label for="razorpay_checkbox"><input id="razorpay_checkbox" type="radio" name="payment_method" value="razorpay"> <span class="razorpay_span">Razorpay</span> <a href="#!"><img class="paypal_image" src="user/assets/images/payment_methods_03.png" alt="image_not_found"></a></label>
                                        </div>
                                    </li>
                                </ul>
                                <button type="submit" class="custom_btn bg_default_red">PLACE ORDER</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </section>
        <!-- checkout_section - end
        ================================================== -->


    </main>
    <!-- main body - end
    ================================================== -->

@endsection

<!-- Razorpay JS SDK -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const razorpayRadio = document.getElementById('razorpay_checkbox');
    const checkoutForm = document.getElementById('checkoutForm');

    if (!razorpayRadio || !checkoutForm) return;

    checkoutForm.addEventListener('submit', function(e) {
        if (razorpayRadio.checked) {
            e.preventDefault();
            // Gather form data
            const formData = new FormData(checkoutForm);
            // AJAX POST to placeOrder
            fetch(checkoutForm.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data && data.order_id) {
                    // Launch Razorpay modal
                    var options = {
                        key: "rzp_live_PSBe9qHdz1LKGW", // Your Razorpay key
                        amount: "{{ $subtotal * 100 }}", // Amount in paise
                        currency: "INR",
                        name: "Kryovance",
                        description: "Order Payment",
                        handler: function (response){
                            var formData = new FormData();
                            formData.append('razorpay_payment_id', response.razorpay_payment_id);
                            formData.append('order_id', data.order_id);
                            formData.append('amount', {{ $subtotal * 100 }});

                            fetch('/razorpay/capture', {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                },
                                body: formData
                            })
                            .then(res => res.json())
                            .then(captureData => {
                                if (captureData.status === 'success') {
                                    window.location.href = '/razor/payment/' + data.order_id;
                                } else {
                                    showError(captureData.message || 'Payment capture failed.');
                                }
                            })
                            .catch(() => {
                                showError('Payment capture failed. Please try again.');
                            });
                        },
                        prefill: {
                            name: "{{ auth('customer')->user()->fname ?? '' }} {{ auth('customer')->user()->lname ?? '' }}",
                            email: "{{ auth('customer')->user()->email ?? '' }}",
                            contact: "{{ auth('customer')->user()->phone ?? '' }}"
                        },
                        theme: {
                            color: "#F37254"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                } else {
                    showError('Order creation failed. Please try again.');
                }
            })
            .catch(() => {
                showError('Order creation failed. Please try again.');
            });
        }
        // else, normal submit for COD
    });

    // Function to show error messages
    function showError(message) {
        const errorDiv = document.getElementById('error-message');
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
        // Auto-hide after 5 seconds
        setTimeout(() => {
            errorDiv.style.display = 'none';
        }, 5000);
    }
});
</script>
