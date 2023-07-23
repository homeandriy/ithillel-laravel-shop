<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        return view('checkout', compact('product'));
    }
}
