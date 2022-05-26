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
        if($this->products ?? false){
            foreach ($this->products as $product){
                $this->totalPrice += ($product->quantity_in_card * $product->price);
            }
        }
    }

    public function partlyTotalPirce($product){
        return $product->price*$product->quantity_in_card;
    }

    public function render()
    {
        return view('components.card-table');
    }
}
