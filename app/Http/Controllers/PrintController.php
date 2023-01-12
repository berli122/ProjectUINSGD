<?php

namespace App\Http\Controllers;

use App\Models\SPK;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function index()
    {
        $spk = SPK::with('user','pekerjaan','lembur')->paginate(15);
        return view('spk.print', ['spk' => $spk]);
    }
}
