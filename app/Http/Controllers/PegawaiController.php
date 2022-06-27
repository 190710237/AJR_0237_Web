<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

use DB;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::paginate(5);

        return view('pegawai.pegawai', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create-pegawai');
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
            'id_role' => 'required',
            'nama' => 'required|max:64',
            'email' => 'required|email:rfc,dns|unique:users|unique:customers',
            'alamat' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|boolean',
            // 'foto' => 'required|image|mimes:jpeg,png,jpg',
            'nomor_telepon' => 'required|numeric|digits_between:8,13|regex:/(08)/',
            'nomor_ktp' => 'required|numeric|digits_between:8,32',
        ]);

        if($validate->fails()) {
            Alert::error('Error', $validate->messages()->all()[0]);

            return view('pegawai.create-pegawai');
        }

        if($request->id_role == 2) {
            $role = 'admin';
        }else if($request->id_role == 3) {
            $role = 'cs';
        }
        //dd($role);

        $path = '';

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->tanggal_lahir),
            'nama' => $request->nama,
            'access_level' => $role,
            'remember_token' => Str::random(60),
        ]);

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fname = 'face.jpg';
            $file->move(public_path('images/users/'.$user->id.'/'), $fname);
            $path = '/images/users/'.$user->id.'/'.$fname;
        }

        Pegawai::create([
            'id_role' => $request->id_role,
            'id_user' => $user->id,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $path,
            'nomor_telepon' => $request->nomor_telepon,
            'nomor_ktp' => $request->nomor_ktp,
        ]);

        Alert::success('Sukses!', 'Data pegawai berhasil dibuat.');
        return redirect()->route('pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
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
        $pegawai = Pegawai::find($id);

        return view('pegawai.edit-pegawai', compact('pegawai'));
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
        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fname = 'face.jpg';
            $file->move(public_path('images/users/'.$pegawai->id_foto.'/'), $fname);
            $path = '/images/users/'.$pegawai->id_foto.'/'.$fname;
        
            $pegawai->foto = $path;
            $pegawai->save();
        }

        return redirect('pegawai')->with('toast_success', 'Update pegawai berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $user = User::where('email', $pegawai->email)->first();
        // dd($user);
        $pegawai->delete();
        $user->delete();

        Alert::success('Sukses!', 'Data pegawai berhasil dihapus.');

        $pegawai = Pegawai::paginate(5);
        return view('pegawai.pegawai', compact('pegawai'));
    }
}
