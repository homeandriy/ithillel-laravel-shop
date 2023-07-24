<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;

class ProductsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::with( 'categories' )->orderByDesc( 'id' )->paginate( 5 );

        return view(
            'admin.products.index',
            compact( 'products' )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::all();

        return view( 'admin.products.create', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( CreateProductRequest $request, ProductRepositoryContract $repository ) {

        return $repository->create( $request )
            ? redirect()->route( 'admin.products.index' )
            : redirect()->back()->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Product $product ) {
        $categories           = Category::all();
        $productCategoriesIds = $product->categories()->select( 'category_id' )->pluck( 'category_id' );

        return view( 'admin.products.edit', compact( 'product', 'categories', 'productCategoriesIds' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateProductRequest $request, Product $product, ProductRepositoryContract $repository ) {
        return $repository->update( $request, $product )
            ? redirect()->route( 'admin.products.edit', $product )
            : redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Product $product ) {
        $this->middleware( 'permission:' . config( 'permission.access.products.delete' ) );
        $product->deleteOrFail();

        return redirect()->route( 'admin.products.index' );
    }
}
