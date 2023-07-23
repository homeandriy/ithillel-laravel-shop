<?php
/**
 * @var \App\Models\Category[] $categories
 * @var \App\Models\Product[] $products
 */
?>
<x-app-layout>
    <x-front.banner.banner link="#" linkText="test"></x-front.banner.banner>
{{--    Category start--}}
    <section class="gi-category body-bg padding-tb-40 wow fadeInUp" data-wow-duration="2s">
        <div class="container">
            <div class="row m-b-minus-15px">
                <div class="col-xl-12 border-content-color">
                    <div class="gi-category-block owl-carousel">
                        @foreach($categories as $category)
                            <div class="gi-cat-box gi-cat-box-1">
                                <div class="gi-cat-icon">
                                    <i class="fi fi-tr-peach"></i>
                                    <div class="gi-cat-detail">
                                        <a href="{{ route('categories.show', $category) }}">
                                            <h4 class="gi-cat-title">{{ $category->name }}</h4>
                                        </a>
                                        <p class="items">{{ $category->products()->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    Category end--}}
    <!-- New Product tab Area Start -->
    <section class="gi-product-tab gi-products padding-tb-40 wow fadeInUp" data-wow-duration="2s">
        <div class="container">
            <div class="gi-tab-title">
                <div class="gi-main-title">
                    <div class="section-title">
                        <div class="section-detail">
                            <h2 class="gi-title">Last <span>Products</span></h2>
                            <p>Shop online!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New Product -->
            <div class="row m-b-minus-24px">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st Product tab start -->
                        <div class="tab-pane fade show active product-block" id="all">
                            <div class="row">
                                @foreach($products as $product)
                                    <x-front.main.product :product="$product"></x-front.main.product>
                                @endforeach
                            </div>
                        </div>
                        <!-- 1st Product tab end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product tab Area End -->
</x-app-layout>
