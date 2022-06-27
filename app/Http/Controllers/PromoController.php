<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promo = Promo::paginate(5);

        return view('promo.promo', compact('promo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promo.create-promo');
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
            'kode_promo' => 'required|max:10',
            'jenis_promo' => 'required|max:16',
            'status_promo' => 'required',
            'keterangan' => 'required|max:255',
            'diskon' => 'required|numeric|digits_between:1,2',
        ]);

        if($validate->fails()) {
            Alert::error('Error', $validate->messages()->all()[0]);

            return view('promo.create-promo');
        }

        $promo = Promo::create([
            'kode_promo' => $request->kode_promo,
            'jenis_promo' => $request->jenis_promo,
            'status_promo' => $request->status_promo,
            'keterangan' => $request->keterangan,
            'diskon' => $request->diskon
        ]);

        Alert::success('Sukses!', 'Data berhasil disimpan.');
        return redirect()->route('promo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
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
        $promo = Promo::find($id);

        return view('promo.edit-promo', compact('promo'));
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
        $promo = Promo::find($id);
        $promo->update($request->all());

        return redirect('promo')->with('toast_success', 'Update promo berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo = Promo::find($id);
        $promo->delete();

        return redirect()->back()->with('info', 'Delete promo berhasil.');
    }
}
