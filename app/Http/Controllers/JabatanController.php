<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Lembur;
use App\Models\User;
use Illuminate\Http\Request;

class JabatanController extends Controller
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
    public function index()
    {
        //
        $jab = Jabatan::paginate(10);
        $lemburs = Lembur::all('id')->count();
        $jabatans = Jabatan::all('id')->count();
        $juser = User::all('id')->count();
        return view('jabatan.index', ['jab' => $jab], compact('juser', 'lemburs', 'jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valid Data
        $request->validate([
            'name' => ['required', 'unique:jabatans'],
        ]);

        $jab = new Jabatan();
        $jab->name = $request->name;

        $jab->save();

        return redirect()->route('jabatan.index')
            ->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jab = Jabatan::findOrFail($id);
        return view('jabatan.show', compact('jab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jab = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $jab = Jabatan::findOrFail($id);
        $jab->name = $request->name;

        $jab->save();

        return redirect()->route('jabatan.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jab = Jabatan::findOrFail($id);
        $jab->delete();
        return redirect()->route('jabatan.index')
            ->with('warning', 'Data berhasil dihapus!');
    }
}
