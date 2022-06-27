<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_driver';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_foto',
        'nama',
        'email',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'foto',
        'nomor_telepon',
        'nomor_ktp',
        'bahasa',
        'status_driver',
        'tarif_driver',
        'fotocopy_sim',
        'fotocopy_bebas_napza',
        'fotocopy_kesehatan_jiwa',
        'fotocopy_kesehatan_jasmani',
        'fotocopy_skck',
        'rerata_rating',
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
