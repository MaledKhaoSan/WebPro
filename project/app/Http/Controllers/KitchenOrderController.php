<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class KitchenOrderController extends Controller
{

    public function index()
    {

        $order = Order::with('orderDetails')->get();
    
        return view('kitchenorder', [
            'order' => $order,
        ]);
    }
}


