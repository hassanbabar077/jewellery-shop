<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\CarShowroom;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

  public function index()
  {
    $cart = Cart::where('user_id', Auth::user()->id)->get();
    $total = 0;
    foreach ($cart as $cartItem) {
      $data = CarShowroom::find($cartItem->car_showrooms_id);
      $total += $data->price * $cartItem->count;
    }

    return view('visitor.pages.checkout', compact('total'));
  }

}
