<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Address;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Show cart items
    // In CartController.php

    public function index()
    {
        $cartItems = session('cart', []);
        $total = 0;

        foreach ($cartItems as $productId => $item) {
        
            $product = \App\Models\Product::find($item['product_id']);

      
            $cartItems[$productId]['name'] = $product->name;
            $cartItems[$productId]['price'] = $product->price;

         
            $total += $item['quantity'] * $product->price;
        }

        return view('cart.index', compact('cartItems', 'total'));
    }


    // Add item to cart
    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,

            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Update cart item quantity
    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Remove item from cart
    public function destroy($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function clear()
    {
        // Clear all items from the cart
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Your cart has been cleared.');
    }



    public function getCartCount()
    {
        $cart = Session::get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity')); // Assuming cart stores products and their quantities
        return response()->json(['count' => $cartCount]);
    }
}
