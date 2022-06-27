<?php

namespace App\Http\Controllers;

use App\Models\Keterangan_Jadwal;
use Illuminate\Http\Request;

use DB;
use App\Models\Pegawai;

class Keterangan_JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$jadwal = KeteranganJadwal::all();
        //$pegawai = Pegawai::all();
        //dd($jadwal);

        //return view('jadwal.jadwal', compact('jadwal'))->with('pegawai', $pegawai);
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
     * @param  \App\Models\Keterangan_Jadwal  $Keterangan_Jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Keterangan_Jadwal $Keterangan_Jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keterangan_Jadwal  $Keterangan_Jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Keterangan_Jadwal $Keterangan_Jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keterangan_Jadwal  $Keterangan_Jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keterangan_Jadwal $Keterangan_Jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keterangan_Jadwal  $Keterangan_Jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keterangan_Jadwal $Keterangan_Jadwal)
    {
        //
    }
}
