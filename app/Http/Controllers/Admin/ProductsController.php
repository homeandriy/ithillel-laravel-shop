<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attributes\Brand;
use App\Models\Attributes\Color;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;
use Illuminate\Http\Request;

class ProductsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductRepositoryContract $repository) {
        $products = Product::with( 'categories', 'colors', 'brand' )->orderByDesc( 'id' )->paginate( 5 );

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
        $brands = Brand::all();
        $colors = Color::all();

        return view( 'admin.products.create', compact( 'categories', 'brands', 'colors' ) );
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
        $brands = Brand::all();
        $colors = Color::all();

        return view( 'admin.products.edit', compact( 'product', 'categories', 'productCategoriesIds', 'brands', 'colors' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateProductRequest $request, Product $product, ProductRepositoryContract $repository ) {
        return $repository->update( $product, $request )
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
    public function updateVariation(Request $request, Product $product) {
        dd($request);
    }
}
