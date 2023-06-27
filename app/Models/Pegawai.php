<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'nama_pegawai',
        'nip',
        'jabatan',
        'pangkat',
        'golongan'
    ];

    public function sppd()
    {
    	return $this->hasMany(Sppd::class, "pegawai_id", "id");
    }

    public function disposisi()
    {
    	return $this->hasMany(Disposisi::class, "pegawai_id", "id");
    }
}
