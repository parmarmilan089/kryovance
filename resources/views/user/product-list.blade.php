@foreach($products as $product)
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="minimal_product_item">
            <div class="tab-content">
                @php
                    $images = getProductImages($product->id);
                @endphp
                <div id="ptab1_1" class="tab-pane product-img active">
                    <img src="{{ isset($images[0]) ? asset('storage/'.$images[0]->file_path) : asset('user/assets/images/15980049.png') }}" alt="image_not_found">
                </div>
            </div>
            <div class="item_content">
                <h3 class="item_title">
                    <a href="{{route('product_details',$product->id)}}">{{ \Illuminate\Support\Str::limit($product->name, 40, '..') }}</a>
                </h3>
                <span class="item_category">{{$product->category_name}}</span>
                <span class="item_price">₹ {{$product->price}}</span>
        </div>
            <ul class="product_label ul_li clearfix">
                <li class="bg_black">New</li>
            </ul>
            {{--  <ul class="product_action_btns ul_li_block clearfix">
                <li><a class="tooltips" data-placement="right" title="Add To Wishlist" href="#!"><i class="fal fa-heart"></i></a></li>
                <li><a class="tooltips" data-placement="right" title="Add To Cart" href="#!"><i class="fal fa-shopping-basket"></i></a></li>
                <li><a class="tooltips" data-placement="right" title="Quick View" href="#!" data-toggle="modal" data-target="#quickview_modal"><i class="fal fa-search"></i></a></li>
            </ul>  --}}
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
