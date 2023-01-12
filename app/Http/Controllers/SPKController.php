<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use App\Models\SPK;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SPKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $spk = SPK::with('user','pekerjaan','lembur')->paginate(10);
        $spks = SPK::where('id')->count();
        return view('spk.index', ['spk' => $spk], compact('spks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $peker = Pekerjaan::all();
        $spk = SPK::with('lembur');
        return view('spk.create',compact('peker','spk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([

            'peker' => ['nullable'],

        ]);

        $spk = new SPK();
        $spk->user_id = Auth::user()->id;
        $spk->pekerjaan_id = $request->peker;

        $spk->save();
        return redirect()->route('spk.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $spk = SPK::findOrFail($id);
        return view('spk.show', compact('spk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $spk = SPK::findOrFail($id);
        return view('spk.edit', compact('spk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'jepe' => 'required',
        ]);

        $spk = SPK::findOrFail($id);
        $spk->jepe = $request->jepe;
        $spk->lembur_id = $request->lembur;

        $spk->save();
        return redirect()->route('spk.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $spk = SPK::findOrFail($id);
        $spk->delete();
        return redirect()->route('spk.index')
            ->with('warning', 'Data berhasil dihapus!');
    }
}
