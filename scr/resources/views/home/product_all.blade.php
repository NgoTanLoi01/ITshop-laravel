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
    <div class="main">
        <div class="intro-section pt-3 pb-3 mb-2">
            <div class="container">
                <div class="row">
                    <form action="{{ url('/product_all') }}" method="get">
                        <div class="mb-3">
                            <label>Mức giá:</label>
                            <div>
                                <label>
                                    <input type="radio" name="price_range" value="0-3000000"
                                        {{ request('price_range') == '0-3000000' ? 'checked' : '' }}>
                                    Dưới 3 triệu
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="radio" name="price_range" value="3000000-8000000"
                                        {{ request('price_range') == '3000000-8000000' ? 'checked' : '' }}>
                                    Từ 3 đến 8 triệu
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="radio" name="price_range" value="8000000-15000000"
                                        {{ request('price_range') == '8000000-15000000' ? 'checked' : '' }}>
                                    Từ 8 đến 15 triệu
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="radio" name="price_range" value="15000000-100000000"
                                        {{ request('price_range') == '15000000-100000000' ? 'checked' : '' }}>
                                    Trên 15 triệu
                                </label>
                            </div>
                            <!-- Thêm các khoảng giá khác tương tự cần thiết -->
                        </div>
                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </form>
                    <div class="col-lg-9">
                        <div class="products">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-4">
                                        <div class="product product-2">
                                            <figure class="product-media">
                                                <a href="{{ route('detail', $product->slug) }}">
                                                    <img src="{{ config('app.base_url') . $product->feature_image_path }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="{{ route('detail', $product->slug) }}">
                                                        {{ $product->name }}</a>
                                                </h3>
                                                <!-- End .product-title -->
                                                <div class="product-price">
                                                    <span class="old-price">Gốc: <del>{{ number_format($product->price) }}
                                                            VNĐ </del></span>
                                                    <span class="new-price">{{ number_format($product->sale_price) }}
                                                        VNĐ</span>
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 -->
                                @endforeach
                            </div><!-- End .row -->

                            {{-- <div class="col-md-12">
                                <div class="d-flex justify-content-center">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </div>
                            </div> --}}
                        </div><!-- End .products -->
                    </div><!-- End .col-lg-9 -->
                </div>
            </div>
        </div>
    </div>
@endsection
