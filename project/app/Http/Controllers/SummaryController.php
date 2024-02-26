<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class SummaryController extends Controller
{
    public function index()
    {
        $chart_options = [
            'name' => 'daysummary',
            'chart_title' => 'ยอดขายประจำวัน',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Transaction',
            'group_by_field' => 'trans_time',
            // 'group_by_period' => 'day',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'filter_field' => 'trans_date',
            'filter_days' => 1,
            'continuous_time' => false,
            'chart_color' => '220,20,60',
        ];
        $chartday = new LaravelChart($chart_options);

        


        $chart_options = [
            'name' => 'weeksummary',
            'chart_title' => 'ยอดขายประจำสัปดาห์',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Transaction',
            'group_by_field' => 'trans_date',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'filter_field' => 'trans_date',
            'filter_period' => 'week',
            'continuous_time' => false,
            'chart_color' => '220,20,60',
        ];
        $chartweek = new LaravelChart($chart_options);

        $chart_options = [
            'name' => 'monthsummary',
            'chart_title' => 'ยอดขายประจำเดือน',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Transaction',
            'group_by_field' => 'trans_date',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'filter_field' => 'trans_date',
            'filter_period' => 'month',
            'continuous_time' => false,
            'chart_color' => '220,20,60',
            'entries_number' => '5',
        ];
        
        $chartmonth = new LaravelChart($chart_options);
        
        return view('summary', compact('chartday', 'chartweek', 'chartmonth'));
    }
}


