<?php
/**
 * @var \App\Models\Category[] $categories
 * @var \App\Models\Product $product
 * @var \Illuminate\Support\Collection $productCategoriesIds
 * @var \App\Models\Attributes\Brand[] $brands
 * @var \App\Models\Attributes\Color[] $colors
 */

?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Головна</a></span>/
            <span class="text-muted fw-light"><a href="{{ route('admin.products.index') }}">Товари</a></span>/
            Редагування {{ $product->title }}
        </h4>
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">
                            Створення
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">
                            Варіації
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="navs-pills-top-home" role="tabpanel">
                        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <h5 class="card-header">
                                            Введіть дані товару
                                        </h5>
                                        <div class="card-body">
                                            <div>
                                                <label class="form-label" for="product-name">Title</label>
                                                <input type="text" class="form-control form-control-lg" id="product-name" placeholder="Title" name="title" aria-describedby="product-name-helper" value="{{ $product->title }}">
                                                <div id="product-name-helper" class="form-text">
                                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div>
                                                <label for="product-description" class="form-label">Description</label>
                                                <textarea class="form-control" id="product-description" name="description" aria-describedby="product-description-helper" rows="3" placeholder="Description">{{ $product->description  }}</textarea>
                                                <div id="product-description-helper" class="form-text">
                                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label" for="product-price">Price</label>
                                                <input type="number" step="0.01" class="form-control form-control-lg" id="product-price" placeholder="Price" name="price" aria-describedby="product-price-helper" value="{{ $product->price }}" >
                                                <div id="product-price-helper" class="form-text">
                                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label" for="product-SKU">SKU</label>
                                                <input type="text" step="1" min="1" class="form-control form-control-lg" id="product-SKU" placeholder="SKU. Example xsd-25U1" name="SKU" aria-describedby="product-SKU-helper" value="{{ $product->SKU }}">
                                                <div id="product-SKU-helper" class="form-text">
                                                    <x-input-error :messages="$errors->get('SKU')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label" for="product-discount">Discount (0-100%)</label>
                                                <input type="number" step="1" min="0" max="100" class="form-control form-control-lg" id="product-discount" placeholder="Discount (0-100%)" name="discount" aria-describedby="product-discount-helper" value="{{ $product->discount }}">
                                                <div id="product-discount-helper" class="form-text">
                                                    <x-input-error :messages="$errors->get('discount')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label" for="product-quantity">Quantity</label>
                                                <input type="number" step="1" min="1" class="form-control form-control-lg" id="product-quantity" placeholder="Quantity" name="quantity" aria-describedby="product-quantity-helper" value="{{ $product->quantity }}">
                                                <div id="product-quantity-helper" class="form-text">
                                                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-3">
                                                <label for="product-parent" class="form-label">Select categories</label>
                                                <select id="product-parent" class="form-select form-select-lg" name="categories[]" multiple>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" @if( $productCategoriesIds->contains($category->id)) selected @endif>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h4>Зображення та галерея</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mt-2 mb-3">
                                                <label for="thumbnail" class="form-label">Change product thumbnail</label>
                                                <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                                                <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                                            </div>
                                            <div class="mb-4">
                                                <img src="{{ $product->thumbnailUrl }}" id="thumbnail-preview">
                                            </div>

                                            <div class="mt-2 mb-3">
                                                <label for="images" class="form-label">Change product Images</label>
                                                <input class="form-control" type="file" name="images[]" id="images" multiple>
                                                <x-input-error :messages="$errors->get('images[]')" class="mt-2" />
                                            </div>
                                            <div class="mb-4 images-wrapper">
                                                @if($product->images()->count())
                                                    @foreach($product->images()->getResults() as $image)
                                                        <div class="mb-4" style="position: relative">
                                                            <img src="{{ $image->url }}" class="card-img-top" style="width: 100%; margin: 0 auto; display: block;" alt="{{$product->title}}">
                                                            <x-button href="#"
                                                                      color-type="danger"
                                                                      class="py-1 px-2 remove-image"
                                                                      style="position: absolute; top: 10px; right: 10px; height: 40px; width: 40px; "
                                                                      data-route="{{ route('ajax.images.delete', $image) }}"
                                                            >
                                                                <i class="bx bx-trash-alt" aria-hidden="true"></i>
                                                            </x-button>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="submit" class="btn rounded-pill btn-primary">Створити</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.products.variation-update', $product) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    @if($product->colors()->count())
                                        @foreach($product->colors()->get() as $variation)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-inline-flex gap-2">
                                                        <input type="hidden" name="id[{{ $variation->id }}][]" value="{{ $variation->id }}">
                                                        <div class="mt-2 mb-3">
                                                            <label for="product-parent" class="form-label">Select categories</label>
                                                            <select id="product-parent" class="form-select form-select-lg" name="color[{{ $variation->id }}][]">
                                                                @foreach($colors as $basicColor)
                                                                    <option value="{{ $basicColor->id }}" @selected($basicColor->id === $variation->pivot->color_id)>{{ $basicColor->hex }}</option>
                                                                @endforeach
                                                            </select>
                                                      </div>
                                                        <div class="mt-2 mb-3">
                                                            <label class="form-label" for="product-quantity">Quantity</label>
                                                            <input type="number" step="1" min="1" class="form-control form-control-lg" id="product-quantity" placeholder="Quantity" name="quantity" aria-describedby="product-quantity-helper" value="{{ $variation->pivot->quantity }}">
                                                        </div>
                                                        <div class="mt-2 mb-3">
                                                            <label class="form-label" for="product-quantity">Price</label>
                                                            <input type="number" step="1" min="1" class="form-control form-control-lg" id="product-quantity" placeholder="Quantity" name="quantity" aria-describedby="product-quantity-helper" value="{{ $variation->pivot->price }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
