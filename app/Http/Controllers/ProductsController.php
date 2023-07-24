<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with( 'categories' )->orderByDesc( 'id' )->paginate( 6 );

        return view('products.index', compact('products'));
    }

    public function show(Request $request, Product $product)
    {
        $related = Product::with(['categories','images'])->whereRelation('categories', function (Builder $query) use ($product) {
            $query->where('category_id', '=', $product->categories()->first()->id);
        })->whereNotIn('id', [$product->id])->get();

        return view('products.show', compact('product', 'related'));
    }
}
