<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Menu;
use App\Models\Order;

date_default_timezone_set('Asia/Bangkok');

class SMainController extends Controller
{
    public function index()
    {
        // get only today trans using trans_date field
        $trans = Transaction::whereDate('trans_date', date("Y-m-d"))->get();
        // sum the number of amount of transactions
        $total = $trans->sum('amount');
        // dd($trans);
        $tops = Menu::orderBy('sales', 'desc')->take(3)->get();
        // dd($tops);
        // sum the number of pending order
        $pending = Order::where('order_status', 'pending')->count();


        return view('staff-main', [
            'total' => $total,
            'tops' => $tops,
            'pending' => $pending,
        ]);
    }

}
