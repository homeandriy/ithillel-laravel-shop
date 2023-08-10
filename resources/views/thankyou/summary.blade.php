<?php
/**
 * @var \App\Models\Order $order
 */

?>
<x-app-layout>
    <!-- Breadcrumb start -->
    <div class="gi-breadcrumb m-b-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row gi_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="gi-breadcrumb-title">Thank you</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- gi-breadcrumb-list start -->
                            <ul class="gi-breadcrumb-list">
                                <li class="gi-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="gi-breadcrumb-item"><a href="{{ route('products.index') }}">Shop</a></li>
                                <li class="gi-breadcrumb-item active">Thank you</li>
                            </ul>
                            <!-- gi-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->

    <section class="gi-track padding-tb-40">
        <div class="container">
            <div class="section-title-2">
                <h2 class="gi-title">Thank you<span> {{ $order->name }} {{ $order->surname }}</span></h2>
                <p>In the near future, our consultant will contact you on the indicated phone number</p>
            </div>
            <div class="row">
                <div class="container">
                    <div class="gi-checkout-rightside col-lg-4 col-md-12">
                        <div class="gi-sidebar-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="gi-sidebar-block">
                                <div class="gi-sb-title">
                                    <h3 class="gi-sidebar-title">Summary
                                        <div class="gi-sidebar-res"><i class="gicon gi-angle-down"></i></div>
                                    </h3>
                                </div>
                                <div class="gi-sb-block-content gi-sidebar-dropdown">
                                    <div class="gi-checkout-summary">
                                        <div class="gi-checkout-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span class="text-right">{{ $order->total }} ₴</span>
                                        </div>
                                    </div>
                                    <div class="gi-checkout-pro">
                                        <?php
                                        /** @var \App\Models\Product $product */ ?>
                                        @foreach($order->products()->get() as $product)
                                            <div class="col-sm-12 mb-6">
                                                <div class="gi-product-inner">
                                                    <div class="gi-pro-image-outer">
                                                        <div class="gi-pro-image">
                                                            <a href="{{ route('products.show', $product) }}"
                                                               class="image">
                                                                <img class="main-image"
                                                                     src="{{ $product->thumbnailUrl }}"
                                                                     alt="{{ $product->title }}">
                                                                <img class="hover-image"
                                                                     src="{{ $product->thumbnailUrl }}"
                                                                     alt="{{ $product->title }}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="gi-pro-content">
                                                        <h5 class="gi-pro-title"><a
                                                                href="{{ route('products.show', $product) }}">{{ $product->title }}</a>
                                                        </h5>
                                                        <div class="gi-pro-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star"></i>
                                                        </div>
                                                        <span class="gi-price">
                                                    <span class="new-price">${{$product->endPrice}} ₴</span>
                                                    @if($product->price !== $product->endPrice)
                                                                <span
                                                                    class="old-price">{{$product->price}} ₴</span>
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
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>
