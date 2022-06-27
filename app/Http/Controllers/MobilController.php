<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::paginate(5);

        return view('mobil.mobil', compact('mobil'));
    }

    public function index_sewa()
    {
        $mobil = Mobil::paginate(5);

        return view('sewa-mobil.create-sewa-mobil', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil.create-mobil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->all();
        $validate = Validator::make($data, [
            'nama_mobil' => 'max:16|regex:/^[a-zA-Z0-9 ]*$/',
            'tipe_mobil' => 'max:8|regex:/^[a-zA-Z ]*$/',
            'jenis_transmisi' => 'max:9|regex:/^[a-zA-Z ]*$/',
            'jenis_bahan_bakar' => 'max:16|regex:/^[a-zA-Z ]*$/',
            'volume_bahan_bakar' => 'nullable|numeric',
            'warna_mobil' => 'max:8|regex:/^[a-zA-Z ]*$/',
            'kapasitas' => 'numeric',
            'pelat_nomor' => 'max:10|regex:/^[a-zA-Z0-9 ]*$/',
            'fasilitas' => 'max:64',
            'nomor_stnk' => 'numeric|digits_between:6,32',
            'harga_sewa' => 'numeric',
            'kategori_aset' => 'boolean',
            'tanggal_servis_terakhir' => 'required|date',
            'periode_kontrak_mulai' => 'nullable|date',
            'periode_kontrak_akhir' => 'nullable|date',
        ]);

        if($validate->fails()) {
            Alert::error('Error', $validate->messages()->all()[0]);

            return view('mobil.create-mobil');
        }

        $mobil = Mobil::create([
            'nama_mobil' => $request->nama_mobil,
            'tipe_mobil' => $request->tipe_mobil,
            'jenis_transmisi' => $request->jenis_transmisi,
            'jenis_bahan_bakar' => $request->jenis_bahan_bakar,
            'volume_bahan_bakar' => $request->volume_bahan_bakar,
            'warna_mobil' => $request->warna_mobil,
            'kapasitas' => $request->kapasitas,
            'pelat_nomor' => $request->pelat_nomor,
            'fasilitas' => $request->fasilitas,
            'nomor_stnk' => $request->nomor_stnk,
            'harga_sewa' => $request->harga_sewa,
            'kategori_aset' => $request->kategori_aset,
            'tanggal_servis_terakhir' => $request->tanggal_servis_terakhir,
            'periode_kontrak_mulai' => $request->periode_kontrak_mulai,
            'periode_kontrak_akhir' => $request->periode_kontrak_akhir,
        ]);

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fname = $mobil->id_mobil.'.jpg';
            $file->move(public_path('images/mobils/'), $fname);
            $path = '/images/mobils/'.$fname;
        
            $mobil->foto = $path;
            $mobil->save();
        }

        Alert::success('Sukses!', 'Data berhasil disimpan.');
        return redirect()->route('mobil');

        // $mobil = Mobil::all();
        // return view('mobil.mobil', compact('mobil'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
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
        $mobil = Mobil::find($id);

        return view('mobil.edit-mobil', compact('mobil'));
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
        $mobil = Mobil::find($id);
        $mobil->update($request->all());

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fname = $mobil->id_mobil.'.jpg';
            $file->move(public_path('images/mobils/'), $fname);
            $path = '/images/mobils/'.$fname;
        
            $mobil->foto = $path;
            $mobil->save();
        }

        return redirect('mobil')->with('toast_success', 'Update mobil berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();

        return redirect()->back()->with('info', 'Delete mobil berhasil.');
    }
}
