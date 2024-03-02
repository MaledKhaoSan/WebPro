<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class SummaryController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Bangkok');
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
            'range_date_end' => date("Y-m-d", strtotime('+1 days')),
            'range_date_start' => date("Y-m-d"),
            'continuous_time' => false,
            'chart_color' => '220,20,60',
            'style_class' => 'p-5 scale-90',
            // 'chart_height' => '300px',
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
            'range_date_end' => date("Y-m-d", strtotime('+1 days')),
            'range_date_start' => date("Y-m-d", strtotime("-6 days")),
            'continuous_time' => true,
            'chart_color' => '220,20,60',
            'style_class' => 'p-5 scale-90',
            // 'chart_height' => '300px',
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
            'range_date_end' => date("Y-m-d", strtotime('+1 days')),
            'range_date_start' => date("Y-m-d", strtotime("-31 days")),
            'continuous_time' => true,
            'chart_color' => '220,20,60',
            // 'entries_number' => '5',
            'style_class' => 'p-5 scale-90',
        ];
        
        $chartmonth = new LaravelChart($chart_options);

        $chart_options = [
            'name' => 'yearsummary',
            'chart_title' => 'ยอดขายประจำปี',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Transaction',
            'group_by_field' => 'trans_date',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'filter_field' => 'trans_date',
            'range_date_end' => date("Y-m-d", strtotime('+31 days')),
            'range_date_start' => date("Y-m-d", strtotime("-31 days")),
            'continuous_time' => true,
            'chart_color' => '220,20,60',
            // 'entries_number' => '5',
            'style_class' => 'p-5 scale-90',
        ];
        

        $chartyear = new LaravelChart($chart_options);
        
        return view('summary', compact('chartday', 'chartweek', 'chartmonth', 'chartyear'));
    }
}


