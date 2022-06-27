<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_transaksi';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_promo',
        'id_mobil',
        'id_driver',
        'id_pegawai',
        'id_customer',
        'status_transaksi',
        'diskon',
        'biaya_denda',
        'biaya_sub_total',
        'metode_pembayaran',
        'bukti_pembayaran',
        'tanggal_transaksi',
        'tanggal_waktu_mulai_sewa',
        'tanggal_waktu_akhir_sewa',
        'rating_driver',
        'rating_ajr',
        'komentar_driver',
        'komentar_ajr',
    ];

    public function getCreatedAtAttribute(){
        if(!is_null($this->attributes['created_at'])){
            return Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i:s');
        }
    }

    public function getUpdatedAtAttribute(){
        if(!is_null($this->attributes['updated_at'])){
            return Carbon::parse($this->attributes['updated_at'])->format('Y-m-d H:i:s');
        }
    }
}
