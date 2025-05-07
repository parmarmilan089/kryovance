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


        <!-- cart_section - start
        ================================================== -->
        <section class="cart_section sec_ptb_140 clearfix">
            <div class="container">

                <ul class="checkout_step ul_li clearfix">
                    <li class="active"><a href="#"><span>01.</span> Shopping Cart</a></li>
                    <li><a href="#"><span>02.</span> Checkout</a></li>
                    <li><a href="#"><span>03.</span> Order Completed</a></li>
                </ul>

                <div class="cart_table mb_50">
                    <table class="table">
                        <thead class="text-uppercase">
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr id="cart-item-{{$item['id']}}">
                                    <td>
                                        <div class="cart_product">
                                            <div class="item_image">
                                                <img src="{{$item['image']}}" alt="image_not_found">
                                            </div>
                                            <div class="item_content">
                                                <h4 class="item_title">{{$item['name']}}</h4>
                                                <span class="item_type">{{$item['category_name']}}</span>
                                            </div>
                                            <button type="button" class="remove_btn remove_product" data-id="{{$item['id']}}">
                                                <i class="fal fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="price_text">₹{{$item['price']}}</span>
                                    </td>
                                    <td>
                                        <div class="quantity_input">
                                            <span class="input_decrement" data-id="{{$item['id']}}">–</span>
                                            <input class="input_number quantity-{{$item['id']}}" type="text" value="{{$item['quantity']}}">
                                            <span class="input_increment" data-id="{{$item['id']}}">+</span>
                                        </div>
                                    </td>
                                    <td><span class="total_price">₹{{$item['price'] * $item['quantity']}}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="coupon_wrap mb_50">
                    <div class="row justify-content-lg-between">
                        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                            <div class="coupon_form">
                                <div class="form_item mb-0">
                                    <input type="text" class="coupon" placeholder="Coupon Code">
                                </div>
                                <button type="submit" class="custom_btn bg_danger text-uppercase">Apply Coupon</button>
                            </div>
                        </div>

                        <!-- <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                            <div class="cart_update_btn">
                                <button type="button" class="custom_btn bg_secondary text-uppercase">Update Cart</button>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="row justify-content-lg-end">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="cart_pricing_table pt-0 text-uppercase" data-bg-color="#f2f3f5">
                            <h3 class="table_title text-center" data-bg-color="#ededed">Cart Total</h3>
                            <ul class="ul_li_block clearfix">
                                <li><span>Subtotal</span> <span class="sub-total">₹{{number_format($subtotal,2)}}</span></li>
                                <li><span>Total</span> <span class="total">₹{{number_format($subtotal,2)}}</span></li>
                            </ul>
                            <a href="{{route('checkout')}}" class="custom_btn bg_success">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- cart_section - end
        ================================================== -->


    </main>
    <!-- main body - end
    ================================================== -->

@endsection
@section('scripts')
    <script>
        $(document).on('click', '.remove_product', function () {
            let productId = $(this).data('id');

            $.ajax({
                url: '/cart/remove',
                type: 'POST',
                data: { id: productId, _token: $('meta[name="csrf-token"]').attr('content') },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        $('.cart_btn span').text(response.cart_count);
                        $('.total').text(response.total);
                        $('.sub-total').text(response.total);
                        $('#cart-item-' + productId).remove();
                    } else {
                        alert('Failed to remove item.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    alert('Error removing item.');
                }
            });
        });
        $(document).ready(function () {
            function updateCartItemQuantity(productId, newQuantity) {
                $.ajax({
                    url: "{{ route('cart.update') }}",  // Adjust this to your actual route
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: productId,
                        quantity: newQuantity
                    },
                    success: function (response) {
                        if (response.status === "success") {
                            $('.total').text(`₹${response.subtotal}`);
                            $('.sub-total').text(`₹${response.subtotal}`);
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }

            // Increase Quantity
            $(".input_increment").click(function () {
                let productId = $(this).data("id");
                let inputField = $(".quantity-" + productId);
                let newQuantity = parseInt(inputField.val()) + 1;
                inputField.val(newQuantity);

                updatePrice(productId, newQuantity);
                updateCartItemQuantity(productId, newQuantity);
            });

            // Decrease Quantity
            $(".input_decrement").click(function () {
                let productId = $(this).data("id");
                let inputField = $(".quantity-" + productId);
                let newQuantity = parseInt(inputField.val()) - 1;
                if (newQuantity < 1) return; // Prevents negative or zero values

                inputField.val(newQuantity);

                updatePrice(productId, newQuantity);
                updateCartItemQuantity(productId, newQuantity);
            });

            // Function to update total price
            function updatePrice(productId, quantity) {
                let price = parseFloat($(`#cart-item-${productId} .price_text`).text().replace("₹", ""));
                let totalPrice = price * quantity;
                $(`#cart-item-${productId} .total_price`).text(`₹${totalPrice.toFixed(2)}`);

                updateSubtotal();
            }

            // Function to update subtotal
            function updateSubtotal() {
                let subtotal = 0;
                $(".total_price").each(function () {
                    subtotal += parseFloat($(this).text().replace("₹", ""));
                });
                $(".subtotal_price").text(`₹${subtotal.toFixed(2)}`);
            }
        });
    </script>
@endsection
