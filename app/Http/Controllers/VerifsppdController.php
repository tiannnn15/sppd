<?php

namespace App\Http\Controllers;

use App\Models\Sppd;
use App\Models\Sppdpegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifsppdController extends Controller
{
    public function index() {
        $sppd = Sppd::with(['pelaksana.pegawai'])->get();
        return view('kadin.verifsppd.index', compact('sppd'));
    }

    public function terima($id)
    {
        $data=sppd::find($id);
        $data->status='terima';
        $data->save();
        return redirect()->back();
    }

    public function tolak($id)
    {
        $data=sppd::find($id);
        $data->status='tolak';
        $data->save();
        return redirect()->back();
    }

    // public function show($id){
    //     // $disposisi=Disposisi::get();
    //     // $suratmasuk=Suratmasuk::get();

    //     $sppd = DB::table('sppd')
    //         ->join('sppd_pegawai', 'sppd_pegawai.sppd_id', '=', 'sppd.id')
    //         ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
    //         ->where('sppd_pegawai.id', '=', $id)
    //         ->get()->first();
    //     $pendamping = Sppdpegawai::with('pegawai')->where(['status' => 2, 'sppd_id' => $sppd->id])->get();

    //     // dd($sppd);
    //     return view('kadin.verifsppd.show', ['sppd' => $sppd,
    //     'pendamping' => $pendamping]);

    // }

    public function show($id){
        // $disposisi=Disposisi::get();
        // $suratmasuk=Suratmasuk::get();

        $sppd = DB::table('sppd')
            ->join('sppd_pegawai', 'sppd_pegawai.sppd_id', '=', 'sppd.id')
            ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
            ->where('sppd.id', '=', $id)
            ->get()->first();
        $pendamping = Sppdpegawai::with('pegawai')->where(['status' => 2, 'sppd_id' => $sppd->id])->get();

        // dd($sppd);
        return view('kadin.verifsppd.show', ['sppd' => $sppd,
        'pendamping' => $pendamping]);

    }
    // public function show($id){
    //     $sppd = DB::table('sppd')
    //         ->join('sppd_pegawai', 'sppd_pegawai.sppd_id', '=', 'sppd.id')
    //         ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
    //         ->where('sppd_pegawai.id', '=', $id)
    //         ->first();

    //     if ($sppd !== null) {
    //         $pendamping = Sppdpegawai::with('pegawai')->where(['status' => 2, 'sppd_id' => $sppd->id])->get();

    //         return view('kadin.verifsppd.show', [
    //             'sppd' => $sppd,
    //             'pendamping' => $pendamping
    //         ]);
    //     } else {
    //         // Handle the case when $sppd is null
    //         // For example, return an error message or redirect to an error page
    //     }
    // }


    // public function show(Sppd $sppd)
    // {
    //     $sppd = Sppd::with(['pelaksana.pegawai'])->where('id', $sppd->id)->first();
    //     $pendamping = Sppdpegawai::with('pegawai')->where(['status' => 2, 'sppd_id' => $sppd->id])->get();
    //     return view('staff.sppd.show', [
    //         'sppd' => $sppd,
    //         'pendamping' => $pendamping
    //     ]);
    // }

}
