<x-app-layout>
    <!-- Breadcrumb start -->
    <div class="gi-breadcrumb m-b-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row gi_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="gi-breadcrumb-title">Checkout</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- gi-breadcrumb-list start -->
                            <ul class="gi-breadcrumb-list">
                                <li class="gi-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="gi-breadcrumb-item"><a href="{{ route('products.index') }}">Shop</a></li>
                                <li class="gi-breadcrumb-item active">Checkout</li>
                            </ul>
                            <!-- gi-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->
    <!-- Checkout start -->
    <section class="gi-checkout-section padding-tb-40">
        <h2 class="d-none">Checkout Page</h2>
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="gi-checkout-rightside col-lg-4 col-md-12">
                    <div class="gi-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="gi-sidebar-block">
                            <div class="gi-sb-title">
                                <h3 class="gi-sidebar-title">Summary<div class="gi-sidebar-res"><i class="gicon gi-angle-down"></i></div></h3>
                            </div>
                            <div class="gi-sb-block-content gi-sidebar-dropdown">
                                <div class="gi-checkout-summary">
                                    <div>
                                        <span class="text-left">Sub-Total</span>
                                        <span class="text-right">{{ Cart::instance('cart')->subtotal() }} ₴</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Delivery Charges</span>
                                        <span class="text-right">{{ Cart::instance('cart')->tax() }} ₴</span>
                                    </div>
                                    <div class="gi-checkout-summary-total">
                                        <span class="text-left">Total Amount</span>
                                        <span class="text-right">{{ Cart::instance('cart')->total() }} ₴</span>
                                    </div>
                                </div>
                                <div class="gi-checkout-pro">
                                    <?php /** @var \Gloudemans\Shoppingcart\CartItem $cartProduct */ ?>
                                    @foreach(Cart::instance('cart')->content() as $cartProduct)
                                    <div class="col-sm-12 mb-6">
                                        <div class="gi-product-inner">
                                            <div class="gi-pro-image-outer">
                                                <div class="gi-pro-image">
                                                    <a href="{{ route('products.show', $cartProduct->model) }}" class="image">
                                                        <img class="main-image" src="{{ $cartProduct->model->thumbnailUrl }}" alt="{{ $cartProduct->model->title }}">
                                                        <img class="hover-image" src="{{ $cartProduct->model->thumbnailUrl }}" alt="{{ $cartProduct->model->title }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gi-pro-content">
                                                <h5 class="gi-pro-title"><a href="{{ route('products.show', $cartProduct->model) }}">{{ $cartProduct->model->title }}</a></h5>
                                                <div class="gi-pro-rating">
                                                    <i class="gicon gi-star fill"></i>
                                                    <i class="gicon gi-star fill"></i>
                                                    <i class="gicon gi-star fill"></i>
                                                    <i class="gicon gi-star fill"></i>
                                                    <i class="gicon gi-star"></i>
                                                </div>
                                                <span class="gi-price">
                                                    <span class="new-price">${{$cartProduct->model->endPrice}} ₴</span>
                                                    @if($cartProduct->model->price !== $cartProduct->model->endPrice)
                                                        <span class="old-price">{{$cartProduct->model->price}} ₴</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
{{--                    <div class="gi-sidebar-wrap gi-checkout-del-wrap">--}}
{{--                        <!-- Sidebar Summary Block -->--}}
{{--                        <div class="gi-sidebar-block">--}}
{{--                            <div class="gi-sb-title">--}}
{{--                                <h3 class="gi-sidebar-title">Delivery Method<div class="gi-sidebar-res"><i class="gicon gi-angle-down"></i></div></h3>--}}
{{--                            </div>--}}
{{--                            <div class="gi-sb-block-content gi-sidebar-dropdown">--}}
{{--                                <div class="gi-checkout-del">--}}
{{--                                    <div class="gi-del-desc">Please select the preferred shipping method to use on this--}}
{{--                                        order.</div>--}}
{{--                                    <form action="#">--}}
{{--                                        <span class="gi-del-option">--}}
{{--                                            <span>--}}
{{--                                                <span class="gi-del-opt-head">Free Shipping</span>--}}
{{--                                                <input type="radio" id="del1" name="radio-group" checked="">--}}
{{--                                                <label for="del1">Rate - $0 .00</label>--}}
{{--                                            </span>--}}
{{--                                            <span>--}}
{{--                                                <span class="gi-del-opt-head">Flat Rate</span>--}}
{{--                                                <input type="radio" id="del2" name="radio-group">--}}
{{--                                                <label for="del2">Rate - $5.00</label>--}}
{{--                                            </span>--}}
{{--                                        </span>--}}
{{--                                        <span class="gi-del-commemt">--}}
{{--                                            <span class="gi-del-opt-head">Add Comments About Your Order</span>--}}
{{--                                            <textarea name="your-commemt" placeholder="Comments"></textarea>--}}
{{--                                        </span>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Sidebar Summary Block -->--}}
{{--                    </div>--}}
{{--                    <div class="gi-sidebar-wrap gi-checkout-pay-wrap">--}}
{{--                        <!-- Sidebar Payment Block -->--}}
{{--                        <div class="gi-sidebar-block">--}}
{{--                            <div class="gi-sb-title">--}}
{{--                                <h3 class="gi-sidebar-title">Payment Method<div class="gi-sidebar-res"><i class="gicon gi-angle-down"></i></div></h3>--}}
{{--                            </div>--}}
{{--                            <div class="gi-sb-block-content gi-sidebar-dropdown">--}}
{{--                                <div class="gi-checkout-pay">--}}
{{--                                    <div class="gi-pay-desc">Please select the preferred payment method to use on this--}}
{{--                                        order.</div>--}}
{{--                                    <form action="#">--}}
{{--                                        <span class="gi-pay-option">--}}
{{--                                            <span>--}}
{{--                                                <input type="radio" id="pay1" name="radio-group" checked="">--}}
{{--                                                <label for="pay1">Cash On Delivery</label>--}}
{{--                                            </span>--}}
{{--                                        </span>--}}
{{--                                        <span class="gi-pay-commemt">--}}
{{--                                            <span class="gi-pay-opt-head">Add Comments About Your Order</span>--}}
{{--                                            <textarea name="your-commemt" placeholder="Comments"></textarea>--}}
{{--                                        </span>--}}
{{--                                        <span class="gi-pay-agree"><input type="checkbox" value=""><a href="#">I have--}}
{{--                                                read and agree to the <span>Terms &amp; Conditions.</span></a><span class="checked"></span></span>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Sidebar Payment Block -->--}}
{{--                    </div>--}}
{{--                    <div class="gi-sidebar-wrap gi-check-pay-img-wrap">--}}
{{--                        <!-- Sidebar Payment Block -->--}}
{{--                        <div class="gi-sidebar-block">--}}
{{--                            <div class="gi-sb-title">--}}
{{--                                <h3 class="gi-sidebar-title">Payment Method<div class="gi-sidebar-res"><i class="gicon gi-angle-down"></i></div></h3>--}}
{{--                            </div>--}}
{{--                            <div class="gi-sb-block-content gi-sidebar-dropdown" style="">--}}
{{--                                <div class="gi-check-pay-img-inner">--}}
{{--                                    <div class="gi-check-pay-img">--}}
{{--                                        <img src="assets/img/hero-bg/payment.png" alt="payment">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Sidebar Payment Block -->--}}
{{--                    </div>--}}
                </div>
                <div class="gi-checkout-leftside col-lg-8 col-md-12 m-t-991">
                    <!-- checkout content Start -->
                    <div class="gi-checkout-content">
                        <div class="gi-checkout-inner">
                            <div class="gi-checkout-wrap m-b-40 padding-bottom-3">
                                <div class="gi-checkout-block gi-check-bill">
                                    <h3 class="gi-checkout-title">Billing Details</h3>
                                    <form method="POST" id="checkout-form" class="w-full" action="#">
                                        @csrf
                                        <div class="gi-bl-block-content">
                                            <div class="gi-check-subtitle">Checkout Options</div>
                                            <div class="gi-check-bill-form">
                                                <span class="gi-bill-wrap gi-bill-half">
                                                    <!-- Name -->
                                                    <x-input-label for="name" :value="__('Name')" />
                                                    <x-text-input id="name" type="text" name="name" :value="old('name')" placeholder="First Name" required autofocus autocomplete="name" />
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                </span>
                                                <span class="gi-bill-wrap gi-bill-half">
                                                    <x-input-label for="surname" :value="__('Surname')" />
                                                    <x-text-input id="surname" type="text" name="surname" :value="old('surname')" placeholder="Surname" required autocomplete="surname" />
                                                    <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                                                </span>
                                                <span class="gi-bill-wrap">
                                                    <x-input-label for="email" :value="__('Email')" />
                                                    <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="You email address" required autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </span>
                                                <span class="gi-bill-wrap">
                                                    <x-input-label for="phone" :value="__('Phone')" />
                                                    <x-text-input id="phone" type="tel" name="phone" :value="old('phone')" placeholder="Phone number" required autocomplete="phone" />
                                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                                </span>
                                                <span class="gi-bill-wrap gi-bill-half">
                                                    <x-input-label for="city" :value="__('City')" />
                                                    <x-text-input id="city" type="text" name="city" :value="old('city')" placeholder="City" required autocomplete="city" />
                                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                                </span>
                                                <span class="gi-bill-wrap gi-bill-half">
                                                    <x-input-label for="address" :value="__('Address')" />
                                                    <x-text-input id="address"  type="text" name="address" :value="old('address')" placeholder="Delivery Address" required autocomplete="address" />
                                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @include('checkout.payments.paypal')
                            </div>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout end -->
</x-app-layout>
