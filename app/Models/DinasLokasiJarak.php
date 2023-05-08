<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DinasLokasiJarak extends Model
{
    protected $table = 'dinas_lokasi_jarak';
    protected $fillable = ['lokasi_asal_id','lokasi_tujuan_id','jarak'];
}
