<?php
/**
 * @var \App\Models\Product $product
 */
?>

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 gi-product-box pro-gl-content">
    <div class="gi-product-content">
        <div class="gi-product-inner">
            <div class="gi-pro-image-outer">
                <div class="gi-pro-image">
                    <a href="{{ route('products.show', $product) }}" class="image">
                        <span class="label veg">
                            <span class="dot"></span>
                        </span>
                        <img class="main-image" src="{{ $product->thumbnailUrl }}" alt="{{ $product->title }}">
                        @if($product->images->count())
                            <img class="hover-image" src="{{ $product->images()->first()->url }}" alt="{{ $product->title }}">
                        @else
                            <img class="main-image" src="{{ $product->thumbnailUrl }}" alt="{{ $product->title }}">
                        @endif
                    </a>
                    <span class="flags">
                        <span class="sale">Sale</span>
                    </span>
                    <div class="gi-pro-actions">
                        <form action="{{ route('wishlist.add', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="gi-btn-group wishlist" title="Wishlist">
                                <i class="fi-rr-heart"></i>
                            </button>
                        </form>
                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <input class="qty-input" type="hidden" name="quantity" value="1">
                            <button title="Add To Cart" class="gi-btn-group add-to-cart">
                                <i class="fi-rr-shopping-basket"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="gi-pro-content">
                @foreach($product->categories()->get() as $category)
                    <a href="{{ route('categories.show', $category) }}">
                        <h6 class="gi-pro-stitle">{{ $category->name?? ' ' }}</h6>
                    </a>
                @endforeach
                <h5 class="gi-pro-title">
                    <a href="{{ route('products.show', $product) }}">{{ $product->title }}</a>
                </h5>
                <div class="gi-pro-rat-price">
                    <span class="gi-pro-rating">
                        <i class="gicon gi-star fill"></i>
                        <i class="gicon gi-star fill"></i>
                        <i class="gicon gi-star fill"></i>
                        <i class="gicon gi-star"></i>
                        <i class="gicon gi-star"></i>
                    </span>
                    <span class="gi-price">
                        <span class="new-price">${{$product->endPrice}} ₴</span>
                         @if($product->price !== $product->endPrice)
                            <span class="old-price">{{$product->price}} ₴</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
