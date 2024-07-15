<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Livewire;
use Livewire\Component;
use App\Models\CarShowroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AddToCart extends Component
{
    
    public $dataId;
    public $cart = [];
    public $count = 0;
    public $total = 0;

    public function mount()
    {
        if (Auth::check()) {
            $this->loadCart();
        }
    }

    public function loadCart()
    {
        $this->cart = Cart::where('user_id', Auth::user()->id)->get();
        $this->count = count($this->cart);
        $this->total = $this->calculateTotal();
    }

    public function addToCart()
    {
        // Step 1: Check if the user is authenticated
        if (!Auth::check()) {
            session()->flash('message', 'Please login to add items to your cart.');
            return redirect()->to('/login'); // Redirect to the login page
        }
    
        // Step 2: Find the cart item based on the user's ID and the product's ID
        $user = Auth::user();
        $cartItem = Cart::where([
            'user_id' => $user->id,
            'car_showrooms_id' => $this->dataId->id,
        ])->first();
    
        // Step 3: If the cart item exists, update its quantity; otherwise, create a new cart item
        if (empty($cartItem)) {
            // If the item is not in the cart, add it
            $cartItem = new Cart();
            $cartItem->car_showrooms_id = $this->dataId->id;
            $cartItem->user_id = $user->id;
            $cartItem->count = 1;
            $cartItem->status = "pending";
            $cartItem->save();
        } else {
            // If the item is already in the cart, update the count
            $cartItem->increment('count');
        }
    
        // Step 4: Load the cart and redirect with a success message
        $this->loadCart();
        return redirect()->route('jewellery.shop')->with('message', 'Added To Cart Successfully');
    }
    


    public function render()
    {
       
        return view('livewire.add-to-cart');

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
    public function count()

    {
        $data = DB::table('carts')->get();
        $badge = 0;
        foreach ($data as $it) {
            $badge++;
        }
        return $badge;
    }
    
}

