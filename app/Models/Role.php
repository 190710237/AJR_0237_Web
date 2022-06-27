<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_role';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_role',
    ];

    public function pegawai() {
        return $this->hasMany(Pegawai::class);
    }

}
