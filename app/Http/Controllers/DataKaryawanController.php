<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKaryawan = User::where('role_id', 2)->get();
        return view('page.admin.data-karyawan.index', compact('dataKaryawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('page.admin.data-karyawan.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $role = Role::all();
        return view('page.admin.data-karyawan.edit', compact('user', 'role'));
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
        $user = User::where('id', $id)->firstOrFail();
        $inputVal = $request->validate([
            'name' => ['required'],
            'alamat' => ['required'],
            'role_id' => ['required'],
            'no_hp' => ['required'],
        ]);

        try {
            $user->update($inputVal);
            if ($user->role_id == 1) {
                alert()->success('Berhasil', 'Berhasil Update Data Profile');
                return redirect(route('home'));
            } elseif ($user->role_id == 2) {
                alert()->success('Berhasil', 'Berhasil Update Data Profile');
                return redirect(route('dataKaryawan.index'));
            }
        } catch (\Exception $th) {
            alert()->error('Gagal', 'Gagal Update Data Profile');
            return redirect(route('dataKaryawan.index'));
        }

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
    }
}
