<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golo = Golongan::get();
        return view('golongan.index', ['golo' => $golo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gol' => ['required', 'max:5', 'unique:golongans'],
            'name' => ['required', 'min:5', 'unique:golongans'],
        ]);
        // dd($validated);
        $golo = new Golongan();
        $golo->gol = $request->gol;
        $golo->name = $request->name;
        $golo->save();
        return redirect()->route('golongan.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Golongan  $goloongan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Golongan  $goloongan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $golo = Golongan::findOrFail($id);
        return view('golongan.edit', compact('golo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Golongan  $goloongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'gol' => ['required', 'max:5', 'unique:golongans'],
            'name' => ['required', 'min:5', 'unique:golongans'],
        ]);
        $golo = Golongan::findOrFail($id);

        $golo->gol = $request->gol;
        $golo->name = $request->name;

        $golo->save();

        return view()->route('golongan.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Golongan  $goloongan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $golo = Golongan::findOrFail($id);
        $golo->delete();
        return redirect()->route('golongan.index')
            ->with('warning', 'Data berhasil dihapus!');
    }
}
