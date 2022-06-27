<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransaksiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::orderBy('created_at', 'DESC')->get();
        $response = [
            'message' => 'List transaksi order by time',
            'data'  => $transaksis
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function laporanMobil($tahun, $bulan)
    {
        $data = [
            'mobils' => DB::select(
                "SELECT tipe_mobil, mobils.nama_mobil AS 'nama_mobil', pelat_nomor, count(transaksis.id_mobil) as 'jumlah', 
                        sum(datediff(tanggal_waktu_akhir_sewa, tanggal_waktu_mulai_sewa) * mobils.harga_sewa) as 'subtotal' FROM mobils
                JOIN transaksis ON transaksis.id_mobil = mobils.id_mobil
                -- JOIN pemilik_mobils ON pemilik_mobils.id_pemilik = mobils.id_pemilik
                WHERE (SELECT YEAR(transaksis.tanggal_waktu_mulai_sewa))=$tahun AND (SELECT MONTH(transaksis.tanggal_waktu_mulai_sewa))=$bulan
                GROUP BY mobils.nama_mobil
                ORDER BY jumlah DESC"
            ),
            'tahun' => $tahun,
            'bulan' => $bulan,
            'pendapatan_total' => Transaksi::whereYear('tanggal_waktu_mulai_sewa', $tahun )->whereMonth('tanggal_waktu_mulai_sewa', $bulan)->get()->sum('subtotal'),
            'count' => Transaksi::whereYear('tanggal_waktu_mulai_sewa', $tahun )->whereMonth('tanggal_waktu_mulai_sewa', $bulan)->get()->count(),
        ];

        $pdf = PDF::loadView('laporan.laporanMobil', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan-mobil.pdf');

        // return view ('dashboard.transaksis.laporanMobil', [
        //     'mobils' => DB::select(
        //         "SELECT tipe, mobils.nama AS 'nama_mobil', no_plat, count(mobil_id) as 'jumlah', 
        //                 sum(datediff(tanggal_selesai, tanggal_mulai) * mobils.tarif) as 'subtotal' FROM mobils
        //         JOIN transaksis ON transaksis.mobil_id = mobils.id
        //         JOIN mitras ON mitras.id = mobils.mitra_id
        //         WHERE (SELECT YEAR(transaksis.tanggal_mulai))=$tahun AND (SELECT MONTH(transaksis.tanggal_mulai))=$bulan
        //         GROUP BY mobils.nama
        //         ORDER BY jumlah DESC"
        //     ),
        //     'tahun' => $tahun,
        //     'bulan' => $bulan,
        //     'pendapatan_total' => Transaksi::whereYear('tanggal_mulai', $tahun )->whereMonth('tanggal_mulai', $bulan)->get()->sum('subtotal'),
        //     'count' => Transaksi::whereYear('tanggal_mulai', $tahun )->whereMonth('tanggal_mulai', $bulan)->get()->count(),
        // ]);
    }

    public function laporanTransaksi($tahun, $bulan)
    {

        $data = [
            'transaksis' => Transaksi::whereYear('tanggal_waktu_mulai_sewa', $tahun )->whereMonth('tanggal_waktu_mulai_sewa', $bulan)->get(),
            'count_rating' => Transaksi::whereYear('tanggal_waktu_mulai_sewa', $tahun )->whereMonth('tanggal_waktu_mulai_sewa', $bulan)->count('rating_ajr'),
            'tahun' => $tahun,
            'bulan' => $bulan
        ];

        $pdf = PDF::loadView('laporan.laporanTransaksi', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan-transaksi.pdf');

        // return view('dashboard.transaksis.laporanTransaksi', [
        //     'transaksis' => Transaksi::whereYear('tanggal_mulai', $tahun )->whereMonth('tanggal_mulai', $bulan)->get(),
        //     'count_rating' => Transaksi::whereYear('tanggal_mulai', $tahun )->whereMonth('tanggal_mulai', $bulan)->count('rating_rental'),
        //     'tahun' => $tahun,
        //     'bulan' => $bulan
        // ]);
    }

    public function laporanDriver($tahun, $bulan)
    {
        $data = [
            'drivers' => DB::select(
                "SELECT drivers.id_driver as 'id', drivers.nama, count(transaksis.id_driver) as 'jumlah_transaksi', avg(rating_driver) as 'rerata_rating', sum(datediff(tanggal_waktu_akhir_sewa, tanggal_waktu_mulai_sewa) * drivers.tarif_driver) as 'pendapatan', drivers.created_at as 'created_at' FROM drivers 
                JOIN users ON users.id = drivers.id_user
                JOIN transaksis ON transaksis.id_driver = drivers.id_driver
                WHERE (SELECT YEAR(transaksis.created_at))=$tahun AND (SELECT MONTH(transaksis.created_at))=$bulan
                GROUP BY drivers.nama ORDER BY jumlah_transaksi DESC
                LIMIT 5"
            ),            
            'tahun' => $tahun,
            'bulan' => $bulan,
            'count' => Transaksi::whereYear('tanggal_waktu_mulai_sewa', $tahun )->whereMonth('tanggal_waktu_mulai_sewa', $bulan)->get()->count(),

        ];

        $pdf = PDF::loadView('laporan.laporanDriver', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan-driver.pdf');

        // return view ('dashboard.transaksis.laporanDriver', [
        //     'drivers' => DB::select(
        //         "SELECT drivers.id as 'id', nama, count(transaksis.driver_id) as 'jumlah_transaksi', avg(rating_driver) as 'rating', sum(datediff(tanggal_selesai, tanggal_mulai) * tarif) as 'pendapatan', drivers.created_at as 'created_at' FROM drivers 
        //         JOIN users ON users.id = drivers.user_id
        //         JOIN transaksis ON transaksis.driver_id = drivers.id
        //         WHERE (SELECT YEAR(transaksis.created_at))=$tahun AND (SELECT MONTH(transaksis.created_at))=$bulan
        //         GROUP BY nama ORDER BY pendapatan DESC
        //         LIMIT 5"
        //     ),            
        //     'tahun' => $tahun,
        //     'bulan' => $bulan,
        //     'count' => Transaksi::whereYear('tanggal_mulai', $tahun )->whereMonth('tanggal_mulai', $bulan)->get()->count(),

        // ]);
    }

    public function laporanPerforma($tahun, $bulan)
    {
        $data = [
            'drivers' => DB::select(
                "SELECT drivers.id_driver as 'id', drivers.nama, count(transaksis.id_driver) as 'jumlah_transaksi', avg(rating_driver) as 'rating', sum(datediff(tanggal_waktu_akhir_sewa, tanggal_waktu_mulai_sewa) * tarif_driver) as 'pendapatan', drivers.created_at as 'created_at' FROM drivers
                JOIN users ON users.id = drivers.id_user
                JOIN transaksis ON transaksis.id_driver = drivers.id_driver
                WHERE (SELECT YEAR(transaksis.created_at))=$tahun AND (SELECT MONTH(transaksis.created_at))=$bulan
                GROUP BY drivers.nama ORDER BY jumlah_transaksi DESC"
            ),
            'tahun' => $tahun,
            'bulan' => $bulan,
            'count' => Transaksi::whereYear('tanggal_waktu_mulai_sewa', $tahun )->whereMonth('tanggal_waktu_mulai_sewa', $bulan)->get()->count(),

        ];

        $pdf = PDF::loadView('laporan.laporanPerforma', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan-performa.pdf');

        // return view ('dashboard.transaksis.laporanPerforma', [
        //     'drivers' => DB::select(
        //         "SELECT drivers.id as 'id', nama, count(transaksis.driver_id) as 'jumlah_transaksi', avg(rating_driver) as 'rating', sum(datediff(tanggal_selesai, tanggal_mulai) * tarif) as 'pendapatan', drivers.created_at as 'created_at' FROM drivers
        //         JOIN users ON users.id = drivers.user_id
        //         JOIN transaksis ON transaksis.driver_id = drivers.id
        //         WHERE (SELECT YEAR(transaksis.created_at))=$tahun AND (SELECT MONTH(transaksis.created_at))=$bulan
        //         GROUP BY nama ORDER BY jumlah_transaksi DESC"
        //     ),
        //     'tahun' => $tahun,
        //     'bulan' => $bulan,
        //     'count' => Transaksi::whereYear('tanggal_mulai', $tahun )->whereMonth('tanggal_mulai', $bulan)->get()->count(),

        // ]);
    }

    public function laporanCustomer($tahun, $bulan)
    {
        $data = [
            'customers' => DB::select(
                "SELECT nama, count(customers.id_customer) as 'jumlah', sum(biaya_total) as 'pembayaran' FROM users
                JOIN customers ON customers.email = users.email
                JOIN transaksis ON transaksis.id_customer = customers.id_customer
                WHERE (SELECT YEAR(transaksis.created_at))=$tahun AND (SELECT MONTH(transaksis.created_at))=$bulan
                AND users.access_level='customer'
                GROUP BY nama ORDER BY jumlah DESC
                LIMIT 5"
            ),
            'tahun' => $tahun,
            'bulan' => $bulan,
            'count' => Transaksi::whereYear('tanggal_waktu_mulai_sewa', $tahun )->whereMonth('tanggal_waktu_mulai_sewa', $bulan)->get()->count(),
        ];

        $pdf = PDF::loadView('laporan.laporanCustomer', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan-customer.pdf');

        // return view ('dashboard.transaksis.laporanCustomer', [
        //     'customers' => DB::select(
        //         "SELECT nama, count(customer_id) as 'jumlah', sum(biaya) as 'subtotal' FROM users
        //         JOIN customers ON customers.user_id = users.id
        //         JOIN transaksis ON transaksis.customer_id = customers.id
        //         WHERE (SELECT YEAR(transaksis.created_at))=$tahun AND (SELECT MONTH(transaksis.created_at))=$bulan
        //         GROUP BY nama ORDER BY jumlah DESC
        //         LIMIT 5"
        //     ),
        //     'tahun' => $tahun,
        //     'bulan' => $bulan,
        //     'count' => Transaksi::whereYear('tanggal_mulai', $tahun )->whereMonth('tanggal_mulai', $bulan)->get()->count(),
        // ]);
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
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
