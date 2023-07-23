<?php
/**
 * @var \App\Models\Product[] $products
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
                            <h2 class="gi-breadcrumb-title">Shop Page</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- gi-breadcrumb-list start -->
                            <ul class="gi-breadcrumb-list">
                                <li class="gi-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="gi-breadcrumb-item active">Shop</li>
                            </ul>
                            <!-- gi-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->
    <!-- Shop section -->
    <section class="gi-shop padding-tb-40">
        <div class="container">
            <div class="row">
                <div class="gi-shop-rightside col-lg-12 col-md-12 margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="gi-pro-list-top d-flex">
                        <div class="col-md-6 gi-grid-list">
                            <div class="gi-gl-btn">
                                <button class="grid-btn filter-toggle-icon">
                                    <i class="fi fi-rr-filter"></i>
                                </button>
                                <button class="grid-btn btn-grid-50 active">
                                    <i class="fi fi-rr-apps"></i>
                                </button>
                                <button class="grid-btn btn-list-50">
                                    <i class="fi fi-rr-list"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 gi-sort-select">
                            <div class="gi-select-inner">
                                <select name="gi-select" id="gi-select">
                                    <option selected disabled>Sort by</option>
                                    <option value="1">Position</option>
                                    <option value="2">Relevance</option>
                                    <option value="3">Name, A to Z</option>
                                    <option value="4">Name, Z to A</option>
                                    <option value="5">Price, low to high</option>
                                    <option value="6">Price, high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Top End -->

                    <!-- Select Bar Start -->
                    <div class="gi-select-bar d-flex">
                    </div>
                    <!-- Select Bar End -->

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">
                                @foreach($products as $product)
                                    <x-front.main.product :product="$product"></x-front.main.product>
                                @endforeach
                            </div>
                        </div>
                        <!-- Pagination Start -->
                        <div class="gi-pro-pagination">
                            {{ $products->links() }}
                        </div>
                        <!-- Pagination End -->
                    </div>
                    <!--Shop content End -->

                </div>
                <!-- Sidebar Area Start -->
                <div class="filter-sidebar-overlay"></div>
                <div class="gi-shop-sidebar gi-filter-sidebar col-lg-3 col-md-12">
                    <div class="sidebar-filter-title">
                        <h5>Filters</h5>
                        <a class="filter-close" href="javascript:void(0)">×</a>
                    </div>
                    <div id="shop_sidebar">
                        <div class="gi-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <div class="gi-sidebar-block">
                                <div class="gi-sb-title">
                                    <h3 class="gi-sidebar-title">Category</h3>
                                </div>
                                <div class="gi-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox" checked>
                                                <a href="javascript:void(0)">
                                                    <span><i class="fi-rr-cupcake"></i>Dairy & Bakery</span>
                                                </a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox">
                                                <a href="javascript:void(0)">
                                                    <span><i class="fi fi-rs-apple-whole"></i>Fruits & Vegetable</span>
                                                </a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox">
                                                <a href="javascript:void(0)">
                                                    <span><i class="fi fi-rr-popcorn"></i>Snack & Spice</span>
                                                </a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="gi-sidebar-block-item">
                                                <input type="checkbox">
                                                <a href="javascript:void(0)">
                                                    <span><i class="fi fi-rr-drink-alt"></i>Juice & Drinks</span>
                                                </a>
                                                <span class="checked"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
