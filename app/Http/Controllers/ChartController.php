<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use DB;
Use charts;

class ChartController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function index()
    {
        $bills = Bill::get();
        return view('charts.index',[
            'bills' => $bills
        ]);
//        $query = "
//            SELECT total, SUM(total) AS totol, DATE_FORMAT(created_at, '%M-%Y') AS created_at
//            FROM bills
//            GROUP BY DATE_FORMAT(created_at, '%m%')
//            ORDER BY DATE_FORMAT(created_at, '%Y-%m-%d') DESC
//            ";
//        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
////        $bill_total = Bill::select(\DB::raw("COUNT(*) as total"))
//            ->whereYear('created_at', date('Y'))
//            ->groupBy(\DB::raw("Month(created_at)"))
////            ->groupBy(\DB::raw("Day(created_at)"))
//            ->pluck('total');
////        $bill_total = Bill::get()->sum('total');
//
//        return view('charts.index', compact('bill_total'),[
//            'bills' => $bills
//        ]);
    }

//    public function makeChart($type)
//    {
//        switch ($type) {
//            case 'bar':
//                $bills = Bill::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
//                    ->get();
//                $chart = Charts::database($bills, 'bar', 'highcharts')
//                    ->title("Monthly new Register Users")
//                    ->elementLabel("Total Users")
//                    ->dimensions(1000, 500)
//                    ->responsive(true)
//                    ->groupByMonth(date('Y'), true);
//                break;
//
//            case 'pie':
//                $chart = Charts::create('pie', 'highcharts')
//                    ->title('HDTuto.com Laravel Pie Chart')
//                    ->labels(['Codeigniter', 'Laravel', 'PHP'])
//                    ->values([5,10,20])
//                    ->dimensions(1000,500)
//                    ->responsive(true);
//                break;
//
//            case 'line':
//                $chart = Charts::create('line', 'highcharts')
//                    ->title('HDTuto.com Laravel Line Chart')
//                    ->elementLabel('HDTuto.com Laravel Line Chart Lable')
//                    ->labels(['First', 'Second', 'Third'])
//                    ->values([5,10,20])
//                    ->dimensions(1000,500)
//                    ->responsive(true);
//                break;
//
//            default:
////# code...
//                break;
//        }
//        return view('charts.index', compact('chart'));
//    }
}
