<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BendController extends Controller
{
    public function index() {
        // $kwitansi = Kwitansi::with(['sppd', 'sppd.pelaksana.pegawai'])->get();

        // $kwitansi = DB::table('kwitansi')
        //     ->join('sppd', 'sppd.id', '=', 'kwitansi.sppd_id')
        //     ->join('sppd_pegawai', 'sppd_pegawai.sppd_id', '=', 'sppd.id')
        //     ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
        //     ->join('disposisi', 'disposisi.pegawai_id', '=', 'pegawai.id')
        //     ->join('suratmasuk', 'suratmasuk.id', '=', 'disposisi.suratmasuk_id')
        //     // ->where('kwitansi.id', '=', $id)
        //     // ->distinct('sppd_pegawai.id')
        //     ->get();
        // // dd($kwitansi);

        $suratmasuk = Suratmasuk::latest()->paginate(10);
        return view('bend.index', [
            'suratmasuk' => $suratmasuk
        ]);
    }
}
