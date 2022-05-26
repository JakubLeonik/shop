<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Product;

class CardController extends Controller
{
    public function index(){
        $card = auth()->user()->card;
        return view('card.index', [
            'card' => $card
        ]);
    }

    public function destroy(Product $product){
        $card = Card::find(auth()->user()->card->id);
        $products = json_decode($card->products, true);
        $ids = array_column($products, 'id');
        $key = array_search($product->id, $ids);
        dd($products); //$ids[$key]
        $card->products = json_encode($products);
        $card->save();
        return redirect()->route('card.index');
    }
}
