<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function create(){
        $card = auth()->user()->card;
        return view('order.create', [
            'card' => $card
        ]);
    }
    public function store(){
        dd(request()->all());
        $attributes = request()->validate([
            'card_holder_name' => ['string', 'required'],
            'delivery_address' => 'required',
            'city_or_town_name' => ['string', 'required'],
            'zip_code' => 'required',
            'paymentMethod' => 'required'
        ]);
        $delivery_data = json_encode([
            'name' => $attributes['card_holder_name'],
            'delivery_address' => $attributes['delivery_address'],
            'city_or_town_name' => $attributes['city_or_town_name'],
            'zip_code' => $attributes['zip_code']
        ]);

    }
}
