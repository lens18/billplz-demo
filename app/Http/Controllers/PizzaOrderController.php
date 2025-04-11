<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaOrderController extends Controller
{
    public function order_pizza()
    {
        return view('pizza-order');
    }

    public function calculateBill(Request $request)
    {
        $request->validate([
            'size' => 'required|in:small,medium,large',
            'pepperoni' => 'required|boolean',
            'extra_cheese' => 'required|boolean',
        ]);

        $prices = [
            'small' => 15,
            'medium' => 22,
            'large' => 30,
        ];

        $toppingPrices = [
            'pepperoni_small' => 3,
            'pepperoni_medium' => 5,
            'pepperoni_large' => 5,
            'extra_cheese' => 6,
        ];

        $size = $request->input('size');
        $price = $prices[$size] ?? 0;

        if ($request->input('pepperoni')) {
            $price += $toppingPrices["pepperoni_{$size}"];
        }

        if ($request->input('extra_cheese')) {
            $price += $toppingPrices['extra_cheese'];
        }

        return back()->with('total', $price);
    }
}
