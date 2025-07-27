<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')

<style>
    .item.d-flex.align-items-center.clearfix.slick-slide {
        height: 720px;
    }

    
    .carousel_nav button {
        width: 50px;
        height: 50px;
        color: #ffffff;
        font-size: 39px;
        border-radius: 4px;
        align-items: center;
        display: inline-flex;
        justify-content: center;
        background-color: #1c71d3;
    }

    section.product_section.sec_ptb_140.clearfix {
        padding-top: 60px;
    }

    ul#category-tab li a img {
        width: 120px !important;
        height: 120px !important;
        margin-bottom: 30px;
    }

    .search_body form {
        background: #f3f3f3;
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid #484646;
        height: 50px;
    }

    /* Cart message styling */
    .cart-message {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
    }

    .cart-message .alert {
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border: none;
        padding: 15px 20px;
    }

    .cart-message .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .cart-message .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .cart-cta button {
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .cart-cta button:hover {
        transform: scale(1.1);
    }

    .cart-cta button:active {
        transform: scale(0.95);
    }

    /* Loading and success icons */
    .loading-spinner {
        display: inline-block;
        animation: spin 1s linear infinite;
        margin-right: 5px;
    }

    .success-icon {
        color: #28a745;
        font-weight: bold;
        margin-right: 5px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Enhanced Quantity Controls */
    .cart-plus-flex .input-group {
        border-radius: 6px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .btn-add, .btn-subtract {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        color: #495057;
        font-weight: bold;
        transition: all 0.2s ease;
        min-width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        z-index: 10;
    }

    .btn-add:hover, .btn-subtract:hover {
        background: #e9ecef;
        color: #212529;
        transform: scale(1.05);
    }

    .btn-add:active, .btn-subtract:active,
    .btn-add.btn-clicked, .btn-subtract.btn-clicked {
        background: #007bff;
        color: white;
        transform: scale(0.95);
    }

    .btn-add.btn-disabled, .btn-subtract.btn-disabled {
        opacity: 0.6;
        cursor: not-allowed;
        pointer-events: none;
    }

    .item-quantity {
        border: 1px solid #dee2e6;
        text-align: center;
        font-weight: 600;
        color: #495057;
        background: white;
        transition: border-color 0.2s ease;
        min-width: 50px;
    }

    .item-quantity:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
        outline: none;
    }

    /* Quantity Feedback Messages */
    .quantity-feedback {
        position: absolute;
        top: -30px;
        left: 50%;
        transform: translateX(-50%);
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 500;
        white-space: nowrap;
        z-index: 1000;
        animation: feedbackSlideIn 0.3s ease;
    }

    .feedback-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .feedback-info {
        background: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    .feedback-warning {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    @keyframes feedbackSlideIn {
        from {
            opacity: 0;
            transform: translateX(-50%) translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }

    /* Improved cart controls container */
    .cart-ctaflex {
        position: relative;
        margin-top: 10px;
    }

    .cart-plus-flex {
        position: relative;
    }
    .productCart-flex .cart-plus-flex .input-group .btn {
 
    border: 0;
}
.category_tabs .row:first-child {
    justify-content: center;
}
.hotProdcut_flex .hotproduct-cart .hotP-img img {
    object-fit: contain;
    aspect-ratio: 1 / 1;
    width: 100%;
}
.productCart-flex .cart-cta button {
    padding: 5px 15px;
}
</style>
<!-- Banner -->
<div class="banner_flex">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="banner-content">
                                        <h1>India's Best Home Printers <span>2025</span></h1>
                                        <p>Reliable and affordable printers perfect for everyday use at home.</p>
                                        <div class="banner-cta">
                                            <a href="#">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="banner-img">
                                        <figure>
                                            <img src="{{asset('user/assets/images/printer.png')}}" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="banner-content">
                                        <h1>India's Best Home Printers <span>2025</span></h1>
                                        <p>Reliable and affordable printers perfect for everyday use at home.</p>
                                        <div class="banner-cta">
                                            <a href="#">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="banner-img">
                                        <figure>
                                            <img src="{{asset('user/assets/images/printer.png')}}" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="banner-content">
                                        <h1>India's Best Home Printers <span>2025</span></h1>
                                        <p>Reliable and affordable printers perfect for everyday use at home.</p>
                                        <div class="banner-cta">
                                            <a href="#">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="banner-img">
                                        <figure>
                                            <img src="{{asset('user/assets/images/printer.png')}}" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Arrows -->
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Banner  -->

<!-- Hot Products -->
<div class="hotProdcut_flex">
    <?php $latestProducts = getLatestProductsWithImages(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="hotproduct-heading">
                    <div class="hot-suptext">Power Up Your Printing and Photography
                        <div class="hot-boldtext">Fast, Reliable & Affordable!!</div>
                    </div>
                </div>
            </div>
            @foreach ($latestProducts as $item)
            @php
            $price = getDiscountedPrice($item->product_id, $item->product_price);
            @endphp

            <div class="col-md-3">
                <div class="hotproduct-cart">
                    <div class="hotproduct-text">
                        <div class="hot-heading">
                            {{ \Illuminate\Support\Str::limit($item->product_name, 40, '..') }}
                        </div>
                        <div class="hotP-price">
                            ₹ {{ $price }}
                        </div>
                        <div class="hot-cta">
                            <a href="{{route('product_details',$item->product_id)}}">Shop Now</a>
                        </div>
                    </div>
                    <div class="hotP-img">
                        <figure>
                            <img src="{{ $item->image_url ? $item->image_url : asset('user/assets/images/15980049.png') }}"
                                alt="{{ $item->product_name }}" />
                        </figure>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Hot Products  -->


<div class="productCategory-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-main">Category</div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="category_tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($productsByCategory as $category => $products)
                        @php
                        $cat = \App\Models\Category::where('name', $category)->first(); // get category details
                        @endphp
                        <li class="nav-item " role="presentation">
                            <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ Str::slug($category) }}-tab" data-bs-toggle="tab"
                                data-bs-target="#{{ Str::slug($category) }}" type="button" role="tab"
                                aria-controls="{{ Str::slug($category) }}" aria-selected="false" tabindex="-1">{{
                                strtoupper($category) }}</button>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach ($productsByCategory as $category => $products)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ Str::slug($category) }}" role="tabpanel"
                            aria-labelledby="{{ Str::slug($category) }}-tab">
                            <div class="row">
                                @foreach ($products->take(6) as $product)
                                <div class="col-md-3">
                                    <div class="productCart-flex" data-product-id="{{ $product->id }}">
                                        @php
                                        $images = getProductImages($product->id);

                                        // Get discounted and original price using the helper function
                                        $price = getDiscountedPrice($product->id, $product->price);
                                        @endphp
                                        <figure>
                                            <img src="{{ isset($images[0]) ? asset('storage/' . $images[0]->file_path) : asset('user/assets/images/product-placeholder.png') }}" alt="">
                                        </figure>
                                        <div class="product-heading"><a href="{{ route('product_details', $product->id) }}">{{ \Illuminate\Support\Str::limit($product->name, 40, '..') }}</a></div>
                                        <div class="product-subtext">{{ $product->category_name }}</div>
                                        <div class="price-area">
                                            <div class="main-price">₹ {{ number_format($price, 2) }}<span>MRP ₹ {{ number_format($product->mrp, 2) }}</span></div>
                                            <div class="discount">{{ $product->discount_percentage }}%off</div>
                                        </div>
                                        <div class="cart-ctaflex">
                                            <div class="cart-plus-flex">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-subtract"
                                                            type="button">-</button>
                                                    </span>
                                                    <input type="text"
                                                        class="form-control no-padding text-center item-quantity"
                                                        value="1">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default btn-add" type="button">+</button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="cart-cta "><button class="text-white">Add to Cart</button></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="load-more">
                                        <div class="load-text load_more">
                                            Load More...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Why Printer -->
<div class="whyFlex">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="whyMainContent">
                    <span class="whySubtitle bg-primary-opacity">
                        Explore Printers
                    </span>
                    <h2 class="Whytitle">
                        "Top Printers for Every Need"
                    </h2>
                    <p>
                        Discover the best printers for home, office, and creative use. From inkjet to laser, explore
                        features, performance, and budget-friendly options.
                    </p>
                    <div class="why-cta">
                        <a href="#">Model Collection</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="whyImg">
                    <div class="why-dots">
                        <img src="{{asset('user/assets/images/dots.svg')}}" alt="" />
                    </div>
                    <div class="purple-circle">
                        <img src="{{asset('user/assets/images/purple-circle.svg')}}" alt="" />
                    </div>
                    <div class="why-girl-img">
                        <img src="{{asset('user/assets/images/why-img.png')}}" alt="" />
                    </div>
                    <div class="why-qutote">
                        <img src="{{asset('user/assets/images/light-printer.svg')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Why Printer  -->

<!-- Client -->
<div class="client-flex">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-main">Our Clients</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-one owl-carousel owl-theme">
                    @foreach ($logos as $logo)
                    <div class="item">
                        <figure><img src="{{asset('storage/' . $logo->image_path) }}" alt="{{ $logo->title }}" /></figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Client  -->
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        // Test if buttons are properly bound
        console.log('Document ready - checking for quantity buttons');
        console.log('Found add buttons:', $('.btn-add').length);
        console.log('Found subtract buttons:', $('.btn-subtract').length);
        console.log('Found quantity inputs:', $('.item-quantity').length);

        // Test function to verify quantity functionality
        function testQuantityFunctionality() {
            console.log('=== Testing Quantity Functionality ===');
            console.log('Add buttons:', $('.btn-add').length);
            console.log('Subtract buttons:', $('.btn-subtract').length);
            console.log('Quantity inputs:', $('.item-quantity').length);

            // Test if buttons are clickable
            $('.btn-add, .btn-subtract').each(function(index) {
                console.log('Button', index, ':', $(this).text(), 'classes:', $(this).attr('class'));
            });

            // Test if inputs are accessible
            $('.item-quantity').each(function(index) {
                console.log('Input', index, ':', $(this).val(), 'classes:', $(this).attr('class'));
            });
        }

        // Run test after a short delay
        setTimeout(testQuantityFunctionality, 1000);

        $('.load_more').click(function () {
            let offset = $(this).data('page');
            $(this).text("Loading Products...").prop('disabled', true);
            let category = $('#category-tab a.active').data('category');
            $.ajax({
                url: "{{ route('load.more.products') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    offset: offset,
                    category: category
                },
                success: function (response) {
                    if (response.moreProducts) {
                        $('#product-list-' + category).append(response.products);
                        $('.result_text span').text(1 + ' to ' + (offset + response.count));
                        $('.load_more').text('Load More').prop('disabled', false).data(
                            'page', offset + 3);
                    } else {
                        $('.load_more').text("No More Products").prop('disabled', true);
                    }
                }
            });
        });

        // Add to Cart functionality for dashboard products
        $(document).on('click', '.cart-cta button', function(e) {
            e.preventDefault();

            var $button = $(this);
            var productCard = $button.closest('.productCart-flex');
            var productId = productCard.data('product-id');
            var quantity = productCard.find('.item-quantity').val() || 1;

            // Debug logging
            console.log('Cart button clicked:', {
                productId: productId,
                quantity: quantity,
                button: $button[0]
            });

            // Validate product ID
            if (!productId) {
                showCartMessage('Product ID not found. Please refresh the page and try again.', 'error');
                return;
            }

            // Validate CSRF token
            var csrfToken = "{{ csrf_token() }}";
            if (!csrfToken) {
                showCartMessage('Security token missing. Please refresh the page and try again.', 'error');
                return;
            }

            // Check if user is logged in
            @guest('customer')
                window.location.href = "{{ route('user-login') }}";
                return;
            @endguest

            // Disable button and show loading state
            $button.prop('disabled', true);
            var originalContent = $button.html();
            $button.html('<span class="loading-spinner">⏳</span> Adding...');

            $.ajax({
                type: 'POST',
                url: "{{ route('add-to-cart', ':id') }}".replace(':id', productId),
                data: {
                    _token: csrfToken,
                    quantity: quantity
                },
                success: function(response) {
                    console.log('Cart response:', response);
                    if (response.status === 'success') {
                        // Show success message
                        showCartMessage('Product added to cart successfully!', 'success');

                        // Update cart count in header
                        $('.cartNo').text(response.cart_count);
                        $('.btn_badge').text(response.cart_count);

                        // Reset quantity to 1
                        productCard.find('.item-quantity').val(1);

                        // Add success animation
                        $button.html('<span class="success-icon">✓</span> Added!');
                        setTimeout(function() {
                            $button.html(originalContent);
                            $button.prop('disabled', false);
                        }, 1000);
                    } else {
                        showCartMessage(response.message || 'Failed to add product to cart.', 'error');
                        $button.html(originalContent);
                        $button.prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Cart error:', {xhr: xhr, status: status, error: error});
                    if (xhr.status === 401) {
                        // User not logged in
                        window.location.href = "{{ route('user-login') }}";
                    } else if (xhr.status === 404) {
                        showCartMessage('Product not found.', 'error');
                    } else {
                        showCartMessage('Failed to add product to cart. Please try again.', 'error');
                    }
                    $button.html(originalContent);
                    $button.prop('disabled', false);
                }
            });
        });

        // Enhanced Quantity increment/decrement functionality
        $(document).on('click', '.btn-add', function() {
            var $button = $(this);

            console.log('Add button clicked');

            // Prevent rapid clicking
            if ($button.hasClass('btn-disabled')) return;
            $button.addClass('btn-disabled');

            // Find the quantity input within the same input-group
            var $input = $button.closest('.input-group').find('.item-quantity');

            // Fallback: if input not found, try alternative selectors
            if ($input.length === 0) {
                $input = $button.parent().siblings('.item-quantity');
                console.log('Fallback input search:', $input.length);
            }

            var currentVal = parseInt($input.val()) || 1;
            console.log(currentVal,'currentVal');
            var newVal = currentVal + 1;

            console.log('Current value:', currentVal, 'New value:', newVal);

            // Add visual feedback
            $button.addClass('btn-clicked');
            setTimeout(function() {
                $button.removeClass('btn-clicked');
            }, 150);

            $input.val(newVal).trigger('change');

            // Show quantity change feedback
            showQuantityFeedback($input, 'increased');

            // Re-enable button after 300ms
            setTimeout(function() {
                $button.removeClass('btn-disabled');
            }, 300);
        });

        $(document).on('click', '.btn-subtract', function() {
            var $button = $(this);

            console.log('Subtract button clicked');

            // Prevent rapid clicking
            if ($button.hasClass('btn-disabled')) return;
            $button.addClass('btn-disabled');

            // Find the quantity input within the same input-group
            var $input = $button.closest('.input-group').find('.item-quantity');
            console.log('Found input:', $input.length, $input.val());

            // Fallback: if input not found, try alternative selectors
            if ($input.length === 0) {
                $input = $button.parent().siblings('.item-quantity');
                console.log('Fallback input search:', $input.length);
            }

            var currentVal = parseInt($input.val()) || 1;

            if (currentVal > 1) {
                var newVal = currentVal - 1;

                console.log('Current value:', currentVal, 'New value:', newVal);

                // Add visual feedback
                $button.addClass('btn-clicked');
                setTimeout(function() {
                    $button.removeClass('btn-clicked');
                }, 150);

                $input.val(newVal).trigger('change');

                // Show quantity change feedback
                showQuantityFeedback($input, 'decreased');
            } else {
                // Show minimum quantity warning
                showQuantityFeedback($input, 'minimum');
            }

            // Re-enable button after 300ms
            setTimeout(function() {
                $button.removeClass('btn-disabled');
            }, 300);
        });

        // Keyboard support for quantity input
        $(document).on('keydown', '.item-quantity', function(e) {
            var $input = $(this);
            var currentVal = parseInt($input.val()) || 1;

            if (e.key === 'ArrowUp' || e.key === '+') {
                e.preventDefault();
                $input.val(currentVal + 1).trigger('change');
                showQuantityFeedback($input, 'increased');
            } else if (e.key === 'ArrowDown' || e.key === '-') {
                e.preventDefault();
                if (currentVal > 1) {
                    $input.val(currentVal - 1).trigger('change');
                    showQuantityFeedback($input, 'decreased');
                } else {
                    showQuantityFeedback($input, 'minimum');
                }
            }
        });

        // Enhanced quantity input validation
        $(document).on('input', '.item-quantity', function() {
            var $input = $(this);
            var value = parseInt($input.val());

            if (isNaN(value) || value < 1) {
                $input.val(1);
                showQuantityFeedback($input, 'reset');
            } else if (value > 99) {
                $input.val(99);
                showQuantityFeedback($input, 'maximum');
            }
        });

        // Function to show quantity change feedback
        function showQuantityFeedback($input, action) {
            {{--  var $feedback = $input.siblings('.quantity-feedback');
            if ($feedback.length === 0) {
                $feedback = $('<div class="quantity-feedback"></div>');
                $input.parent().append($feedback);
            }

            var message = '';
            var className = '';

            switch(action) {
                case 'increased':
                    message = 'Quantity increased';
                    className = 'feedback-success';
                    break;
                case 'decreased':
                    message = 'Quantity decreased';
                    className = 'feedback-info';
                    break;
                case 'minimum':
                    message = 'Minimum quantity is 1';
                    className = 'feedback-warning';
                    break;
                case 'maximum':
                    message = 'Maximum quantity is 99';
                    className = 'feedback-warning';
                    break;
                case 'reset':
                    message = 'Quantity reset to 1';
                    className = 'feedback-info';
                    break;
            }

            $feedback.text(message).removeClass().addClass('quantity-feedback ' + className);

            // Auto hide feedback after 1.5 seconds
            setTimeout(function() {
                $feedback.fadeOut(function() {
                    $(this).remove();
                });
            }, 1500);  --}}
        }

        // Function to show cart messages
        function showCartMessage(message, type) {
            var alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            var messageHtml = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                message +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>';

            // Remove any existing cart messages
            $('.cart-message').remove();

            // Add message to the top of the page
            $('body').prepend('<div class="cart-message" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">' + messageHtml + '</div>');

            // Auto remove after 3 seconds
            setTimeout(function() {
                $('.cart-message').fadeOut(function() {
                    $(this).remove();
                });
            }, 3000);
        }

        // // Simple direct quantity controls (fallback method)
        // $(document).on('click', '.btn-add, .btn-subtract', function(e) {
        //     e.preventDefault();
        //     e.stopPropagation();

        //     var $button = $(this);
        //     var isAdd = $button.hasClass('btn-add');

        //     console.log('Button clicked:', isAdd ? 'ADD' : 'SUBTRACT');

        //     // Find the input field - try multiple approaches
        //     var $input = null;

        //     // Method 1: Look within the same input-group
        //     $input = $button.closest('.input-group').find('.item-quantity');
        //     console.log('Method 1 - Input found:', $input.length);

        //     // Method 2: Look for input in the same container
        //     if (!$input.length) {
        //         $input = $button.closest('.cart-plus-flex').find('.item-quantity');
        //         console.log('Method 2 - Input found:', $input.length);
        //     }

        //     // Method 3: Look in the same product card
        //     if (!$input.length) {
        //         $input = $button.closest('.productCart-flex').find('.item-quantity');
        //         console.log('Method 3 - Input found:', $input.length);
        //     }

        //     // Method 4: Look for any item-quantity input
        //     if (!$input.length) {
        //         $input = $('.item-quantity').first();
        //         console.log('Method 4 - Input found:', $input.length);
        //     }

        //     if (!$input.length) {
        //         console.error('No quantity input found!');
        //         return;
        //     }

        //     var currentVal = parseInt($input.val()) || 1;
        //     var newVal;

        //     if (isAdd) {
        //         newVal = currentVal + 1;
        //         console.log('Increasing quantity from', currentVal, 'to', newVal);
        //     } else {
        //         newVal = Math.max(1, currentVal - 1);
        //         console.log('Decreasing quantity from', currentVal, 'to', newVal);
        //     }

        //     // Update the input value
        //     $input.val(newVal);
        //     console.log('Input value updated to:', $input.val());

        //     // Add visual feedback
        //     $button.addClass('btn-clicked');
        //     setTimeout(function() {
        //         $button.removeClass('btn-clicked');
        //     }, 150);

        //     // Show feedback message
        //     var message = isAdd ? 'Quantity increased' : 'Quantity decreased';
        //     showQuantityFeedback($input, isAdd ? 'increased' : 'decreased');
        // });
    });
</script>
@endsection
