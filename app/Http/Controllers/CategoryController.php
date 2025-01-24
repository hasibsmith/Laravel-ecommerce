<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);



        return view('categories.index', compact('categories'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {


        $request->validate([


            'name' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



        $input = $request->all();



        if ($image = $request->file('image')) {

            $destinationPath = 'images/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";
        }



        Category::create($input);



        return redirect()->route('categories.index')

            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    { {

            return view('categories.edit', compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    { {



            $input = $request->all();



            if ($image = $request->file('image')) {

                $destinationPath = 'images/';

                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

                $image->move($destinationPath, $profileImage);

                $input['image'] = "$profileImage";
            } else {

                unset($input['image']);
            }



            $category->update($input);



            return redirect()->route('categories.index')

                ->with('success', 'Product updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {  {

            $category->delete();



            return redirect()->route('categories.index')

                ->with('success', 'Product deleted successfully');
        }
    }

    public function showProductsByCategory($category_id)
    {

        $category = Category::with('products')->findOrFail($category_id);

        $products = $category->products()->paginate(10);


        return view('categories.category-products', compact('category', 'products'));
    }
}
