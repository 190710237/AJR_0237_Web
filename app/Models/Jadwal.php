<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

        /**
     * The primary key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_jadwal';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'shift',
        'hari'
    ];
}
