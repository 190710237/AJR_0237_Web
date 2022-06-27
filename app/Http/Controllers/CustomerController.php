<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = DB::table('customers')->where('email', Auth::user()->email)->first();

        return view('profile')->with('data', $customer);
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
        // $data = $request->all();
        // $validate = Validator::make($data, [
        //     'email' => 'required|email:rfc,dns|unique:users',
        //     'alamat' => 'required|max:255',
        //     // 'nama' => 'required|max:64',
        //     'tanggal_lahir' => 'required|date',
        //     'jenis_kelamin' => 'required|boolean',
        //     'nomor_telepon' => 'required|numeric|regex:/(08)/|digits_between:8,13',
        // ]);
        
        // if($validate->fails())
        //     return response(['message' => $validate->errors()], 400); 

        // $count = DB::table('customers')->count() +1;
        // $date = Carbon::now()->format('ymd');
        // $data['id_kartu'] = 'CUS'.$date.'-'.$count; // nomor kartu
        // // $data['password'] = bcrypt($request->tanggal_lahir);
        // $customer = Customer::create($data);
        // // $user = User::create($data);
        // // $registerAccount = (new AuthController)->register($request);
        
        // return response([
        //     'message'=>'Register Success',
        //     'customer' => $customer,
        //     // 'account' => $registerAccount
        // ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_customer)
    {
        // $customer = DB::table('customers')
        //             ->where('id_customer','=',$id_customer)->first();

        // if(!is_null($customer)){
        //     return response([
        //         'message'  => 'Retrieve Customer Success',
        //         'data' => $customer
        //     ], 200);

        // }

        // return response([
        //     'message' => 'Customer Not Found',
        //     'data' => null
        // ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        $customer = DB::table('customers')->where('email', Auth::user()->email)->first();

        // return view('editProfile')->with('data', $customer);
        return view('edit-profile', compact('user'))->with('data', $customer);
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
        // dd($request->all());
        $user = User::find($id);
        if(is_null($user)) {
            return view('profile');
        }
        
        $customer = Customer::where('email', 'like', $user->email)->first();
        if(is_null($customer)) {
            return view('profile');
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'nama' => 'max:64|regex:/^[a-zA-Z ]*$/',
            'password' => 'required|confirmed|min:4|max:255',
            'alamat' => 'nullable|max:255',
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'nullable|boolean',
            'nomor_telepon' => 'nullable|numeric|digits_between:8,13|regex:/(08)/',
            'nomor_ktp' => 'nullable|numeric|digits_between:8,32',
            'nomor_sim' => 'nullable|numeric|digits_between:8,32',
        ]);

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fname = 'face.jpg';
            $file->move(public_path('images/users/'.$user->id.'/'), $fname);
            $path = '/images/users/'.$user->id.'/'.$fname;
            $updateData['foto'] = $path;
        }

        if($validate->fails()) {
            Alert::error('Error', $validate->messages()->all()[0]);

            return view('edit-profile')->with('data', $customer);
        }

        $user->nama = $updateData['nama'];
        $user->password = bcrypt($updateData['password']);
        $user->save();
        $customer->alamat = $updateData['alamat'];
        $customer->tanggal_lahir = $updateData['tanggal_lahir'];
        $customer->jenis_kelamin = $updateData['jenis_kelamin'];
        if($request->hasFile('foto')) {
            $customer->foto = $updateData['foto'];
        }
        $customer->nomor_telepon = $updateData['nomor_telepon'];
        $customer->nomor_ktp = $updateData['nomor_ktp'];
        $customer->nomor_sim = $updateData['nomor_sim'];
        $customer->save();

        Alert::success('Sukses!', 'Data berhasil diubah.');

        return view('profile')->with('data', $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_customer)
    {
        // $customer = Customer::find($id_customer);

        //     if(is_null($customer)){
        //         return response([
        //             'message' => 'Customer Not Found',
        //             'data'=>null
        //         ], 404);
        //     }

        //     if($customer->delete()){
        //         return response([
        //             'message' => 'Delete Customer Success',
        //             'data' => $customer,
        //         ], 200);
        //     }

        //     return response([
        //         'message' => 'Delete Customer Failed',
        //         'data' => null,
        //     ], 400);
            
        
    }
    // todo: add update dokumen + profile picture
}
