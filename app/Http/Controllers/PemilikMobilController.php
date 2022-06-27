<?php

namespace App\Http\Controllers;

use App\Models\PemilikMobil;
use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PemilikMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemilikMobil = PemilikMobil::paginate(5);

        return view('pemilikMobil.pemilik-Mobil', compact('pemilikMobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemilikMobil.create-pemilik');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validate = Validator::make($data, [
            'nama' => 'required|max:64',
            'alamat' => 'required|max:255',
            'nomor_telepon' => 'required|numeric|digits_between:8,13|regex:/(08)/',
            'nomor_ktp' => 'required|numeric|digits_between:8,32',
        ]);

        if($validate->fails()) {
            Alert::error('Error', $validate->messages()->all()[0]);

            return view('pemilikMobil.create-pemilik');
        }

        $pemilikMobil = PemilikMobil::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'nomor_ktp' => $request->nomor_ktp,
        ]);

        Alert::success('Sukses!', 'Data berhasil disimpan.');
        return redirect()->route('pemilik');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemilikMobil  $pemilikMobil
     * @return \Illuminate\Http\Response
     */
    public function show(PemilikMobil $pemilikMobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemilikMobil = PemilikMobil::find($id);

        return view('pemilikMobil.edit-pemilik', compact('pemilikMobil'));
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
        $pemilikMobil = PemilikMobil::find($id);
        $pemilikMobil->update($request->all());

        return redirect('pemilik')->with('toast_success', 'Update mobil berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemilikMobil  $pemilikMobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemilikMobil = PemilikMobil::find($id);
        $pemilikMobil->delete();

        return redirect()->back()->with('info', 'Delete pemilik mobil berhasil.');
    }
}
