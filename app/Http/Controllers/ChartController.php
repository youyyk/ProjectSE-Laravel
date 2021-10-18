<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Phattarachai\LineNotify\Facade\Line;

class ChartController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function index()
    {
        $groupTotalByDay = Bill::select(\DB::raw("SUM(total) as total"))
                                ->groupBy(\DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
                                ->pluck('total');
        $groupDate = Bill::select(DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d')) as newDate"))
                            ->distinct()->orderBy('newDate', 'DESC')->get();
        return view('charts.index',[
            'bills' => Bill::orderBy('created_at', 'DESC')->get(),
            'groupTotalByDay' => $groupTotalByDay,
            'groupDate' => $groupDate
        ]);
    }

    public function notifyTotal(){
        $todayDate = date("Y-m-d");
        $bill_total_today = Bill::whereDate('created_at', Carbon::today())->sum('total');

        Line::send("\nยอดขายประจำวันนี้ ". $todayDate .
            "\nมีค่าเท่ากับ " . $bill_total_today ." บาท"
        );
        return redirect()->back();
    }

    public function dayLine()
    {
        $bills = Bill::get();
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
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
