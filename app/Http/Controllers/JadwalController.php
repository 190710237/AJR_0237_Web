<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

use DB;
use App\Models\Pegawai;
use App\Models\KeteranganJadwal;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $jadwal = KeteranganJadwal::all();

        // $pegawai = DB::table('jadwals')->join('keterangan_jadwals', 'jadwals.id_jadwal', '=', 'keterangan_jadwals.id_jadwal')
        // ->join('pegawais', 'keterangan_jadwals.id_pegawai', '=', 'pegawais.id_pegawai')
        // ->select('jadwals.id_jadwal', 'pegawais.nama', 'keterangan_jadwals.id_pegawai')
        // ->get();
        $pegawai = DB::table('jadwals')->leftJoin('keterangan_jadwals', 'jadwals.id_jadwal', '=', 'keterangan_jadwals.id_jadwal')
        ->leftJoin('pegawais', 'keterangan_jadwals.id_pegawai', '=', 'pegawais.id_pegawai')
        ->get();
        //$jadwal = Jadwal::all();

        //dd($pegawai);

        return view('jadwal.jadwal', compact('jadwal'))->with('pegawai', $pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('jadwal.create-jadwal');
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
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = $id;
        
        $jadwal = KeteranganJadwal::all();

        // $pegawai = DB::table('jadwals')->leftJoin('keterangan_jadwals', 'jadwals.id_jadwal', '=', 'keterangan_jadwals.id_jadwal')
        // ->leftJoin('pegawais', 'keterangan_jadwals.id_pegawai', '=', 'pegawais.id_pegawai')
        // ->get();
        $pegawai = Pegawai::all();

        //dd($pegawai);

        return view('jadwal.edit-jadwal', compact('jadwal'))->with('pegawai', $pegawai)->with('session', $session);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $jadwal = KeteranganJadwal::all();
        $pegawai = DB::table('jadwals')->leftJoin('keterangan_jadwals', 'jadwals.id_jadwal', '=', 'keterangan_jadwals.id_jadwal')
        ->leftJoin('pegawais', 'keterangan_jadwals.id_pegawai', '=', 'pegawais.id_pegawai')
        ->get();

        if($id == 1) {
            $jadwal[0]->id_pegawai = $request->sen1;
            $jadwal[0]->save();
            $jadwal[1]->id_pegawai = $request->sel1;
            $jadwal[1]->save();
            $jadwal[2]->id_pegawai = $request->rab1;
            $jadwal[2]->save();
            $jadwal[3]->id_pegawai = $request->kam1;
            $jadwal[3]->save();
            $jadwal[4]->id_pegawai = $request->jum1;
            $jadwal[4]->save();
            $jadwal[5]->id_pegawai = $request->sab1;
            $jadwal[5]->save();
            $jadwal[6]->id_pegawai = $request->min1;
            $jadwal[6]->save();
        }

        if($id == 2) {
            $jadwal[14]->id_pegawai = $request->sen2;
            $jadwal[14]->save();
            $jadwal[15]->id_pegawai = $request->sel2;
            $jadwal[15]->save();
            $jadwal[16]->id_pegawai = $request->rab2;
            $jadwal[16]->save();
            $jadwal[17]->id_pegawai = $request->kam2;
            $jadwal[17]->save();
            $jadwal[18]->id_pegawai = $request->jum2;
            $jadwal[18]->save();
            $jadwal[19]->id_pegawai = $request->sab2;
            $jadwal[19]->save();
            $jadwal[20]->id_pegawai = $request->min2;
            $jadwal[20]->save();
        }

        if($id == 3) {
            $jadwal[7]->id_pegawai = $request->sen3;
            $jadwal[7]->save();
            $jadwal[8]->id_pegawai = $request->sel3;
            $jadwal[8]->save();
            $jadwal[9]->id_pegawai = $request->rab3;
            $jadwal[9]->save();
            $jadwal[10]->id_pegawai = $request->kam3;
            $jadwal[10]->save();
            $jadwal[11]->id_pegawai = $request->jum3;
            $jadwal[11]->save();
            $jadwal[12]->id_pegawai = $request->sab3;
            $jadwal[12]->save();
            $jadwal[13]->id_pegawai = $request->min3;
            $jadwal[13]->save();
        }

        if($id == 4) {
            $jadwal[21]->id_pegawai = $request->sen4;
            $jadwal[21]->save();
            $jadwal[22]->id_pegawai = $request->sel4;
            $jadwal[22]->save();
            $jadwal[23]->id_pegawai = $request->rab4;
            $jadwal[23]->save();
            $jadwal[24]->id_pegawai = $request->kam4;
            $jadwal[24]->save();
            $jadwal[25]->id_pegawai = $request->jum4;
            $jadwal[25]->save();
            $jadwal[26]->id_pegawai = $request->sab4;
            $jadwal[26]->save();
            $jadwal[27]->id_pegawai = $request->min4;
            $jadwal[27]->save();
        }

        //dd($jadwal[0]);

        return redirect('jadwal')->with('toast_success', 'Update jadwal berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
