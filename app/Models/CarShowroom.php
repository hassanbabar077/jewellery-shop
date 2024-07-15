<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarShowroom extends Model
{
    use HasFactory;
      protected $fillable = [
        'title',
        'content', 
        'main_image', 
        'loction', 
        'model', 
        'cd_player',
        'price', 
        'rating'
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class,'car_showrooms_id');
    }
}
