<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardTable extends Component
{
    public $products;
    public $totalPrice = 0;

    public function __construct($productsJSON)
    {
        $this->products = json_decode($productsJSON);
        foreach ($this->products as $product){
            $this->totalPrice += ($product->quantity * $product->price);
        }
    }

    public function partlyTotalPirce($product){
        return $product->price*$product->quantity;
    }

    public function render()
    {
        return view('components.card-table');
    }
}
