<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biaya extends Model
{
    use HasFactory;
    protected $table = 'biaya';
    protected $fillable = [
        'provinsi_id',
        'satuan',
        'luar_kota',
        'dalam_kota',
        'diklat'
    ];

    public function provinsi()
    {
    	return $this->belongsTo(Provinsi::class, "provinsi_id");
    }

}
