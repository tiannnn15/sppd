<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
    use HasFactory;
    protected $table = 'suratmasuk';
    protected $fillable = [
        'sifat_surat_masuk',
        'nomer_surat_masuk',
        'tgl_surat_masuk',
        'ditujukan_kepada',
        'instansi_pengirim',
        'perihal',
        'status',
    ];

    public function disposisi()
    {
    	return $this->hasOne(Disposisi::class, "suratmasuk_id", "id");
    }
}
