<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('karyawan.index',[
            'karyawan' => Karyawan::with(['jabatan','user'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create', [
            'jabatan' => Jabatan::all(),
            'user' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Karyawan::create([
            "nik" => $request->nik,
            "nama" => $request->nama,
            "tgl_lahir" => $request->tgl_lahir,
            "kelamin" => $request->kelamin,
            "jabatan_id" => $request->jabatan_id,
            "user_id" => $request->user_id,
            "provinsi" => $request->provinsi,
            "kota" => $request->kota,
            "alamat" => $request->alamat,
        ]);
        return redirect('karyawan')->with('pesan', "berhasil tambah karyawan $request->nama");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
            'jabatan'  => Jabatan::all(),
            'user'     => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        Karyawan::where('id', $karyawan->id)->update([
            "nik" => $request->nik,
            "nama" => $request->nama,
            "tgl_lahir" => $request->tgl_lahir,
            "kelamin" => $request->kelamin,
            "jabatan_id" => $request->jabatan_id,
            "user_id" => $request->user_id,
            "provinsi" => $request->provinsi,
            "kota" => $request->kota,
            "alamat" => $request->alamat,
        ]);
        return redirect('karyawan')->with('pesan', "berhasil update karyawan $request->nama");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        Karyawan::destroy($karyawan->id);
        return redirect('/karyawan')->with('pesan', "Berhasil hapus karyawan $karyawan->nama");
    }
}
