<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Menu;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Table;

date_default_timezone_set('Asia/Bangkok');

class SMainController extends Controller
{
    public function index()
    {
        // get only today trans using trans_date field
        $trans = Transaction::whereDate('trans_date', date("Y-m-d"))->get();
        // get only yesterday trans using trans_date field
        $yesterday = date("Y-m-d", strtotime("-1 days"));
        $trans_ = Transaction::whereDate('trans_date', $yesterday)->get();
         

        // sum the number of amount of transactions
        $total = $trans->sum('amount');
        $total_ = $trans_->sum('amount');
        $raises = number_format(($total * 100 / $total_) - 100, 2);
        // dd($trans);
        $tops = Menu::orderBy('sales', 'desc')->take(3)->get();
        // dd($tops);
        // sum the number of pending order
        $pending = OrderDetail::where('order_stage', 'เสร็จแล้ว')->count();
        // sum the number of avail table
        $avail = Table::where('table_status', 'ว่าง')->count();

        // get ready to serve order from order detail
        $ready = OrderDetail::where('order_stage', 'เสร็จแล้ว')->get();
        // filter out the complete order
        $ready = $ready->filter(function ($value, $key) {
            return $value->order->order_status != 'complete';
        });

        return view('staff-main', [
            'total' => $total,
            'raises' => $raises,
            'tops' => $tops,
            'pending' => $pending,
            'avail' => $avail,
            'ready' => $ready
        ]);
    }

}
