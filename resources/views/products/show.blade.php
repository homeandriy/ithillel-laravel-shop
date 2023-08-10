<?php
/**
 * @var \App\Models\Product $product
 * @var \App\Models\Product[] $related
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
                        <h2 class="gi-breadcrumb-title">{{ $product->title }}</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- gi-breadcrumb-list start -->
                        <ul class="gi-breadcrumb-list">
                            <li class="gi-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="gi-breadcrumb-item active">Product: {{ $product->title }}</li>
                        </ul>
                        <!-- gi-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb end -->
    <!-- Sart Single Product -->
    <section class="gi-single-product padding-tb-40">
        <div class="container">
            <div class="row">
                <div class="gi-pro-rightside gi-common-rightside col-md-12">
                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="row">
                                <div class="single-pro-img single-pro-img-no-sidebar">
                                    <div class="single-product-scroll">
                                        <div class="single-product-cover">
                                            <div class="single-slide zoom-image-hover">
                                                <img class="img-responsive" src="{{ $product->thumbnailUrl }}"
                                                     alt="{{ $product->title }}">
                                            </div>
                                            @foreach($product->images()->get() as $image)
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ $image->url }}"
                                                         alt="{{ $product->title }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="single-nav-thumb">
                                            <div class="single-slide">
                                                <img class="img-responsive" src="{{ $product->thumbnailUrl }}" alt="{{ $product->title }}">
                                            </div>
                                            @foreach($product->images()->get() as $image)
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ $image->url }}" alt="{{ $product->title }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar m-t-991">
                                    <div class="single-pro-content">
                                        <h5 class="gi-single-title">{{ $product->title }}</h5>
                                        <div class="gi-single-rating-wrap">
                                            <div class="gi-single-rating">
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star fill"></i>
                                                <i class="gicon gi-star-o"></i>
                                            </div>
                                            <span class="gi-read-review">
                                                |&nbsp;&nbsp;<a href="#gi-spt-nav-review">{{ mt_rand(10, 85298) }} Ratings</a>
                                            </span>
                                        </div>

                                        <div class="gi-single-price-stoke">
                                            <div class="gi-single-price">
                                                <div class="final-price">${{$product->endPrice}} ₴
                                                    @if($product->price !== $product->endPrice)
                                                        <span class="price-des">{{$product->price}} ₴</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="gi-single-stoke">
                                                <span class="gi-single-sku">SKU#: {{ $product->SKU }}</span>
                                                <span class="gi-single-ps-title">IN STOCK</span>
                                            </div>
                                        </div>

                                        <div class="gi-pro-variation">
                                        </div>
                                        <div class="gi-single-qty">
                                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                                @csrf
                                                <div class="d-inline-flex">
                                                    <div class="qty-plus-minus">
                                                        <input class="qty-input" type="text" name="quantity" value="1">
                                                    </div>
                                                    <div class="gi-single-cart">
                                                        <button  type="submit" class="btn btn-primary gi-btn-1">Add To Cart</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="{{ route('wishlist.add', $product) }}" method="POST">
                                                @csrf
                                                <div class="gi-single-wishlist">
                                                    <button type="submit" class="gi-btn-group wishlist" title="Wishlist">
                                                        <i class="fi-rr-heart"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->

                    <!-- Single product tab start -->
                    <div class="gi-single-pro-tab">
                        <div class="gi-single-pro-tab-wrapper">
                            <div class="gi-single-pro-tab-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="details-tab" data-bs-toggle="tab"
                                                data-bs-target="#gi-spt-nav-details" type="button" role="tab"
                                                aria-controls="gi-spt-nav-details" aria-selected="true">Detail</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                                data-bs-target="#gi-spt-nav-info" type="button" role="tab"
                                                aria-controls="gi-spt-nav-info"
                                                aria-selected="false">Specifications</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                                data-bs-target="#gi-spt-nav-review" type="button" role="tab"
                                                aria-controls="gi-spt-nav-review" aria-selected="false">Reviews</button>
                                    </li>
                                </ul>

                            </div>
                            <div class="tab-content  gi-single-pro-tab-content">
                                <div id="gi-spt-nav-details" class="tab-pane fade show active">
                                    <div class="gi-single-pro-tab-desc">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                                <div id="gi-spt-nav-info" class="tab-pane fade">
                                    <div class="gi-single-pro-tab-moreinfo">
                                         <ul>
                                            <li><span>Model</span> {{$product->SKU}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="gi-spt-nav-review" class="tab-pane fade">
                                    <div class="row">
                                        <div class="gi-t-review-wrapper">
                                            <div class="gi-t-review-item">
                                                <div class="gi-t-review-avtar">
                                                    <img src="{{ asset('assets/img/user/1.jpg') }}" alt="user">
                                                </div>
                                                <div class="gi-t-review-content">
                                                    <div class="gi-t-review-top">
                                                        <div class="gi-t-review-name">Mariya Lykra</div>
                                                        <div class="gi-t-review-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-t-review-bottom">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gi-t-review-item">
                                                <div class="gi-t-review-avtar">
                                                    <img src="{{ asset('assets/img/user/2.jpg') }}" alt="user">
                                                </div>
                                                <div class="gi-t-review-content">
                                                    <div class="gi-t-review-top">
                                                        <div class="gi-t-review-name">Moris Willson</div>
                                                        <div class="gi-t-review-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-t-review-bottom">
                                                        <p>Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="gi-ratting-content">
                                            <h3>Add a Review</h3>
                                            <div class="gi-ratting-form">
                                                <form action="#">
                                                    <div class="gi-ratting-star">
                                                        <span>Your rating:</span>
                                                        <div class="gi-t-review-rating">
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star fill"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                            <i class="gicon gi-star-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-ratting-input">
                                                        <input name="your-name" placeholder="Name" type="text">
                                                    </div>
                                                    <div class="gi-ratting-input">
                                                        <input name="your-email" placeholder="Email*" type="email"
                                                               required>
                                                    </div>
                                                    <div class="gi-ratting-input form-submit">
                                                        <textarea name="your-commemt"
                                                                  placeholder="Enter Your Comment"></textarea>
                                                        <button class="gi-btn-2" type="submit"
                                                                value="Submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details description area end -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Single Product -->

    <!-- Related product section -->
    <section class="gi-related-product gi-new-product padding-tb-40">
        <div class="container">
            <div class="row overflow-hidden m-b-minus-24px">
                <div class="gi-new-prod-section col-lg-12">
                    <div class="gi-products">
                        <div class="section-title-2" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                            <h2 class="gi-title">Related <span>Products</span></h2>
                            <p>Browse The Collection of Top Products</p>
                        </div>
                        <div class="gi-new-block m-minus-lr-12" data-aos="fade-up" data-aos-duration="2000"
                             data-aos-delay="300">
                            <div class="new-product-carousel owl-carousel gi-product-slider">
                                @foreach($related as $relatedProduct)
                                    <div class="gi-product-content">
                                        <div class="gi-product-inner">
                                            <div class="gi-pro-image-outer">
                                                <div class="gi-pro-image">
                                                    <a href="{{ route('products.show', $relatedProduct) }}" class="image">
                                                    <span class="label veg">
                                                        <span class="dot"></span>
                                                    </span>
                                                        <img class="main-image" src="{{ $relatedProduct->thumbnailUrl }}"
                                                             alt="{{ $relatedProduct->title }}">
                                                        @if($relatedProduct->images->count())
                                                            <img class="hover-image" src="{{ $relatedProduct->images()->first()->url }}" alt="{{ $relatedProduct->title }}">
                                                        @else
                                                            <img class="main-image" src="{{ $relatedProduct->thumbnailUrl }}" alt="{{ $relatedProduct->title }}">
                                                        @endif
                                                    </a>
                                                    <span class="flags">
                                                    <span class="sale">Sale</span>
                                                </span>
                                                    <form action="{{ route('cart.add', $product) }}" method="POST">
                                                        @csrf
                                                        <div class="gi-pro-actions">
                                                            <a class="gi-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                            <a href="#" class="gi-btn-group quickview" data-link-action="quickview" title="Quick view"
                                                               data-bs-toggle="modal" data-bs-target="#gi_quickview_modal"><i
                                                                    class="fi-rr-eye"></i></a>
                                                            <a href="javascript:void(0)" class="gi-btn-group compare"
                                                               title="Compare"><i class="fi fi-rr-arrows-repeat"></i></a>
                                                            <button type="submit" class="gi-btn-group add-to-cart"><i class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="gi-pro-content">
                                                @foreach($relatedProduct->categories()->get() as $category)
                                                    <a href="{{ route('categories.show', $category) }}">
                                                        <h6 class="gi-pro-stitle">{{ $category->name?? ' ' }}</h6>
                                                    </a>
                                                @endforeach
                                                <h5 class="gi-pro-title">
                                                    <a href="{{ route('products.show', $relatedProduct) }}">{{ $relatedProduct->title }}</a>
                                                </h5>
                                                <div class="gi-pro-rat-price">
                                                <span class="gi-pro-rating">
                                                    <i class="gicon gi-star fill"></i>
                                                    <i class="gicon gi-star fill"></i>
                                                    <i class="gicon gi-star fill"></i>
                                                    <i class="gicon gi-star fill"></i>
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related product section End -->
</x-app-layout>
