<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="display: inline-block;"><?php echo (isset($title)) ? $title : ''; ?></h5>
            <table class="table text-center mb_50">
                <thead class="text-uppercase text-uppercase">
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order['items'] as $item)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="item_image">
                                        @php
                                            $images = getProductImages($item['product']['id']);
                                        @endphp
                                        <img src="{{ !empty($images[0]) ? asset('storage/'.$images[0]->file_path) : asset('user/assets/images/15980049.png') }}" width="100px" alt="image_not_found">
                                    </div>
                                    <div class="item_content">
                                        <h4 class="item_title mb-0">{{$item['product']['name']}}</h4>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="price_text">${{$item['price']}}</span>
                            </td>
                            <td>
                                <span class="quantity_text">{{$item['quantity']}}</span>
                            </td>
                            <td><span class="total_price">${{$item['price'] * $item['quantity']}}</span></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-left">
                            <span class="subtotal_text">TOTAL</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="total_price">${{$order['subtotal']}}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
