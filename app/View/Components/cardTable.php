<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardTable extends Component
{
    public $products;
    public $card;
    public $totalPrice = 0;

    public function __construct($productsJSON, $card)
    {
        $this->card = $card;
        $this->products = json_decode($productsJSON);
    }

    public function partlyTotalPirce($product){
        return $product->price*$product->quantity_in_card;
    }

    public function render()
    {
        return view('components.card-table');
    }
}
