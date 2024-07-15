<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\CarShowroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function cashOndeliver(Request $request)
    {
        $user = Auth::user();
        $totalQuantity = null; // Initialize total quantity
        // Get cart items and calculate total quantity
        $cartItems = Cart::with('carShowroom')->where('user_id', $user->id)->get();

        foreach ($cartItems  as $cartItem) {
            $productId = $cartItem->car_showrooms_id;
            $totalQuantity[$productId] = $cartItem->count;
        }
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $data = CarShowroom::find($cartItem->car_showrooms_id);
            $total += $data->price * $cartItem->count;
        }
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:11',
            'address' => 'required',
            'color' => 'required|alpha',
        ]);
        foreach ($cartItems as $cartItem) {
            $order = new Order;
            $order->user_id = $cartItem->user_id;
            $order->name = $request->name;
            $order->phone = $request->phone; // Corrected variable name
            $order->address = $request->address;
            $order->showroom_id = $cartItem->car_showrooms_id;
            $order->color = $request->color;
            $order->quantity = $totalQuantity[$cartItem->car_showrooms_id];
            $order->amount = $total;
            $order->delivery_status = 'processing';
            $order->payment_status = 'cash on delivery';
            $order->save();
            $cart_id = $cartItem->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'We Have Received your order. We Will Connect You Soon!');
    }
}
