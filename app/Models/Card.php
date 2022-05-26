<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function totalPrice(){
        $productsArray = json_decode($this->products);
        $totalPrice = 0;
        if($productsArray ?? false){
            foreach ($productsArray as $product){
                $totalPrice += ($product->quantity_in_card * $product->price);
            }
        }
        return $totalPrice;
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
