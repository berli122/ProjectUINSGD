<?php

namespace App\Http\Controllers;

use App\Models\SPK;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PrintController extends Controller
{
    function print() {
        $spk = SPK::all();
        return view('spk.print', compact('spk'));

    }

    public function printView()
    {
        return view('spk.printT');
    }

    public function printT($tglawal, $tglakhir)
    {
        // dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);
        if ($tglawal <= $tglakhir) {
            $printView = SPK::with('user', 'pekerjaan', 'lembur')->whereBetween('created_at', [$tglawal, $tglakhir])->get();
            return view('spk.printView', compact('printView'));
            // $pdf = Pdf::loadView('spk.printView', ['printView' => $printView])->setPaper('a4', 'landscape');
            // return $pdf->stream()->view('spk.printView', compact('printView'));;
        } else {
            Alert::error('Noted', 'Tanggal tidak valid');
            return back();
        }

    }

    public function generatePdf()
    {
        $spk = SPK::all();
        $pdf = PDF::loadView('print', ['spk' => $spk])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function laporan(Request $request)
    {
        $start = $request->tanggal_awal;
        $end = $request->tanggal_akhir;

        if ($end >= $start) {
            $spk = SPK::whereBetween('created_at', [$start, $end])->get();
            $pdf = PDF::loadview('spk.print', compact('spk', 'start', 'end'))->setPaper('a4', 'landscape');
            return $pdf->stream('laporan.pdf');
        } elseif ($end < $start) {
            Alert::error('Tanggal yang anda masukkan tidak valid', 'Oops!')->persistent("Ok");
            return back();
        }
    }

    public function singlePrint($id)
    {
        $spk = SPK::findOrFail($id);
        $pdf = PDF::loadView('singlePrint', ['spk' => $spk])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
