<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Models\CarShowroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShoppinCart extends Component
{
    public $cart = [];
    public $badge = 0;
    public $total = 0;
    public $count = 0;
    public $quantities = [];

    public function mount()
    {
        if (Auth::check()) {
            $this->loadCart();
        }
    }

    public function loadCart()
    {
        $this->cart = Cart::where('user_id', Auth::user()->id)->get();
        $this->badge = count($this->cart);
        $this->total = $this->calculateTotal();
        $this->count = $this->count();
        $this->quantities = [];
        foreach ($this->cart as $cartItem) {
            $productId = $cartItem->car_showrooms_id;
            $quantity = $cartItem->count;
            $this->quantities[$productId] = $quantity;
        }
        // dd( $this->quantities);
       
    }

    public function removeFromCart(int $itemId)
    {
        $cartItem = Cart::where('user_id', Auth::user()->id)->where('car_showrooms_id', $itemId)->first();

        if ($cartItem) {
            $cartItem->delete();
            $this->loadCart();
            return redirect()->to('/jewellery-shop')->with('message', 'Cart Item Removed Successfully');
        } else {
            return redirect()->to('/jewellery-shop')->with('error', 'Something Went Wrong');
        }
    }

    public function emptyCart()
    {
        Cart::where('user_id', Auth::user()->id)->delete();
        $this->loadCart();
        return redirect()->to('/jewellery-shop')->with('message', 'Empty Cart Successfully');
    }

    public function render()
    {
        $cartItems = CarShowroom::whereIn('id', collect($this->cart)->pluck('car_showrooms_id'))->get();
     
        return view('livewire.shoppin-cart', compact('cartItems'));
    }

    public function count()

    {
        $data = DB::table('carts')->get();
        $badge = 0;
        foreach ($data as $it) {
            $badge++;
        }
      
        return $badge;
       
    }
  






    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->cart as $cartItem) {
            $data = CarShowroom::find($cartItem->car_showrooms_id);
            $total += $data->price * $cartItem->count;
        }
        return $total;
    }
    public function checkOut()
    {
        return view('livewire.check-out');
    }
}
