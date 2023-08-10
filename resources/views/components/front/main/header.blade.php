<!-- Header start  -->
<header class="gi-header">
    <!-- Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row align-itegi-center">
                <!-- Header Top social Start -->
                <div class="col text-left header-top-left d-lg-block">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="fi fi-rr-phone-call"></i></a>+91 987 654 3210
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)"><i class="fi fi-brands-whatsapp"></i></a>+91 987 654
                                3210
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top social End -->
                <!-- Header Top Message Start -->
                <div class="col text-center header-top-center">
                    <div class="header-top-message">
                        World's Fastest Online Shopping Destination
                    </div>
                </div>
                <!-- Header Top Message End -->
                <!-- Header Top Language Currency -->
                <div class="col header-top-right d-none d-lg-block">
                    <div class="header-top-right-inner d-flex justify-content-end">
                        <!-- Language Start -->
                        <div class="header-top-lan-curr header-top-lan dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown">English
                                <i class="fi-rr-angle-small-down" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Italiano</a></li>
                            </ul>
                        </div>
                        <!-- Language End -->
                    </div>
                </div>
                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col header-top-res d-lg-none">
                    <div class="gi-header-bottons">
                        <div class="right-icons">
                            <!-- Header User Start -->
                            <a href="login.html" class="gi-header-btn gi-header-user">
                                <div class="header-icon"><i class="fi-rr-user"></i></div>
                            </a>
                            <!-- Header User End -->
                            <!-- Header Wishlist Start -->
                            <a href="wishlist.html" class="gi-header-btn gi-wish-toggle">
                                <div class="header-icon"><i class="fi-rr-heart"></i></div>
                                <span class="gi-header-count gi-wishlist-count">3</span>
                            </a>
                            <!-- Header Wishlist End -->
                            <!-- Header Cart Start -->
                            <a href="javascript:void(0)" class="gi-header-btn gi-cart-toggle">
                                <div class="header-icon">
                                    <i class="fi-rr-shopping-bag"></i>
                                    <span class="main-label-note-new"></span>
                                </div>
                                <span class="gi-header-count gi-cart-count">5</span>
                            </a>
                            <!-- Header Cart End -->
                            <!-- Header menu Start -->
                            <a href="javascript:void(0)" class="gi-header-btn gi-site-menu-icon d-lg-none">
                                <i class="fi-rr-menu-burger"></i>
                            </a>
                            <!-- Header menu End -->
                        </div>
                    </div>
                </div>
                <!-- Header Top responsive Action -->
            </div>
        </div>
    </div>
    <!-- Header Top  End -->

    <!-- Header Bottom  Start -->
    <div class="gi-header-bottom d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="gi-flex">
                    <!-- Header Logo Start -->
                    <div class="align-self-center gi-header-logo">
                        <div class="header-logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Site Logo"></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->
                    <!-- Header Search Start -->
                    <div class="align-self-center gi-header-search">
                        <div class="header-search">
                            <form class="gi-search-group-form" action="#">
                                <input class="form-control gi-search-bar" placeholder="Search Products..."
                                       type="text">
                                <button class="search_submit" type="submit"><i class="fi-rr-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Header Search End -->
                    <!-- Header Button Start -->
                    <div class="gi-header-action align-self-center">
                        <div class="gi-header-bottons">
                            <!-- Header User Start -->
                            <div class="gi-acc-drop">
                                <a href="javascript:void(0)"
                                   class="gi-header-btn gi-header-user dropdown-toggle gi-user-toggle"
                                   title="Account">
                                    <div class="header-icon">
                                        <i class="fi-rr-user"></i>
                                    </div>
                                    <div class="gi-btn-desc">
                                        @if(Auth::user())
                                            <span class="gi-btn-title">Account</span>
                                            <span class="gi-btn-stitle">{{ Auth::user()->name }}</span>
                                        @else
                                            <span class="gi-btn-stitle">Login</span>
                                        @endif
                                    </div>
                                </a>
                                <ul class="gi-dropdown-menu">
                                    @if(Auth::user())
                                        <li><a class="dropdown-item" href="{{ route('checkout') }}">Checkout</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header wishlist Start -->
                            <a href="{{ route('wishlist.index') }}" class="gi-header-btn gi-wish-toggle" title="Wishlist">
                                <div class="header-icon">
                                    <i class="fi-rr-heart"></i>
                                </div>
                                <div class="gi-btn-desc">
                                    <span class="gi-btn-title">Wishlist</span>
                                    @if (\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count() > 0)
                                    <span class="gi-btn-stitle"><b class="gi-wishlist-count">
                                            {{ \Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content()->count() }}
                                        </b>-items</span>
                                    @endif
                                </div>
                            </a>
                            <!-- Header wishlist End -->
                            <!-- Header Cart Start -->
                            <a href="javascript:void(0)" class="gi-header-btn gi-cart-toggle" title="Cart">
                                <div class="header-icon">
                                    <i class="fi-rr-shopping-bag"></i>
                                    <span class="main-label-note-new"></span>
                                </div>
                                <div class="gi-btn-desc">
                                    <span class="gi-btn-title">Cart</span>
                                    @if (\Gloudemans\Shoppingcart\Facades\Cart::instance('cart')->count() > 0)
                                        <span class="gi-btn-stitle">
                                            <b class="gi-cart-count">
                                               {{ \Gloudemans\Shoppingcart\Facades\Cart::instance('cart')->content()->count() }}
                                            </b>-items</span>

                                    @endif
                                </div>
                            </a>
                            <!-- Header Cart End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Button End -->

    <!-- Header menu -->
    <div class="gi-header-cat d-none d-lg-block">
        <div class="container position-relative">
            <div class="gi-nav-bar">
                <!-- Category Toggle -->
                <div class="gi-category-icon-block">
                    <div class="gi-category-menu">
                        <div class="gi-category-toggle">
                            <i class="fi fi-rr-apps"></i>
                            <span class="text">All Categories</span>
                            <i class="fi-rr-angle-small-down d-1199 gi-angle" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="gi-cat-dropdown">
                        <div class="gi-cat-block">
                            <div class="gi-cat-tab">
                                <div class="col">
                                    <ul class="cat-list">
                                        @foreach(\App\Models\Category::all() as $category)
                                            <li class="p-1">
                                                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Menu Start -->
                <div id="gi-main-menu-desk" class="d-none d-lg-block sticky-nav">
                    <div class="nav-desk">
                        <div class="row">
                            <div class="col-md-12 align-self-center">
                                <div class="gi-main-menu">
                                    <ul>
                                        <li class="dropdown drop-list">
                                            <a href="{{ route('home') }}" class="dropdown-arrow">Home</a>
                                        </li>
                                        <li class="dropdown drop-list position-static">
                                            <a href="{{ route('categories.index') }}" class="dropdown-arrow">Categories</a>
                                        </li>
                                        <li class="dropdown drop-list">
                                            <a href="{{ route('products.index') }}" class="dropdown-arrow">Shop</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Menu End -->
            </div>
        </div>
    </div>
    <!-- Header menu End -->

    <!-- Mobile Menu sidebar Start -->
    <div class="gi-mobile-menu-overlay"></div>
    <div id="gi-mobile-menu" class="gi-mobile-menu">
        <div class="gi-menu-title">
            <span class="menu_title">My Menu</span>
            <button class="gi-close-menu">×</button>
        </div>
        <div class="gi-menu-inner">
            <div class="gi-menu-content">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="dropdown-arrow">Home</a>
                    </li>
                    <li><a href="{{ route('categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('products.index') }}">Shop</a></li>
                </ul>
            </div>
            <div class="header-res-lan-curr">
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item"><a href="#"><i class="gicon gi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="gicon gi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="gicon gi-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="gicon gi-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div>
        </div>
    </div>
    <!-- Mobile Menu sidebar End -->
</header>
<!-- Header End  -->

<x-front.cart.main></x-front.cart.main>
