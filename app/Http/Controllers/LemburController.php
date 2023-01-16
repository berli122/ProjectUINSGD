<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class LemburController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lemburs = Lembur::all('id')->count();
        $lembur = Lembur::with('user')->paginate(10);
        return view('lembur.index', ['lembur' => $lembur], compact('lemburs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lembur.create');
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

            'tgl' => ['required','date'],
            'dari' => 'required',
            'sampai' => 'required',
            'kgtn' => 'required',
            'urai' => 'required|max:225',

        ]);

        $lembur = new Lembur();
        $lembur->tgl = $request->tgl;
        $lembur->dari = $request->dari;
        $lembur->sampai = $request->sampai;
        $lembur->kgtn = $request->kgtn;
        $lembur->urai = $request->urai;
        $lembur->user_id = Auth::user()->id;

        if ($lembur->tgl > \Carbon\Carbon::now()) {
            return back();
        } else {
            $lembur->save();
            return redirect()->route('lembur.index')
                ->with('success', 'Data berhasil dibuat!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $lembur = Lembur::findOrFail($id);
        return view('lembur.show', compact('lembur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $lembur = Lembur::findOrFail($id);
        return view('lembur.edit', compact('lembur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([

            'tgl' => 'required|date',
            'dari' => 'required',
            'sampai' => 'required',
            'kgtn' => 'required',
            'urai' => 'required|max:225',

        ]);

        $lembur = Lembur::findOrFail($id);
        $lembur->tgl = $request->tgl;
        $lembur->dari = $request->dari;
        $lembur->sampai = $request->sampai;
        $lembur->kgtn = $request->kgtn;
        $lembur->urai = $request->urai;

        $lembur->save();

        return redirect()->route('lembur.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lembur  $lembur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $lembur = Lembur::findOrFail($id);
        $lembur->delete();
        return redirect()->route('lembur.index')
            ->with('warning', 'Data berhasil dihapus!');
    }


}
