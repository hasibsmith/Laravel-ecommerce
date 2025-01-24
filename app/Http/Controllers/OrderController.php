<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Profile;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class OrderController extends Controller
{

  public function dbprofileinfo()
  {

    // $users = DB::table('profiles')->get();
    // $users = DB::table('profiles')->where('user_id','3')->first();
    // $users = DB::table('profiles')->pluck('phone','address');
    // dd($users);

    // foreach ($users as $user) {
    //   echo $user->address;
    // }

    //   DB::table('users')->orderBy('id')->chunk(100, function (Collection $users) {
    //     foreach ($users as $user) {
    //         // ...
    //     }
    // });
   
    $users = DB::table('order_details')->select('product_price')->distinct()->get();

    dd($users);
   
  }


  public function profile_details()
  {
 

    // $user = User::find(3);
    //  dd($user->profile());
    // return $user->profile()->first();
    // $userinfowithprofile = User::with('profile')->where('id', 3)->get();
    // dd($userinfowithprofile);

    // foreach ($userinfowithprofile as $value) {
    //   echo $value->name;
    //   echo $value->email;
    //   echo $value->profile->phone;
    //   echo $value->profile->address;
    // }
  }


  public function orderlist()
  {

    $order_details = DB::select('select * from orders');


    return view('order.orderlist', compact('order_details'));
  }

  public function orderapproved($id)
  {

    DB::select('UPDATE orders set order_status=1 where id = ?', [$id]);
    return redirect()->back();
  }
  public function orderdone($id)
  {

    DB::select('UPDATE orders set order_status=2 where id = ?', [$id]);
    return redirect()->back();
  }

  public function ordercancel($id)
  {

    DB::select('UPDATE orders set order_status=3 where id = ?', [$id]);
    return redirect()->back();
  }



  public function feedback($order_id)
  {
    $order = Order::find($order_id);



    return view('order.order_feedback', compact('order'));
  }




  public function submitFeedback(Request $request, $order_id)
  {
    $order = Order::find($order_id);

    $request->validate([

      'comment' => 'nullable|string|max:1000',
    ]);

    if (!$order) {
      return redirect()->back()->with('error', 'Order not found.');
    }

    Feedback::create([
      'order_id' => $order_id,
      'feedback_text' => $request->input('comment') ?? 'No comment provided',
    ]);
    return redirect()->route('login', $order_id)->with('success', 'Feedback submitted successfully!');
  }


  // Order Profile 

  public function orderprofile()
  {

    $orders = Order::where('user_id', auth()->id())->get();
    $admin_id = Auth::id();
    $user_address = DB::select('select * from user__addresses where user_id = ?', [$admin_id]);

    return view('order.order_profile', compact('user_address', 'orders'));
  }

  public function cupon(Request $request)
  {
    $code = $request->input('code'); // Retrieve the 'code' parameter

    $discount = DB::select('select Cupon_code, cupon_end_date from cupons where Cupon_code = ?', [$code]);

    if ($discount) {
      $current_date = date('Y-m-d'); // Get current date
      $end_date = $discount[0]->cupon_end_date;

      if ($current_date <= $end_date) {  // Check if coupon hasn't expired
        return response()->json([
          'message' => 'Valid coupon!',
          'discount' => 10
        ]);
      } else {
        return response()->json(['message' => 'Coupon has expired!'], 400);
      }
    } else {
      return response()->json(['message' => 'Invalid coupon!'], 400);
    }
  }

  //  Another Method
  //       $current_date = date('Y-m-d');
  //       $discount = DB::select('select * from cupons where Cupon_code = ? and cupon_end_date >= ?', [$code, $current_date]);

  // if ($discount) {
  //     return response()->json(['message' => 'Valid coupon!', 'discount' => 10]);
  // } else {
  //     return response()->json(['message' => 'Invalid or expired coupon!'], 400);
  // }
  //      } 




}
