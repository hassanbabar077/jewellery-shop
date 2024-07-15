<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Query;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarShowroom;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalproduct = CarShowroom::get()->count();
        $totalUser = User::get()->count();
        $totalOrder = Order::get()->count();
        $order=Order::all();
        $total_revenue=0;
        foreach($order as $order)
        {
            $total_revenue =$total_revenue + $order->amount;
        }
        $total_delivered =Order::where('delivery_status','=','delivered')->get()->count();
        $total_processing =Order::where('delivery_status','=','processing')->get()->count();
        return view('admin.pages.dashboard',compact('totalUser','totalproduct','totalOrder','total_revenue','total_delivered','total_processing'));
    }

    // Orders 
    public function order()
    {
        $order = Order::orderBy('created_at','desc')->get();
        return view('admin.pages.order.index',compact('order'));
    }
// Order Status Change 
public function orderDelivered($id)
{
$order =Order::find($id);
$order->delivery_status ="delivered";
$order->save();
return redirect()->back()->with('message','Order Status Change successfully');
}
    public function query_list()
    {
        $query = Query::get();
        return view('admin.pages.query.index',compact('query'));
    }
}
