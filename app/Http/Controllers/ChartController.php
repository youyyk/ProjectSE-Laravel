<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use DB;

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
    }

    public function dayLine()
    {
        $bills = Bill::get();
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Day(created_at)"))
            ->pluck('total');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        return view('charts.chart_day.index', compact('bill_total'),[
            'bills' => $bills
        ]);
    }

    public function dayBar()
    {
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Day(created_at)"))
            ->pluck('total');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        return view('charts.chart_day.bar', compact('bill_total'));
    }

    public function monthLine()
    {
        $bills = Bill::get();
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('total');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        return view('charts.chart_month.index', compact('bill_total'),[
            'bills' => $bills
        ]);
    }

    public function monthBar()
    {
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('total');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        return view('charts.chart_month.bar', compact('bill_total'));
    }

    public function yearLine()
    {
        $bills = Bill::get();
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Year(created_at)"))
            ->pluck('total');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        return view('charts.chart_year.index', compact('bill_total'),[
            'bills' => $bills
        ]);
    }

    public function yearBar()
    {
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Year(created_at)"))
            ->pluck('total');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        return view('charts.chart_year.bar', compact('bill_total'));
    }

//    public function monthPie()
//    {
//        $bill_total['pie'] = Bill::select(\DB::raw("SUM(total) as total"), \DB::raw("Month(created_at) as month_name"))
//            ->whereYear('created_at', date('Y'))
//            ->groupBy('month_name')
//            ->orderBy('total');
////            ->pluck('total');
//
////        for ( $i = 0; $i < count($bill_total); $i++) {
////            $bill_total[$i] = $bill_total[$i]*1;
////        }
//
//        return view('charts.chart_month.pie', $bill_total);
//    }
}
