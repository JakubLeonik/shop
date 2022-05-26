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

    public function store(Product $product){
        $card = Card::find(auth()->user()->card->id);
        $products = json_decode($card->products, true);
        if($products === null) $products = [];
        $key = array_key_first(array_filter($products, function ($p) use ($product) {
            return $p['id'] === $product->id;
        }));
        if(is_null($key)){
            if($product->quantity < 1) {
                return redirect()->back()->withErrors(['error' => 'No products avaliable']);
            }
            $product = array_slice($product->toArray(), 0, 4);
            $product['quantity_in_card'] = 1;
            array_push($products, $product);
        }
        else{
            $products[$key]['quantity_in_card'] = $products[$key]['quantity_in_card']+1;
            if($product->quantity < $products[$key]['quantity_in_card']) {
                return redirect()->back()->withErrors(['error' => 'Not enough products avaliable']);
            }
        }
        $card->products = json_encode($products);
        $card->save();
        return redirect()->route('card.index');
    }

    public function destroy(Product $product){
        $card = Card::find(auth()->user()->card->id);
        $products = json_decode($card->products, true);
        $key = array_key_first(array_filter($products, function ($p) use ($product) {
            return $p['id'] === $product->id;
        }));
        unset($products[$key]);
        $card->products = json_encode($products);
        $card->save();
        return redirect()->route('card.index');
    }
    public function truncate(){
        $card = Card::find(auth()->user()->card->id);
        $card->products = '';
        $card->save();
        return redirect()->route('card.index');
    }
}
