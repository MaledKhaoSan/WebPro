<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($menuId)
    {
        $cart = session('cart', []);
        $cart[] = ['menu_id' => $menuId, 'quantity' => 1];
        session(['cart' => $cart]);

        return response()->json(['success' => true]);
    }

}
