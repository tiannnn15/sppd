<?php

namespace App\Models;

use App\Models\Biaya;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    protected $fillable = [
        'nama_provinsi'
    ];

    public function biaya()
    {
    	return $this->hasOne(Biaya::class, "provinsi_id");
    }

    public function transportasi()
    {
    	return $this->hasOne(Transportasi::class, "provinsi_id");
    }

    public function penginapan()
    {
    	return $this->hasOne(Penginapan::class, "provinsi_id");
    }
}
