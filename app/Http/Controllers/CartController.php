<?php

namespace App\Http\Controllers;

use App\Models\CarShowroom;

class CartController extends Controller
{
    public function index()
    {
        
        $cartItems = CarShowroom::all();
        return view('livewire.shoppin-cart', compact('cartItems'));
    }
}
