@extends('layouts.master')
@section('title')
    <title>NGO TAN LOI</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
    
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Giỏ hàng<span>Cửa hàng</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li> --}}
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($cart->list() as $key => $value)  
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    {{-- {{ config('app.base_url') . $productsSellingItem->feature_image_path }} --}}
                                                    <img src="{{ config('app.base_url') .$value['image']}}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{ $value['name'] }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{number_format($value['price'])}} VNĐ</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control" value="{{$value['quantity']}}" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">{{ number_format($value['price'] * $value['quantity']) }} VNĐ</td>
                                    <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            {{-- <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount --> --}}

                            <a href="#" class="btn btn-outline-dark-2"><span>Cập nhật giỏ hàng</span><i class="icon-refresh"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Tổng số giỏ hàng</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Tổng tiền sản phẩm:</td>
                                        <td>{{number_format($cart->getTotalPrice())}} VNĐ</td>
                                    </tr><!-- End .summary-subtotal -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Miễn phí vận chuyển</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>0 VNĐ</td>
                                    </tr><!-- End .summary-shipping-row -->
                                    <tr class="summary-total">
                                        <td>Tổng tiền phải trả:</td>
                                        <td>{{number_format($cart->getTotalPrice())}} VNĐ</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">THANH TOÁN</a>
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection