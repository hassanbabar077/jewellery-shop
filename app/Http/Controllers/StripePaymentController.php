<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Cart;
use App\Models\Order;
use Stripe\StripeClient;
use Illuminate\View\View;
use App\Models\CarShowroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StripePaymentController extends Controller
{
    public function stripeCheckout(Request $request)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total = 0;
        // Fetch cart items and calculate total price
        foreach ($cart as $cartItem) {
            $data = CarShowroom::find($cartItem->car_showrooms_id);
            $total += $data->price * $cartItem->count;
        }
        // Fetch cart items for titles
        $titles = CarShowroom::whereIn('id', $cart->pluck('car_showrooms_id'))->pluck('title')->toArray();
        // Create line items for checkout session
        $lineItems = [];
        foreach ($titles as $title) {
            $lineItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $title,
                    ],
                    'unit_amount' => 100 * $total,
                    'currency' => 'USD',
                ],
                'quantity' => 1
            ];
        }
        // Create checkout session with authenticated user's email
        $response = $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'customer_email' => Auth::user()->email,
            'payment_method_types' => ['link', 'card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'allow_promotion_codes' => true,
        ]);
        // Redirect to Stripe checkout page
        return redirect($response['url']);
    }
    public function stripeCheckoutSuccess(Request $request)
    {
        // Add items to order table
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($cartItems as $cartItem) {
            Order::create([
                'user_id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'showroom_id' => $cartItem->car_showrooms_id,
                'quantity' => $cartItem->count,
                'amount' => $cartItem->carShowroom->price * $cartItem->count,
                'payment_status' => 'paid',
                'delivery_status' => 'processing',
                // Add other necessary fields to the order record
            ]);
        }
        // Clear user's cart
        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect()->route('jewellery.shop')
            ->with('message', 'Payment successful.');
    }
}
