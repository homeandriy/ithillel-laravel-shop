<?php
/**
 * @var \App\Models\product[] $categories
 */
?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Головна</a></span>/
            <span class="text-muted fw-light"><a href="{{ route('admin.products.index') }}">Товари</a></span>/
            Створення
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Введіть дані товару
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div>
                                <label class="form-label" for="product-name">Title</label>
                                <input type="text" class="form-control form-control-lg" id="product-name" placeholder="Title" name="title" aria-describedby="product-name-helper">
                                <div id="product-name-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <label for="product-description" class="form-label">Description</label>
                                <textarea class="form-control" id="product-description" name="description" aria-describedby="product-description-helper" rows="3" placeholder="Description"></textarea>
                                <div id="product-description-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for="product-price">Price</label>
                                <input type="number" step="0.01" class="form-control form-control-lg" id="product-price" placeholder="Price" name="price" aria-describedby="product-price-helper">
                                <div id="product-price-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for="product-discount">Discount (0-100%)</label>
                                <input type="number" step="1" min="0" max="100" class="form-control form-control-lg" id="product-discount" placeholder="Discount (0-100%)" name="discount" aria-describedby="product-discount-helper">
                                <div id="product-discount-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('discount')" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for="product-quantity">Quantity</label>
                                <input type="number" step="1" min="1" class="form-control form-control-lg" id="product-quantity" placeholder="Quantity" name="quantity" aria-describedby="product-quantity-helper">
                                <div id="product-quantity-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mt-2 mb-3">
                                <label for="product-parent" class="form-label">Select categories</label>
                                <select id="product-parent" class="form-select form-select-lg" name="categories[]" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
                            </div>

                            <button type="submit" class="btn rounded-pill btn-primary">Створити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
