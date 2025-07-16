<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
<!-- main body - start ================================================== -->
<style>

    .breadcrumb_section {
    background-position: top;
}
.minimal_breadcrumb {
}
</style>
    <main>

        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section minimal_breadcrumb d-flex align-items-end clearfix p-0" style="background-color: #eeeeee">
            <div class="container maxw_1430">
                <h1 class="minimal_page_title mb_15">Shop Page</h1>
                <div class="f2_breadcrumb_nav_wrap mt-0">
                    <ul class="ce_breadcrumb_nav ul_li clearfix">
                        <li><a href="#!">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- breadcrumb_section - end
        ================================================== -->


        <!-- product_section - start
        ================================================== -->
        <section class="product_section sec_ptb_100 clearfix">
            <div class="container">
                <div class="carparts_filetr_bar">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 col-md-6">
                            <h4 class="result_text">Showing <span>1 to 6</span> of {{$total_products }} total</h4>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="option_select d-flex align-items-center mb-0">
                                <span class="option_title text-uppercase">Sort by:</span>
                                <select style="display: none;">
                                    <option data-display="Select Your Option">Nothing</option>
                                    <option value="1" selected=""> Name</option>
                                    <option value="2">Another option</option>
                                    <option value="3" disabled="">A disabled option</option>
                                    <option value="4">Potato</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb_50 justify-content-center">
                    <div class="row mb_50 justify-content-center" id="product-list">
                        @include('user.product-list', ['products' => $products])
                    </div>
                </div>

                <div class="load_more text-center clearfix">
                    <button id="load-more" class="custom_btn bg_modern_red text-uppercase" data-page="6">Load More</button>
                </div>
            </div>
        </section>
        <!-- product_section - end
        ================================================== -->


    </main>
    <!-- main body - end
    ================================================== -->

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


    });
</script>
<script>
    $(document).ready(function() {
        $('#load-more').click(function() {
            let $button = $(this);
            let offset = $(this).data('page');
            $button.text("Loading Products...").prop('disabled', true);
            let name = $('#filter-name').val();
            let price = $('#filter-price').val();
            $.ajax({
                url: "{{ route('loadMore') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    offset: offset,
                    name: name,
                    price: price
                },
                beforeSend: function() {
                },
                success: function(response) {
                    if(response.moreProducts) {
                        $('#product-list').append(response.products);
                        $('.result_text span').text( 1 +' to '+ (offset + response.count));
                        $('#load-more').text('Load More').prop('disabled', false).data('page', offset + 3);
                    } else {
                        $('#load-more').text("No More Products").prop('disabled', true);
                    }
                }
            });
        });

        $('#apply-filters').click(function() {
            $('#product-list').html('');
            $('#load-more').data('offset', 0).prop('disabled', false).text('Load More').click();
        });
    });
    </script>
@endsection
