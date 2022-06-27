<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Mobil extends Model
{
    use HasFactory;

    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_mobil';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        // 'id_pemilik',
        'foto',
        'nama_mobil',
        // 'merk_mobil',
        'tipe_mobil',
        'jenis_transmisi',
        'jenis_bahan_bakar',
        'volume_bahan_bakar',
        'warna_mobil',
        'kapasitas',
        'pelat_nomor',
        'fasilitas',
        'nomor_stnk',
        'harga_sewa',
        'kategori_aset',
        'tanggal_servis_terakhir',
        'periode_kontrak_mulai',
        'periode_kontrak_akhir',
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
