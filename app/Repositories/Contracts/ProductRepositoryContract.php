<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryContract {
    public function create( CreateProductRequest $request ): Product|false;

    public function update( Product $product, UpdateProductRequest $request ): bool;

    public function get( Product $product, Request $request ): Product;

    public function paginate( int $perPage, Request $request ): LengthAwarePaginator;
}
