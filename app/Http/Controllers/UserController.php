<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Lembur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
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

        $user = User::with('jabatan', 'golongan')->paginate(10);
        $lemburs = Lembur::all('id')->count();
        $jabatans = Jabatan::all('id')->count();
        $juser = User::all('id')->count();
        return view('user.index', ['user' => $user], compact('juser', 'lemburs', 'jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jab = Jabatan::all();
        $gol = Golongan::all();
        $use = User::all();
        return view('user.create', compact('jab', 'use', 'gol'));
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
                'nip' => ['required', 'unique:users', 'min:8'],
                'name' => ['required', 'max:255', 'min:5'],
                'image' => ['nullable', 'file', 'image', 'max:1024'],
                'jabatan' => ['required'],
                'golongan' => ['required'],
                'role' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],

            ],
            [
                //NIP
                'nip.min' => 'NIP minimal :min digit',
                'nip.unique' => 'NIP sudah terdaftar',

                //Name
                'name.max' => 'Nama maximal :max digit',
                'name.min' => 'Nama minimal :min digit',

                //Password
                'password.min' => 'Kegiatan minimal :min digit',
            ]
        );

        $newName = 'blank.jpg';

        if ($request->file('image')) {
            $extendsion = $request->file('image')->getClientOriginalName();
            $newName = $request->name . 'PTIPD' . now()->timestamp . '.' . $extendsion;
            $request->file('image')->storeAs('image', $newName);
        }

        $validatedData['jabatan_id'] = $request->jabatan;
        $validatedData['golongan_id'] = $request->golongan;

        $user = new User();
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->image = $newName;
        $user->jabatan_id = $validatedData['jabatan_id'];
        $user->golongan_id = $validatedData['golongan_id'];
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        $use = User::with('jabatan')->findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jab = Jabatan::all();
        $gol = Golongan::all();
        $user = User::findOrFail($id);
        return view('user.edit', compact('user', 'jab', 'gol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nip' => ['required', 'min:8'],
            'name' => ['required', 'max:255'],
            'image' => ['nullable', 'file', 'image', 'max:1024'],
            'jabatan' => ['required'],
            'golongan' => ['required'],
            'role' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable'],

        ]);

        $newName = '';

        if ($request->file('image')) {
            $extendsion = $request->file('image')->getClientOriginalName();
            $newName = $request->name . 'PTIPD' . now()->timestamp . '.' . $extendsion;
            $request->file('image')->storeAs('image', $newName);
        }

        $validatedData['jabatan_id'] = $request->jabatan;
        $validatedData['golongan_id'] = $request->golongan;

        $user = User::findOrFail($id);
        $user->nip = $request->nip;
        $user->name = $request->name;
        if ($newName == '') {
            $user->image = $user->image;
        } else {
            $user->image = $newName;
        }
        $user->jabatan_id = $validatedData['jabatan_id'];
        $user->golongan_id = $validatedData['golongan_id'];
        $user->role = $request->role;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')
            ->with('warning', 'Data berhasil dihapus!');
    }
}
