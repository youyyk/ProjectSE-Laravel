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
        $bill_total = Bill::select(\DB::raw("SUM(total) as total"))
//        $bill_total = Bill::select(\DB::raw("COUNT(*) as total"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
//            ->groupBy(\DB::raw("Day(created_at)"))
            ->pluck('total');
//        $bill_total = Bill::get()->sum('total');

        return view('charts.index', compact('bill_total'));
    }
}
