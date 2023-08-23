<?php
/**
 * @var \App\Models\Product[] $products
 */

?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between pt-4">
                <h5>Товари</h5>
                <div class="px-2">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-dark">Додати товар</a>
                </div>
            </div>
            <div class="card-body">
                @if(0 === $products->total())
                    <h2>Немає товарів</h2>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Категорії</th>
                                <th>Бренд</th>
                                <th>Кольори</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $product->id }}</strong>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1 align-items-center">
                                            <div>
                                                <a href="{{ route('admin.products.edit', $product->id) }}">
                                                    <img src="{{ $product->thumbnailUrl }}" alt="{{ $product->title }}" width="150">
                                                </a>
                                            </div>
                                            <div>
                                                <a href="{{ route('admin.products.edit', $product->id) }}">
                                                    <strong>{{$product->title}}</strong>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $product->categories()->implode('name', ", ") }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>
                                        @if($product->colors()->count())
                                            @foreach($product->colors as $color)
                                                <div
                                                    style="width: 20px; height: 20px; background-color: {{$color->hex}}; border: 1px solid #0d1116; border-radius: 50%"
                                                ></div>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td><span class="badge bg-label-success me-1">{{ $product->SKU }}</span></td>
                                    <td>
                                        <x-product-price-admin :product="$product"></x-product-price-admin>
                                    </td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a class="btn btn-success" href="{{ route('admin.products.edit', $product)  }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product)  }}" method="POST" >
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-primary" ><i class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="table-border-bottom-0">
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Категорії</th>
                                <th>Бренд</th>
                                <th>Кольори</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pagination">
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
