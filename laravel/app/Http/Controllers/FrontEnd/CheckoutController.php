<?php


namespace App\Http\Controllers\FrontEnd;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('frontend.checkout.index');
    }
    public function confirm(Request $request)
    {
        $total=0;
        foreach (Session::get('cart') as $key => $cart) {
           $total=+($cart['price']*$cart['quantity']);
        }
       $order= new Order;
       $order->user_id=Auth::user()->id;
       $order->total=$total;
       $order->payment_id=1;
       $order->status=0;
       $order->save();
        if(Session::has('cart')) {
            foreach (Session::get('cart') as $key => $cart) {
                $order_detail = new Order_Detail;
                $order_detail->order_id = $order->id;
               $order_detail->product_id = $cart['product_id'];
               $order_detail->quantity=$cart['quantity'];
                $order_detail->status=1;
               $order_detail->save();
            }
       }
        Session::forget('cart');
        return view('frontend.checkout.success');
    }
}
