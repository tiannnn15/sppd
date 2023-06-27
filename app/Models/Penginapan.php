<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;
    protected $table = 'penginapan';
    protected $fillable = [
        'provinsi_id',
        'satuan',
        'gol_i',
        'gol_ii',
        'gol_iii',
        'gol_iv'
    ];

    public function provinsi()
    {
    	return $this->belongsTo(Provinsi::class, "provinsi_id");
    }
}
