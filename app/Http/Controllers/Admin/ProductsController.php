<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ProductsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::orderByDesc( 'id' )->paginate( 5 );

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
    public function store( CreateProduct $request ) {
        $fields         = $request->validated();
        $fields['slug'] = Str::of( $fields['title'] )->slug( '-' );
        $fields['SKU']  = md5($fields['slug']);
        $fields['thumbnail']  = 'no-image.jpg';
//        dd($fields);
        $product = Product::create( $fields );
        $product->categories()->attach($fields['categories']);
        return redirect()->route( 'admin.products.index' );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Product $product ) {
        $categories = Category::all();
        $productCategoriesIds = $product->categories()->select('category_id')->pluck('category_id');

        return view( 'admin.products.edit', compact( 'product', 'categories', 'productCategoriesIds' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateProduct $request, Product $product ) {
        $product->updateOrFail( $request->validated() );

        return redirect()->route( 'admin.products.edit', $product );
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
