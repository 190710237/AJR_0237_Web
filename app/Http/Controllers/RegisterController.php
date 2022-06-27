<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function register(Request $request) {
        // dd($request->all());

        $data = $request->all();
        $validate = Validator::make($data, [
            'nama' => 'required|max:64|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|email:rfc,dns|unique:users|unique:customers',
            'alamat' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|boolean',
            'nomor_telepon' => 'required|numeric|digits_between:8,13|regex:/(08)/',
        ]);

        if($validate->fails()) {
            //return response(['message' => $validate->errors()], 400);
            Alert::error('Error', $validate->messages()->all()[0]);
            //return back()->with('errors', $validate->messages()->all()[0]);
            return view('auth.register');

        } else {
            User::create([
                'email' => $request->email,
                'password' => bcrypt($request->tanggal_lahir),
                'nama' => $request->nama,
                'access_level' => 'customer',
                'remember_token' => Str::random(60),
            ]);
    
            $count = DB::table('customers')->count() +1;

            if($count < 10) {
                $count = '00'.$count;
            } else if($count < 100) {
                $count = '0'.$count;
            }

            $date = Carbon::now()->format('ymd');
            $temp = 'CUS'.$date.'-'.$count;
    
            Customer::create([
                'id_kartu' => $temp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nomor_telepon' => $request->nomor_telepon,
                'verifikasi' => '0',
            ]);

            Alert::success('Registrasi Berhasil!', 'Gunakan tanggal lahir yyyy-mm-dd untuk login.');
            return view('auth.login');
        }
    }
}
