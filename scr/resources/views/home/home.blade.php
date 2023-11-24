@extends('layouts.master')
@section('title')
<title>NGO TAN LOI</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/hPome.css') }}">
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')


<main class="main">
    <div class="intro-section pt-3 pb-3 mb-2">
        <div class="container">
            <div class="row">
                {{-- Slider --}}
                @include('home.components.slider')
                {{-- Slider --}}
                <div class="col-lg-4">
                    <div class="intro-banners">
                        <div class="banner mb-lg-1 mb-xl-2">
                            <a href="#">
                                <img src="UserLTE/assets/images/demos/demo-3/banners/banner-1.jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">Top Product</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title"><a href="#">Edifier <br>Stereo Bluetooth</a></h3><!-- End .banner-title -->
                                <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->

                        <div class="banner mb-lg-1 mb-xl-2">
                            <a href="#">
                                <img src="UserLTE/assets/images/demos/demo-3/banners/banner-2.jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">Clearance</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title"><a href="#">GoPro - Fusion 360 <span>Save $70</span></a></h3><!-- End .banner-title -->
                                <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->

                        <div class="banner mb-0">
                            <a href="#">
                                <img src="UserLTE/assets/images/demos/demo-3/banners/banner-3.jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle d-lg-none d-xl-block"><a href="#">Featured</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title"><a href="#">Apple Watch 4 <span>Our Hottest Deals</span></a></h3><!-- End .banner-title -->
                                <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .intro-banners -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .intro-section -->

    <!-- feature_product-->
        @include('home.components.feature_product')
    <!-- feature_product-->

    </div><!-- End .container -->

    <div class="mb-7 mb-lg-11"></div><!-- End .mb-7 -->

    <div class="bg-light deal-container pt-7 pb-7 mb-5">
        <div class="container">
            <div class="heading text-center mb-4">
                <h2 class="title">Ưu đãi</h2><!-- End .title -->
                <p class="title-desc">Ưu đã hôm nay và hơn thế</p><!-- End .title-desc -->
            </div><!-- End .heading -->

            <div class="row">
                <div class="col-lg-6 deal-col">
                    <div class="deal" style="background-image: url('UserLTE/assets/images/demos/demo-3/deal/bg-1.jpg');">
                        <div class="deal-top">
                            <h2>Ưu đãi trong ngày</h2>
                            <h4>Số lượng hạn chế </h4>
                        </div><!-- End .deal-top -->

                        <div class="deal-content">
                            <h3 class="product-title"><a href="product.html">Loa thông minh tại nhà có Google Assistant</a></h3><!-- End .product-title -->

                            <div class="product-price">
                                <span class="new-price">2,900,000 VNĐ</span>
                                <span class="old-price">Giá gốc 3,900,000 VNĐ</span>
                            </div><!-- End .product-price -->

                            <a href="#" class="btn btn-link"><span>Mua ngay</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .deal-content -->

                        <div class="deal-bottom">
                            <div class="deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->
                        </div><!-- End .deal-bottom -->
                    </div><!-- End .deal -->
                </div><!-- End .col-lg-6 -->
                <div class="col-lg-6">
                    <div class="products">
                        <div class="row">
                            <div class="col-6">
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-top">Top</span>
                                        <span class="product-label label-circle label-sale">Sale</span>
                                        <a href="product.html">
                                            <img src="UserLTE/assets/images/demos/demo-3/products/product-5.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Digital Cameras</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Canon - EOS 5D Mark IV DSLR  Camera</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">$3,599.99</span>
                                            <span class="old-price">Was $3,999.99</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 5 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->
                            
                            <div class="col-6">
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <span class="product-label label-circle label-sale">Sale</span>
                                        <a href="product.html">
                                            <img src="UserLTE/assets/images/demos/demo-3/products/product-6.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                        </div><!-- End .product-action -->

                                        <div class="product-action product-action-dark">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Computers & Tablets</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Apple - Smart Keyboard Folio  for 11-inch iPad Pro</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">$179.00</span>
                                            <span class="old-price">Was $200.99</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <div class="more-container text-center mt-3 mb-0">
                <a href="#" class="btn btn-outline-dark-2 btn-round btn-more"><span>Ưu đãi thêm</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .more-container -->
        </div><!-- End .container -->
    </div><!-- End .deal-container -->

    <div class="container">
        <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": false,
                    "margin": 30,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        }
                    }
                }'>
                <a href="#" class="brand">
                    <img src="UserLTE/assets/images/brands/1.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="UserLTE/assets/images/brands/2.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="UserLTE/assets/images/brands/3.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="UserLTE/assets/images/brands/4.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="UserLTE/assets/images/brands/5.png" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="UserLTE/assets/images/brands/6.png" alt="Brand Name">
                </a>
            </div><!-- End .owl-carousel -->
    </div><!-- End .container -->

    <div class="container">
        <hr class="mt-3 mb-6">
    </div><!-- End .container -->

    {{-- Trending product --}}
        @include('home.components.category_tab')
    {{-- Trending product --}}

    <div class="container">
        <hr class="mt-5 mb-6">
    </div><!-- End .container -->


    {{-- Selling products --}}
        @include('home.components.selling_product')
    {{-- Selling products --}}

    <div class="container">
        <hr class="mt-5 mb-0">
    </div><!-- End .container -->

    <div class="icon-boxes-container mt-2 mb-2 bg-transparent">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Miễn phí vận chuyển</h3><!-- End .icon-box-title -->
                            <p>Từ 1,000,000 VNĐ</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">1 đổi 1</h3><!-- End .icon-box-title -->
                            <p>Trong vòng 7 - 30 ngày</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Giảm  10%</h3><!-- End .icon-box-title -->
                            <p>đơn hàng đầu tiên</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Hỗ trợ dịch vụ</h3><!-- End .icon-box-title -->
                            <p>24/7</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->

    <div class="container">
        <div class="cta cta-separator cta-border-image cta-half mb-0" style="background-image: url(UserLTE/assets/images/demos/demo-3/bg-2.jpg);">
            <div class="cta-border-wrapper bg-white">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta-wrapper cta-text text-center">
                            <h3 class="cta-title">NGO TAN LOI <br> Digital Technologies</h3><!-- End .cta-title -->
                            <p class="cta-desc">Mọi ý kiến đóng góp xin gửi về.</p><!-- End .cta-desc -->
                    
                            <div class="social-icons social-icons-colored justify-content-center">
                                <a href="" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                <a href="" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                <a href="" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            </div><!-- End .soial-icons -->
                        </div><!-- End .cta-wrapper -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="cta-wrapper text-center">
                            <h3 class="cta-title">Hoặc gửi đến </h3><!-- End .cta-title -->
                            <p class="cta-desc"> <br>địa chỉ Email <span class="text-primary">ngotanloidt@gmail.com</p><!-- End .cta-desc -->
                            <form action="#">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="nhập email của bạn" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-rounded" type="submit"><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .cta-wrapper -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .bg-white -->
        </div><!-- End .cta -->
    </div><!-- End .container -->
</main><!-- End .main -->



@endsection

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            
            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>


            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <div class="container newsletter-popup-container mfp-hide">
        <div class="row justify-content-center">
            <div class="col-10">
                {{-- <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="UserLTE/assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="UserLTE/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

