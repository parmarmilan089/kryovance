<!-- Extends template page-->
@extends('user.layout.header')

<!-- Specify content -->
@section('content')

<!-- slider_section - start -->






@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.load_more').click(function() {
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
                success: function(response) {
                    if(response.moreProducts) {
                        $('#product-list-'+category).append(response.products);
                        $('.result_text span').text( 1 +' to '+ (offset + response.count));
                        $('.load_more').text('Load More').prop('disabled', false).data('page', offset + 3);
                    } else {
                        $('.load_more').text("No More Products").prop('disabled', true);
                    }
                }
            });
        });
    });
    </script>
@endsection