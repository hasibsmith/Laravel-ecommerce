<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class BackendController extends Controller
{

    public function index()
    {

        $products = Product::get();

        $categories = Category::withCount('products')->having('products_count', '>', 0)->get();

        return view('welcome', compact('products', 'categories'));
    }

    public function show($id)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('product.single-product', compact('product'));
    }
}
