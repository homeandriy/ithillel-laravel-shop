<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::select(['*'])->orderByDesc('id')->get();

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $products = $category->products()->orderByDesc('id')->paginate(4);

        return view('categories.show', compact('category', 'products'));
    }
}
