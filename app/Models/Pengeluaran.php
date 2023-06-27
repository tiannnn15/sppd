<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $fillable = [
        'sppd_id', //fitur search
        'transportasi',
        'biaya_transportasi',
        'bukti_transportasi',
        'biaya_taksi',
        'bukti_taksi',
        'biaya_penginapan',
        'bukti_penginapan',
        'kota_tujuan',
        'status',
    ];

    public function sppd()
    {
        return $this->belongsTo(Sppd::class, 'sppd_id', 'id');
    }
}
