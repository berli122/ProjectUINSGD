<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lembur;
use App\Models\Jabatan;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::with('jabatan', 'golongan')->get();
        $lemburs = Lembur::all('id')->count();
        $jabatans = Jabatan::all('id')->count();
        $juser = User::all('id')->count();

        $lemb = Lembur::select('id', 'tgl')->get()->groupBy(function ($lemb) {
            return Carbon::parse($lemb->tgl)->isoFormat('MMMM');
        });
        $monthlembur = [];
        $monthCountlembur = [];

        foreach ($lemb as $monthl => $values) {
            $monthlembur[] = $monthl;
            $monthCountlembur[] = count($values);
        }

        $users = User::select('id','created_at')->get()->groupBy(function ($users) {
            return Carbon::parse($users->created_at)->isoFormat('MMMM');
        });
        $months = [];
        $monthCount = [];

        foreach ($users as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }
        return view('home', ['user' => $user, 'users' => $users, 'months' => $months, 'monthCount' => $monthCount, 'lemb' => $lemb, 'monthlembur' => $monthlembur, 'monthCountlembur' => $monthCountlembur], compact('juser', 'lemburs', 'jabatans', ));

    }
}
