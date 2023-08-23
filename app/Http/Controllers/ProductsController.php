<?php

namespace App\Http\Controllers;

use App\Models\Attributes\Brand;
use App\Models\Attributes\Color;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request, ProductRepositoryContract $repository)
    {
        $products = Product::orderByDesc('id')->available()->take(8)->get();
        $colors = Color::withExists('products')->get();
        $brands = Brand::all();

        return view('products.index', compact('products', 'colors', 'brands'));
    }

    public function show(Request $request, Product $product, ProductRepositoryContract $repository)
    {
        $related = Product::with(['categories','images'])->whereRelation('categories', function (Builder $query) use ($product) {
            $query->where('category_id', '=', $product->categories()->first()->id);
        })->whereNotIn('id', [$product->id])->get();

        $product = $repository->get($product, $request);

        return view('products.show', compact('product', 'related'));
    }
}
