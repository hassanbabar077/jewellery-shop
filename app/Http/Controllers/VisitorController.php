<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Query;
use App\Models\Service;
use App\Models\CarShowroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class VisitorController extends Controller
{
    public function index()
    {
        return view('visitor.pages.index');
    }
    public function about()
    {
        return view('visitor.pages.about');
    }
    public function shop(Request $request)
    {
        $query = CarShowroom::query();

    if ($request->has('search')) {
        $searchTerm = $request->search;
        $query->where('title', 'like', "%{$searchTerm}%");
    }

    // Include records from the "upcoming" category
    $upcomingRecords = CarShowroom::where('category', 'upcoming')->get();

    // Filter "new" category records if there's a search query
    $newRecords = $query->where('category', 'new')->get();

    // Merge the collections to get all records
    $record = $upcomingRecords->merge($newRecords);
    
        return view('visitor.pages.products', compact('record'));
    }
    public function contact()
    {
        return view('visitor.pages.contact');
    }
    public function query(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phonenumber' => 'required|numeric|digits:11',
            'query' => 'required',
            'address' => 'required',
        ]);
        $data = $request->all();
        Query::create($data);
        return redirect()->back()->with('message', 'Your message has been send');
    }

    public function cart()
    {
        return view('visitor.includes.navbar');
    }

    public function visitororder()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Retrieve the currently authenticated user's ID
            $user_id = auth()->user()->id;

            // Retrieve orders for the authenticated user
            $orders = Order::where('user_id', $user_id)->get();

            // Pass the orders to the view
            return view('visitor.pages.order', compact('orders'));
        }
    }
    public function cancelorder($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'you canceled the Order';
        $order->save();
        return redirect()->back()->with('message', 'Order canceled');
    }
}
