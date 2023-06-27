<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifkwitansiController extends Controller
{
    public function index() {
        $kwitansi = Kwitansi::with(['sppd', 'sppd.pelaksana.pegawai'])->get();
        return view('bend.verifkwitansi.index', [
            'kwitansi' => $kwitansi
        ]);
        // return view('bend.verifkwitansi.index');
    }

    // public function show($id)
    // {
    //     $kwitansi = DB::table('kwitansi')
    //         ->join('sppd', 'sppd.id', '=', 'kwitansi.sppd_id')
    //         // ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
    //         ->where('sppd.id', '=', $id)
    //         ->get()->first();
    //     $kwitansi = Kwitansi::with(['sppd.pelaksana.pegawai'])->where('id', $kwitansi->id)->first();
    //     return view('bend.verifkwitansi.show', [
    //         'kwitansi' => $kwitansi,
    //     ]);
    // }

    // public function show($id) {

    //     $pengeluaran = DB::table('pengeluaran')
    //         ->join('sppd', 'sppd.id', '=', 'pengeluaran.sppd_id')
    //         ->join('sppd_pegawai', 'sppd_pegawai.sppd_id', '=', 'sppd.id')
    //         ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
    //         // ->join('sppd', 'sppd.provinsi_id', '=', 'provinsi.id')
    //         ->where('pengeluaran.id', '=', $id)
    //         ->get()->first();
    //     // $pengeluaran = Pengeluaran::with(['sppd'])->where('id', $pengeluaran->id)->first();
    //     // $provinsi = Provinsi::where('id', $pengeluaran->sppd->provinsi_id)->first();
    //     // $pegawai = Sppdpegawai::with(['pegawai'])->where('sppd_id', $pengeluaran->sppd_id)->count();
    //     // dd($pengeluaran);
    //     return view('bend.verifpengeluaran.show', [

    //         'pengeluaran' => $pengeluaran
    //     ]);
    // }

    public function show($id)
    {
        $kwitansi = DB::table('kwitansi')
            ->join('sppd', 'sppd.id', '=', 'kwitansi.sppd_id')
            ->join('sppd_pegawai', 'sppd_pegawai.sppd_id', '=', 'sppd.id')
            ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
            ->where('kwitansi.id', '=', $id)
            ->get()->first();
        // $kwitansi = Kwitansi::with(['sppd.pelaksana.pegawai'])->where('id', $kwitansi->id)->first();
        // dd($kwitansi);
        return view('bend.verifkwitansi.show', [
            'kwitansi' => $kwitansi,
        ]);
    }

    public function approve($id)
    {
        $data=kwitansi::find($id);
        $data->status='approve';
        $data->save();
        return redirect()->back();
    }

    public function disapprove($id)
    {
        $data=kwitansi::find($id);
        $data->status='disapprove';
        $data->save();
        return redirect()->back();
    }
}
