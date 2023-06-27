<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $fillable = [
        'sppd_id',
        'laporan_tentang',
        'latar_belakang',
        'landasan',
        'maksud_tujuan',
        'kegiatan',
        'perihal',
        'kesimpulan',
        'tgl_laporan',
        'penutup',
        'status',
        'gambar'
    ];

    public function sppd()
    {
    	return $this->belongsTo(Sppd::class, 'sppd_id', 'id');
    }
}
