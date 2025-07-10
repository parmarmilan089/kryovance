@foreach($products as $product)


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
                <div class="cart-cta"><button><img src="{{asset('user/assets/images/cart-icon-w.svg')}}"
                            alt=""></button></div>
            </div>
        </div>
    </div>
@endforeach
<!-- product quick view - start -->
<div class="quickview_modal modal fade" id="quickview_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content clearfix">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="item_image">
                <img src="user/assets/images/shop/fashion_minimal/img_07.jpg" alt="image_not_found">
            </div>
            <div class="item_content">
                <h2 class="item_title mb_15">Digital Infrared Thermometer</h2>
                <div class="rating_star mb_30 clearfix">
                    <ul class="float-left ul_li mr-2">
                        <li class="active"><i class="las la-star"></i></li>
                        <li class="active"><i class="las la-star"></i></li>
                        <li class="active"><i class="las la-star"></i></li>
                        <li class="active"><i class="las la-star"></i></li>
                        <li><i class="las la-star"></i></li>
                    </ul>
                    <span class="review_text">(12 Reviews)</span>
                </div>
                <span class="item_price mb_15">$49.50</span>
                <p class="mb_30">
                    Best Electronic Digital Thermometer adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse us ultrices gravidaes.
                </p>
                <div class="quantity_form mb_30 clearfix">
                    <strong class="list_title">Quantity:</strong>
                    <div class="quantity_input">
                        <form action="#">
                            <span class="input_number_decrement">–</span>
                            <input class="input_number" type="text" value="1">
                            <span class="input_number_increment">+</span>
                        </form>
                    </div>
                </div>
                <ul class="btns_group ul_li mb_30 clearfix">
                    <li><a href="#!" class="custom_btn bg_carparts_red">Add to Cart</a></li>
                    <li><a href="#!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare Product"><i class="fal fa-sync"></i></a></li>
                    <li><a href="#!" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Wishlist"><i class="fal fa-heart"></i></a></li>
                </ul>
                <ul class="info_list ul_li_block clearfix">
                    <li><strong class="list_title">Category:</strong> <a href="#!">Medical Equipment</a></li>
                    <li class="social_icon">
                        <strong class="list_title">Share:</strong>
                        <ul class="ul_li clearfix">
                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
