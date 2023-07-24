<?php
/**
 * @var \App\Models\Category[] $categories
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
                                <li class="gi-breadcrumb-item active">All Categories</li>
                            </ul>
                            <!-- gi-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->
    <section class="gi-service-section padding-tb-40">
        <div class="container">
            <div class="row m-tb-minus-12">
                @foreach($categories as $category)
                    <div class="gi-ser-content gi-ser-content-1 col-sm-6 col-md-6 col-lg-3 p-tp-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="gi-ser-inner">
                            <div class="gi-service-image">
                                <i class="fi fi-ts-truck-moving"></i>
                            </div>
                            <div class="gi-service-desc">
                                <h3>
                                    <a href="{{ route('categories.show', $category) }}">
                                        {{ $category->name }} ({{ count($category->products) }})
                                    </a>
                                </h3>
                                <p><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
