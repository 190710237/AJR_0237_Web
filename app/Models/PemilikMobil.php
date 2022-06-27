<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikMobil extends Model
{
    use HasFactory;

    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_pemilik';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama',
        'alamat',
        'nomor_telepon',
        'nomor_ktp',
    ];
}
