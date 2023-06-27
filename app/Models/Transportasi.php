<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    use HasFactory;
    protected $table = 'transportasi';
    protected $fillable = [
        'provinsi_id',
        'satuan',
        'besaran'
    ];

    public function provinsi()
    {
    	return $this->belongsTo(Provinsi::class, "provinsi_id");
    }
}
