<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        

        return view('product.index',compact('products'))

                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'saleprice' => 'nullable|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validating the image
            'category_id' => 'required|exists:categories,id', // Ensure a valid category ID
        ]);
    
        $input = $request->all();
    
        // Handle the image upload
        if ($image = $request->file('image')) {
            $destinationPath = public_path('images'); // Store in public/images directory
            $profileImage = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
    
    //    dd($input);
        Product::create($input);
    
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }
    

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {  
         

      $product = Product::findorfail($id);

      return view('product.single_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function singleproduct($product_id)
    {
    $product = Product::findOrFail($product_id);

    return view('product.single_product', compact('product'));

    }

    
}
