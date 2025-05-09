<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')
<!-- main body - start
    ================================================== -->

<style>

    .breadcrumb_section {
    background-position: top;
}
.minimal_breadcrumb {
    min-height: 450px;
    padding-bottom: 50px;
}
</style>
    <main>

        <!-- breadcrumb_section - start
        ================================================== -->
        <section class="breadcrumb_section minimal_breadcrumb d-flex align-items-end clearfix" data-background="{{asset('user/assets/images/slider/modern_minimal/bg_02.jpg')}}">
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
