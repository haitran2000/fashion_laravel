<?php


namespace App\Http\Controllers\admin;


use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController
{
    public function index()
    {
        $order_details= Order_Detail::all();
        $orders = Order::paginate(10);
        return view('admin.order.index',compact('orders','order_details'));
    }
    public function index_today()
    {
        $day =Carbon::now()->day;
        $order_details= Order_Detail::all();
        $orders = Order::whereDate('created_at', Carbon::today())->get();
        return view('admin.order.index',compact('orders','order_details'));
    }
    public  function active(Request $request,Order $order)
    {
        if($request->changeStatus==0)
        {
            $order->status = $request->changeStatus;
        }
        else
        {
            $order->status = $request->changeStatus;
        }
        $order->save();
        return redirect()->back()->with('message', 'Status changed!');
    }
}
