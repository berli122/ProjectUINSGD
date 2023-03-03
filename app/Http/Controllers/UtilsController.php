<?php

namespace App\Http\Controllers;
use DB;

class UtilsController extends Controller
{
    public function ChartBar()
    {
        $total_user = User::select(DB::raw("CAST(COUNT(id) as int) as total_user"))
            ->Groupby(BD::raw("Month(created_at)"))
            ->pluk('total_user');

        $bulan = User::select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->Groupby(BD::raw("MONTHNAME(created_at)"))
            ->pluk('bulan');

        return view('user.index', compact('total_user', 'data'));

    }
}
