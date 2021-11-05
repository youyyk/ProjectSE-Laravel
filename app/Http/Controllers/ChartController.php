<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Phattarachai\LineNotify\Facade\Line;
use function PHPUnit\Framework\returnArgument;

class ChartController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function index()
    {
        return $this->dayBar();
    }

    public function notifyTotal(){
        $todayDate = date("Y-m-d");
        $bill_total_today = Bill::whereDate('created_at', Carbon::today())->sum('total');

        Line::send("\nยอดขายประจำวันนี้ ". $todayDate .
            "\nมีค่าเท่ากับ " . $bill_total_today ." บาท"
        );
        return redirect()->back();
    }

    public function dayBar()
    {
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereMonth('created_at', date('m'))
            ->groupBy(\DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
            ->pluck('total');
        $groupDate = Bill::select(DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d')) as newDate"))
            ->whereMonth('created_at', date('m'))
            ->distinct()->orderBy('newDate')->pluck('newDate');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        return view('charts.chart_day.bar', compact('bill_total', 'groupDate'),[
            'bills' => Bill::orderBy('created_at', 'DESC')->get(),
            'groupDate' => $groupDate
        ]);
    }

    public function monthBar()
    {
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('total');
        $groupDate = Bill::select(DB::raw("(DATE_FORMAT(created_at, '%m')) as newDate"))
            ->whereYear('created_at', date('Y'))
            ->distinct()->orderBy('newDate')->pluck('newDate');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        for ( $i = 0; $i < count($groupDate); $i++) {
            if ($groupDate[$i] == "01") {
                $groupDate[$i] = "Jan.";
            }
            elseif ($groupDate[$i] == "02") {
                $groupDate[$i] = "Feb.";
            }
            elseif ($groupDate[$i] == "03") {
                $groupDate[$i] = "Mar.";
            }
            elseif ($groupDate[$i] == "04") {
                $groupDate[$i] = "Apr.";
            }
            elseif ($groupDate[$i] == "05") {
                $groupDate[$i] = "May.";
            }
            elseif ($groupDate[$i] == "06") {
                $groupDate[$i] = "Jun.";
            }
            elseif ($groupDate[$i] == "07") {
                $groupDate[$i] = "Jul.";
            }
            elseif ($groupDate[$i] == "08") {
                $groupDate[$i] = "Aug.";
            }
            elseif ($groupDate[$i] == "09") {
                $groupDate[$i] = "Sep.";
            }
            elseif ($groupDate[$i] == "10") {
                $groupDate[$i] = "Oct.";
            }
            elseif ($groupDate[$i] == "11") {
                $groupDate[$i] = "Nov.";
            }
            elseif ($groupDate[$i] == "12") {
                $groupDate[$i] = "Dec.";
            }
        }

        return view('charts.chart_month.bar', compact('bill_total', 'groupDate'),[
            'bills' => Bill::orderBy('created_at', 'DESC')->get(),
            'groupDate' => $groupDate
        ]);
    }

    public function yearBar()
    {
        $bills = Bill::orderBy('created_at', 'DESC')->get();
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Year(created_at)"))
            ->pluck('total');
        $groupDate = Bill::select(DB::raw("(DATE_FORMAT(created_at, '%Y')) as newDate"))
            ->whereYear('created_at', date('Y'))
            ->distinct()->orderBy('newDate')->pluck('newDate');

        for ( $i = 0; $i < count($bill_total); $i++) {
            $bill_total[$i] = $bill_total[$i]*1;
        }

        return view('charts.chart_year.bar', compact('bill_total', 'groupDate'),[
            'bills' => Bill::orderBy('created_at', 'DESC')->get(),
            'groupDate' => $groupDate
        ]);
    }
}
