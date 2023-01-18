<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->hasRole('admin')) {
            $lembur = Lembur::with('user')->paginate(15);
        } else{
            $lembur = Lembur::with('user')->where('user_id', Auth::user()->id)->paginate(15);
        }
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
        $validated = $request->validate(
            [
                'tgl' => ['required', 'date'],
                'dari' => 'required',
                'sampai' => 'required',
                'kgtn' => ['required', 'min:5', 'max:10'],
                'urai' => ['required', 'min:5', 'max:255'],
            ],
            [
                'kgtn.min' => 'Kegiatan minimal :min digit',
                'kgtn.max' => 'Kegiatan maximal :max digit',
                'urai.min' => 'Kegiatan minimal :min digit',
                'urai.max' => 'Kegiatan maximal :max digit',
            ]
        );

        $lembur = new Lembur();
        $lembur->tgl = $request->tgl;
        $lembur->dari = $request->dari;
        $lembur->sampai = $request->sampai;
        $lembur->kgtn = $request->kgtn;
        $lembur->urai = $request->urai;
        $lembur->user_id = Auth::user()->id;

        if ($lembur->tgl > \Carbon\Carbon::now()) {
            Alert::error('Perhatian', 'Input tanggal tidak boleh melebihi tanggal hari ini');
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
        $validated = $request->validate(
            [

                'tgl' => 'required|date',
                'dari' => 'required',
                'sampai' => 'required',
                'kgtn' => ['required', 'min:5', 'max:10'],
                'urai' => ['required', 'min:5', 'max:255'],

            ],
            [
                'kgtn.min' => 'Kegiatan tidak boleh kurang dari 5 digit',
                'kgtn.max' => 'Kegiatan tidak boleh lebih dari 10 digit',
                'urai.min' => 'Kegiatan tidak boleh kurang dari 5 digit',
                'urai.max' => 'Kegiatan tidak boleh lebih dari 255 digit',

            ]
        );

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
