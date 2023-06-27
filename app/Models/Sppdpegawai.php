<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sppdpegawai extends Model
{
    use HasFactory;
    protected $table = 'sppd_pegawai';
    protected $fillable = [
        'sppd_id',
        'pegawai_id',
        'status',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
}
