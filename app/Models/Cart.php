<?php

namespace App\Models;

use App\Models\CarShowroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =['count','user_id','status'];


    public function carShowroom()
    {
        return $this->belongsTo(CarShowroom::class, 'car_showrooms_id');
    }
}
