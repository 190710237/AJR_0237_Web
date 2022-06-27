<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

use DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::paginate(5);

        return view('driver.driver', compact('driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create-driver');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        $validate = Validator::make($data, [
            'nama' => 'required|max:64',
            'email' => 'required|email:rfc,dns|unique:users|unique:customers',
            'alamat' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|boolean',
            'nomor_telepon' => 'required|numeric|digits_between:8,13|regex:/(08)/',
            'nomor_ktp' => 'required|numeric|digits_between:8,32',
            'bahasa' => 'required|boolean',
            'tarif_driver' => 'required|numeric',
        ]);

        if($validate->fails()) {
            Alert::error('Error', $validate->messages()->all()[0]);

            return view('driver.create-driver');
        }

        $path = '';

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->tanggal_lahir),
            'nama' => $request->nama,
            'access_level' => 'driver',
            'remember_token' => Str::random(60),
        ]);

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fname = 'face.jpg';
            $file->move(public_path('images/users/'.$user->id.'/'), $fname);
            $path = '/images/users/'.$user->id.'/'.$fname;
        }

        Driver::create([
            'id_user' => $user->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $path,
            'nomor_telepon' => $request->nomor_telepon,
            'nomor_ktp' => $request->nomor_ktp,
            'bahasa' => $request->bahasa,
            'tarif_driver' => $request->tarif_driver,
        ]);

        Alert::success('Sukses!', 'Data driver berhasil dibuat.');
        return redirect()->route('driver');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);

        return view('driver.edit-driver', compact('driver'));
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
        $driver = Driver::find($id);
        $driver->update($request->all());

        return redirect('driver')->with('toast_success', 'Update driver berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);

        $user = User::where('email', $driver->email)->first();
        // dd($user);
        $driver->delete();
        $user->delete();

        Alert::success('Sukses!', 'Data driver berhasil dihapus.');
        $driver = Driver::paginate(5);
        return view('driver.driver', compact('driver'));
    }
}
