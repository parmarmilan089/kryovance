<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout() {
        $data = [];
        $data['title'] = 'Checkout';
        $data['menu_active_tab'] = 'checkout';
        $data['cartItems'] = session()->get('cart', []);

        // Calculate subtotal
        $data['subtotal'] = collect($data['cartItems'])->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('user.checkout')->with($data);
    }
}
