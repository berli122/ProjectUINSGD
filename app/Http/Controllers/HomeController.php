<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Lembur;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function getKliping()
    {
        $data = Lembur::select('*')
                ->join('tb_kat_berita', 'tb_kliping.id_kat_berita', '=', 'tb_kat_berita.id_kat_berita')
                ->where('tb_kliping.id_stat_kliping', 2)
                ->limit(100)
                ->get();
        return DataTables::of($data)->make(true);
    }
}
