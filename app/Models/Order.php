<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'user_id',
        'showroom_id',
        'quantity',
        'amount',
        'color',
        'payment_status',
        'delivery_status',
    ];
}
