<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User_Address;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


class CheckoutController extends Controller
{


    public function getCartDetails()
{
    // Fetch cart items from the session
    $cartItems = session('cart', []);
    $total = 0;
    $order_id = rand(10, 100000); // Generate random order ID

    foreach ($cartItems as $id => $item) {
        // Fetch the product based on the product_id
        $product = \App\Models\Product::find($item['product_id']);
        
      
        if ($product) {
            $cartItems[$id]['name'] = $product->name;
            $cartItems[$id]['price'] = $product->price;
            
            // Calculate the total for the cart items
            $total += $item['quantity'] * $product->price;
            OrderDetails::create([
                'product_title' => $product->name,
                'product_image_url' => $product->image_url ?? "#",
                'product_quantity' => $item['quantity'],
                'product_price' => $product->price,
                'order_id' => $order_id,
            ]);
        }
    }

    // Return the data to the view
    return compact('cartItems', 'total', 'order_id');
}
    
    public function checkout()
    {
        $cartDetails = $this->getCartDetails();
        return view('cart.checkout', $cartDetails);        
      
    }

    // Process the order
    public function order(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $request->validate([
            
            'firstname' => 'required|string|min:2',
            'lastname' => 'required|string|min:2',
            'email' => 'required|email',
            'mobileno' => 'required|string',
            'address_line_one' => 'required|string',
            'address_line_two' => 'nullable|string',
            'country_name' => 'required|string',
            'city_name' => 'required|string',
            'state_name' => 'required|string',
            'size_code' => 'required|string:', 
        ]);

  

        
        $makepass = "elli12345";
        $password = Hash::make($makepass);
        
     
        $username = $request->firstname . " " . $request->lastname;

        // Create the user
        $user = User::firstOrCreate(
            ['email' => $request->email], 
            [
                'name' => $username,
                'password' => $password,
                'is_admin' => 0,  
            ]
        );

        // Create the user address
        $info = User_Address::create([
            'user_id' => $user->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobileno' => $request->mobileno,  
            'address_line_one' => $request->address_line_one,
            'address_line_two' => $request->address_line_two,
            'country_name' => $request->country_name,
            'city_name' => $request->city_name,
            'state_name' => $request->state_name,
            'size_code' => $request->size_code,
        ]);

        $orders = Order::create([
            'user_id' => $user->id,
            'order_id' => $request->order_id,
            'total_price' => $request->total_price,
            'payment_type' => $request->payment_type,            
            // 'order_status' => $request->order_status,            
        ]);       


       
        ///////


      
        $orderdate = Carbon::parse($orders->created_at);
        $order_date = $orderdate->format('F jS Y');

     
        $cartDetails = $this->getCartDetails();
      

        // return view('cart.cashon',$cartDetails, compact('orders','order_date','info'));

        // SSl Payment
        return view('cart.exampleEasycheckout',$cartDetails, compact('orders','order_date','info'));
    }



 
  }



