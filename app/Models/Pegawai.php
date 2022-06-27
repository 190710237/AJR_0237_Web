<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_pegawai';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_user',
        'id_role',
        'nama',
        'email',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'foto',
        'nomor_telepon',
        'nomor_ktp',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

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
