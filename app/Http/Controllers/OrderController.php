<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;

class OrderController extends Controller
{
    public function create(){
        $card = auth()->user()->card;
        return view('order.create', [
            'card' => $card
        ]);
    }
    public function store(){
        $attributes = request()->validate([
            'card_holder_name' => ['string', 'required'],
            'delivery_address' => 'required',
            'city_or_town_name' => ['string', 'required'],
            'zip_code' => 'required'
        ]);
        $delivery_data = json_encode([
            'name' => strip_tags($attributes['card_holder_name']),
            'delivery_address' => strip_tags($attributes['delivery_address']),
            'city_or_town_name' => strip_tags($attributes['city_or_town_name']),
            'zip_code' => strip_tags($attributes['zip_code'])
        ]);
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'card' => json_encode(auth()->user()->card),
            'delivery_data' => $delivery_data,
            'status' => 'bought',
            'totalPrice' => auth()->user()->card->totalPrice()
        ]);
        $card = auth()->user()->card;
        $card->products = '';
        $card->save();
        return redirect()->route('orders.payment', ['order' => $order]);
    }
    public function payment(Order $order){
        return view('order.payment', [
            'order' => $order
        ]);
    }
    public function processPayment(Order $order){
//        dd(request()->all());
        try {
            auth()->user()->charge($order->totalPrice * 100, request('paymentMethod'));
            $order->status = "paid";
            $order->save();
            return redirect()->route('shop.dashboard')->with(['orderStatus' => 'Success!']);
        } catch (Exception $e) {
            return redirect()->route('orders.payment', [
                'order' => $order
            ])->withErrors('Payment Faild - '.$e->getMessage());
        }
    }
}
