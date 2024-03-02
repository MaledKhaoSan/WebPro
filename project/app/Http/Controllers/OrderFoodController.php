<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderFoodController extends Controller
{


    public function confirmOrder()
    {
        // Assuming you have some logic to prepare data for the confirmation page
        $orderDetails = session('orderDetails', []);

        return view('confirmOrder', compact('orderDetails'));
    }

    public function index(Request $request)
    {
        
        $orderDetails = Session::get('orderDetails', []);
        $categories = Category::with('menus')->get();
        return view('orderFood', compact('categories', 'orderDetails'));
    }


    public function addToCart(Request $request)
{
    $menuId = $request->input('menuId');
    $quantity = $request->input('quantity');

    // Get the existing orderDetails from the session
    $orderDetails = session('orderDetails', []);

    // Check if the menuId already exists in orderDetails
    $existingItemKey = array_search($menuId, array_column($orderDetails, 'menu_id'));

    if ($existingItemKey !== false) {
        // If the menuId exists, update the quantity
        $orderDetails[$existingItemKey]['quantity'] += $quantity;
    } else {
        // If the menuId doesn't exist, add a new item
        $orderDetails[] = ['menu_id' => $menuId, 'quantity' => $quantity];
    }

    // Update the session with the modified orderDetails
    session(['orderDetails' => $orderDetails]);

    // Return JSON response for the AJAX request
    $responseData = ['menuId' => $menuId, 'quantity' => $quantity];

    // Also include alert details in the response
    $alertData = ['title' => 'title', 'message' => 'message'];

    return response()->json(['data' => $responseData, 'alert' => $alertData]);
}

}
