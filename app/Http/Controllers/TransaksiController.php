<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Mobil;
use App\Models\Driver;
use App\Models\Promo;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = DB::table('customers')->where('email', Auth::user()->email)->value('id_customer');
        $transaksi = DB::table('transaksis')->where('id_customer', $customer)->get();
        $mobil = DB::table('mobils')->get();
        $promo = DB::table('promos')->get();
        $driver = DB::table('drivers')->get();

        return view('transaksi.transaksi', compact('transaksi'))->with('mobil', $mobil)->with('customer', $customer)
        ->with('promo', $promo)->with('driver', $driver);
    }

    public function index_cs()
    {   
        $customer = DB::table('customers')->get();
        $transaksi = DB::table('transaksis')->get();
        $mobil = DB::table('mobils')->get();
        $promo = DB::table('promos')->get();
        $driver = DB::table('drivers')->get();

        return view('transaksi.transaksi-cs', compact('transaksi'))->with('customer', $customer)->with('mobil', $mobil)
        ->with('promo', $promo)->with('driver', $driver);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $customer = DB::table('customers')->where('email', Auth::user()->email)->first();
        $mobil = Mobil::find($id);
        $promo = DB::table('promos')->where('status_promo', 1)->get();
        $driver = DB::table('drivers')->where('status_driver', 1)->get();

        return view('transaksi.create-transaksi', compact('mobil'))->with('driver', $driver)->with('customer', $customer)
        ->with('promo', $promo);
    }

    public function cek_harga(Request $request, $id)
    {
        $customer = DB::table('customers')->where('email', Auth::user()->email)->first();
        $mobil = Mobil::find($id);
        $driver = DB::table('drivers')->where('status_driver', 1)->get();
        $promo = DB::table('promos')->where('kode_promo', $request->kode_promo)->value('id_promo');
        $dates = $request->all();

        if($request->tanggal_waktu_mulai_sewa == null || $request->tanggal_waktu_akhir_sewa == null) {
            Alert::error('Error', 'Tanggal tidak boleh kosong.');

            return view('sewa-mobil.create-sewa-mobil', compact('mobil'))->with('driver', $driver)->with('request', $request);
        } else {
            $start = Carbon::parse($dates['tanggal_waktu_mulai_sewa']);
            $end = Carbon::parse($dates['tanggal_waktu_akhir_sewa']);
            $diff = $start->diffInDays($end);
            if($diff < 1) {
                $diff = 1;
            }
            $hargaMobil = DB::table('mobils')->where('id_mobil', $id)->value('harga_sewa');
            $hargaMobil = $hargaMobil * $diff;
            $hargaDriver = DB::table('drivers')->where('id_driver', $request->id_driver)
                ->value('tarif_driver');
            if($hargaDriver == null) {
                $hargaDriver = 0;
            }
            $hargaDriver = $hargaDriver * $diff;
            $totalHarga = $hargaMobil + $hargaDriver;

            $harga = array($hargaMobil, $hargaDriver, $totalHarga);

            return view('sewa-mobil.harga-sewa-mobil', compact('mobil'))->with('driver', $driver)->with('harga', $harga)
            ->with('request', $request)->with('customer', $customer)->with('promo', $promo);
        }
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
        $date = Carbon::now()->toDateString();
        $start = Carbon::parse($request->tanggal_waktu_mulai_sewa);
        $end = Carbon::parse($request->tanggal_waktu_akhir_sewa);
        
        $count = DB::table('transaksis')->count() +1;

        if($count < 10) {
            $count = '00'.$count;
        } else if($count < 100) {
            $count = '0'.$count;
        }

        if($request->id_driver < 10) {
            $drv = '0'.$request->id_driver;
        } else {
            $drv = $request->id_driver;
        }

        $date = Carbon::now()->format('ymd');

        $temp = 'TRN'.$date.$drv.'-'.$count;

        if($request->id_driver == 0) {
            $transaksi = Transaksi::create([
                'id_transaksi' => $request->$temp,
                'id_customer' => $request->id_customer,
                'id_mobil' => $request->id_mobil,
                'id_promo' => $request->id_promo,
                'kode_transaksi' => $temp,
                'tanggal_waktu_mulai_sewa' => $request->tanggal_waktu_mulai_sewa,
                'tanggal_waktu_akhir_sewa' => $request->tanggal_waktu_akhir_sewa,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status_transaksi' => 'Menunggu Verifikasi',
                'tanggal_transaksi' => $date,
            ]);

            Alert::success('Sukses!', 'Transaksi berhasil dibuat.');

            $customer = DB::table('customers')->where('email', Auth::user()->email)->value('id_customer');
            $transaksi = DB::table('transaksis')->where('id_customer', $customer)->get();
            $mobil = DB::table('mobils')->get();

            return view('home');
        } else {
            $transaksi = Transaksi::create([
                'id_customer' => $request->id_customer,
                'id_mobil' => $request->id_mobil,
                'id_driver' => $request->id_driver,
                'id_promo' => $request->id_promo,
                'kode_transaksi' => $temp,
                'tanggal_waktu_mulai_sewa' => $request->tanggal_waktu_mulai_sewa,
                'tanggal_waktu_akhir_sewa' => $request->tanggal_waktu_akhir_sewa,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status_transaksi' => 'Menunggu Verifikasi',
                'tanggal_transaksi' => $date,
            ]);

            Alert::success('Sukses!', 'Transaksi berhasil dibuat.');

            $customer = DB::table('customers')->where('email', Auth::user()->email)->value('id_customer');
            $transaksi = DB::table('transaksis')->where('id_customer', $customer)->get();
            $mobil = DB::table('mobils')->get();

            return view('home');
        }
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        $mobil = DB::table('mobils')->get();
        $driver = DB::table('drivers')->get();
        $pegawai = DB::table('pegawais')->get();
        $customer = DB::table('customers')->join('users', 'customers.email', '=', 'users.email')
        ->get();

        return view('transaksi.show-transaksi', compact('transaksi'))->with('mobil', $mobil)->with('driver', $driver)->with('pegawai', $pegawai)->with('customer', $customer);
    }

    public function show_cs($id)
    {
        $transaksi = Transaksi::find($id);
        $mobil = DB::table('mobils')->get();
        $driver = DB::table('drivers')->get();
        $pegawai = DB::table('pegawais')->get();
        $customer = DB::table('customers')->join('users', 'customers.email', '=', 'users.email')
        ->get();

        return view('transaksi.show-transaksi-cs', compact('transaksi'))->with('mobil', $mobil)->with('driver', $driver)->with('pegawai', $pegawai)->with('customer', $customer);
    }

    public function bayar($id)
    {
        $transaksi = Transaksi::find($id);
        $mobil = Mobil::find($transaksi->id_mobil);
        $driver = Driver::find($transaksi->id_driver);
        $promo = Promo::find($transaksi->id_promo);

        $hargaMobil = $mobil->harga_sewa;
        
        $hargaDenda = 0;
        //dd($hargaDriver);
        if($driver == null) {
            $hargaDriver = 0;
        } else {
            $hargaDriver = $driver->tarif_driver;
        }

        $start = Carbon::parse($transaksi->tanggal_waktu_mulai_sewa);
        $end = Carbon::parse($transaksi->tanggal_waktu_akhir_sewa);
        $now = Carbon::now();
        
        $denda = $end->diffInMinutes($now, false);

        $subTotal = $hargaMobil + $hargaDriver;

        if($denda > 180) {
            $hargaDenda = $hargaMobil;
            $hargaMobil = $hargaMobil * 2;
        } else {
            $hargaDenda = 0;
        }

        if($transaksi->id_promo != null && $promo->status_promo != 1) {
            $diskon = $promo->diskon;
            $hargaDiskon = $subTotal * $diskon / 100;
        } else {
            $diskon = 0;
            $hargaDiskon = 0;
        }

        $totalHarga = $hargaMobil + $hargaDriver - $hargaDiskon;

        $harga = array($diskon, $hargaDiskon, $hargaDenda, $subTotal, $totalHarga);

        //dd($harga);

        return view('transaksi.bayar-transaksi', compact('transaksi'))->with('harga', $harga);
    }

    public function upload_pembayaran(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $data = $request->all();
        // $validate = Validator::make($data, [
        //     'diskon' => 'required',
        //     'biaya_denda' => 'required',
        //     'biaya_sub_total' => 'required',
        //     'biaya_total' => 'required',
        // ]);

        if($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fname = 'bukti_pembayaran.jpg';
            $file->move(public_path('images/transaksis/'.$id.'/'), $fname);
            $path = '/images/transaksis/'.$id.'/'.$fname;

            $transaksi->bukti_pembayaran = $path;

            $waktu = Carbon::now();

            $transaksi->diskon = $request->diskon;
            $transaksi->biaya_denda = $request->biaya_denda;
            $transaksi->biaya_sub_total = $request->biaya_sub_total;
            $transaksi->biaya_total = $request->biaya_total;
            $transaksi->tanggal_waktu_pengembalian_mobil = $waktu;
            $transaksi->status_transaksi = 'Sudah Bayar, Menunggu Verifikasi';
            $transaksi->save();

            $customer = DB::table('customers')->where('email', Auth::user()->email)->value('id_customer');
            $transaksi = DB::table('transaksis')->where('id_customer', $customer)->get();
            $mobil = DB::table('mobils')->get();

            Alert::success('Sukses!', 'Bukti pembayaran berhasil diunggah.');

            return view('transaksi.transaksi', compact('transaksi'))->with('mobil', $mobil);
        } else {
            Alert::error('Error', 'Harap sertakan file bukti pembayaran.');

            $transaksi = Transaksi::find($id);
            $mobil = DB::table('mobils')->get();
            $driver = DB::table('drivers')->get();
            $customer = DB::table('customers')->join('users', 'customers.email', '=', 'users.email')
            ->get();

            return view('transaksi.show-transaksi', compact('transaksi'))->with('mobil', $mobil)->with('driver', $driver)->with('customer', $customer);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $mobil = DB::table('mobils')->where('id_mobil',$transaksi->id_mobil)->get();
        $driver = DB::table('drivers')->where('id_driver',$transaksi->id_driver)->get();
        $pegawai = DB::table('pegawais')->get();
        $customer = DB::table('customers')->join('users', 'customers.email', '=', 'users.email')
        ->get();
        $promo = DB::table('promos')->get();
        $driver = DB::table('drivers')->get();

        return view('transaksi.edit-transaksi', compact('transaksi'))->with('mobil', $mobil)->with('driver', $driver)
        ->with('pegawai', $pegawai)->with('customer', $customer)->with('promo', $promo)->with('driver', $driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->rating_driver = $request->rating_driver;
        $transaksi->status_transaksi = $request->status_transaksi;
        $transaksi->save();

        Alert::success('Sukses!', 'Data transaksi berhasil diperbarui.');

        // $transaksi = Transaksi::find($id);
        $mobil = DB::table('mobils')->get();
        $driver = DB::table('drivers')->get();
        $pegawai = DB::table('pegawais')->get();
        $customer = DB::table('customers')->join('users', 'customers.email', '=', 'users.email')
        ->get();
        $promo = DB::table('promos')->get();
        $driver = DB::table('drivers')->get();

        return view('transaksi.transaksi-cs', compact('transaksi'))->with('customer', $customer)->with('mobil', $mobil)
        ->with('promo', $promo)->with('driver', $driver);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        Alert::success('Sukses!', 'Data transaksi berhasil dihapus.');

        $customer = DB::table('customers')->get();
        $transaksi = DB::table('transaksis')->get();
        $mobil = DB::table('mobils')->get();

        return view('transaksi.transaksi-cs', compact('transaksi'))->with('customer', $customer)->with('mobil', $mobil);
    }
}
