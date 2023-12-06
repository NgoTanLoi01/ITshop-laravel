<header class="header header-intro-clearance header-3">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i
                        class="icon-phone"></i>{{ getConfigValueFromSettingTable('Phone_contact') }}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div><!-- End .header-left -->
            <div class="header-left">
                <a href="tel:#"><i class="icon-envelope"></i>{{ getConfigValueFromSettingTable('Email') }}</a>
            </div><!-- End .header-left -->
            <div class="header-right">
                <ul class="top-menu">
                    <li>

                        <ul>
                            <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="" class="logo" style="text-align: center; display: block;">
                    <img src="{{ asset('UserLTE/assets/images/demos/demo-3/Logo.jpg') }}" alt="Molla Logo"
                        width="50" height="10 " style="border-radius: 50%; margin: 0 auto;">
                    <p style="margin: 0;">NGO TAN LOI</p>
                    <p>Digital Technologies</p>
                </a>

            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q"
                                placeholder="Tìm kiếm sản phẩm ..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">

                <div class="wishlist">
                    <a href="wishlist.html">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge">3</span>
                        </div>
                        <p>Danh sách yêu thích</p>
                    </a>
                </div><!-- End .compare-dropdown -->

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{ $cart->getTotalQuantity() }}</span>
                        </div>
                        <p>Giỏ hàng</p>
                    </a>

                    @foreach ($cart->list() as $key => $value)
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="#">{{ $value['name'] }}</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">{{$value['quantity']}} x</span>
                                            {{number_format($value['price'])}} VNĐ
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="#" class="product-image">
                                            <img src="{{ config('app.base_url') .$value['image']}}" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="Remove Product"><i
                                            class="icon-close"></i></a>
                                </div><!-- End .product -->
                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Tổng tiền</span>

                                <span class="cart-total-price">{{ number_format($value['price'] * $value['quantity']) }} VNĐ</span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{ route('cart.index') }}" class="btn btn-primary">Xem</a>
                                <a href="{{ route('cart.index') }}" class="btn btn-outline-primary-2"><span>Thanh
                                        toán</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    @endforeach

                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            @include('components/siderbar')

            @include('components/main_menu')

            <div class="header-right">
                <i class="la la-lightbulb-o"></i>
                <p>Khai trương<span class="highlight">&nbsp;<span style="color: red; font-size: 20px">SỐC</span> không
                        giảm giá!</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
