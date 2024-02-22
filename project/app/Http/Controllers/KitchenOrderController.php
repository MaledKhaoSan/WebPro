<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Menu;
use Illuminate\Http\Request;

class KitchenOrderController extends Controller
{
    public function index(Request $request)
    {
        $inProcessCount = Order::whereIn('order_status', ['pending', 'in-process'])->count();
        $completeCount = Order::whereIn('order_status', ['complete', 'paid'])->count();

        $query = Order::with('orderDetails');

        if ($request->input('canceledDisplay')) {
            $query->where('order_status', 'cancel');
        }

        elseif ($request->input('inprocessDisplay')) {
            $query->whereIn('order_status', ['in-process', 'pending']);
        }

        elseif ($request->input('completeDisplay')) {
            $query->whereIn('order_status', ['complete', 'paid']);
        }
        else {
            $query->whereIn('order_status', ['in-process', 'pending', 'complete', 'paid', 'cancel']);
        }

        $order = $query->get();

        return view('kitchenorder', [
            'order' => $order,
            'inProcessCount' => $inProcessCount,
            'completeCount' => $completeCount
        ]);
    }





    public function updateOrderStatus($orderId)
    {
        // Update the order_status to 'in-process' for the specified order
        Order::where('order_id', $orderId)->update(['order_status' => 'in-process']);
    
        $title = 'อัพเดทสถานะออเดอร์สำเร็จ';
        $message = 'เริ่มทำออเดอร์หมายเลข ' . $orderId . ' แล้ว';
        return back()->with('alert', ['title' => $title, 'message' => $message]);

    }

    public function completeOrderStatus($orderId)
    {
        // Update the order_status to 'in-process' for the specified order
        Order::where('order_id', $orderId)->update(['order_status' => 'complete']);
        
        $title = 'อัพเดทสถานะออเดอร์สำเร็จ';
        $message = 'กำลังนำออเดอร์หมายเลข ' . $orderId . ' ไปเสิร์ฟ';
    
        return back()->with('alert', ['title' => $title, 'message' => $message]);
    }
    
    
    public function updateOrderStage(Request $request, $orderId, $menuId)
    {
        // Update the order_stage to 'กำลังทำ'
        OrderDetail::where('order_id', $orderId)
            ->where('menu_id', $menuId)
            ->update(['order_stage' => 'กำลังทำ']);
    
        return redirect()->back()->with('success', 'Order stage updated successfully');
    }

    public function completeOrderStage(Request $request, $orderId, $menuId)
    {
        // Update the order_stage to 'กำลังทำ'
        OrderDetail::where('order_id', $orderId)
            ->where('menu_id', $menuId)
            ->update(['order_stage' => 'เสร็จแล้ว']);
    
        return redirect()->back()->with('success', 'Order stage updated successfully');
    }
    
    
}


