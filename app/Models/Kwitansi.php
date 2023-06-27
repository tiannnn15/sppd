<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    use HasFactory;
    protected $table = 'kwitansi';
    protected $fillable = [
        'sppd_id', //fitur search
        'lembar_ke',
        'no_kas',
        'kode_rekening',
        'terima_dari',
        'banyaknya_uang',
        'untuk_pembayaran',
        'status_perjalanan',
        'rincian',
        'jumlah_diterima',
        'status',
    ];

    public function sppd()
    {
        return $this->belongsTo(Sppd::class, 'sppd_id', 'id');
    }
}
