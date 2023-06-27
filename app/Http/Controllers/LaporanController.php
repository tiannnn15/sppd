<?php

namespace App\Http\Controllers;

use App\Models\Sppd;
use App\Models\Laporan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();
        return view('staff.laporan.index', [
            'laporan' => $laporan
        ]);
    }

    public function create()
    {
        $sppd = Sppd::all();
        return view('staff.laporan.create', [
            'sppd' => $sppd,]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'sppd_id' => 'required',
        //     'laporan_tentang' => 'required',
        //     'latar_belakang' => 'required',
        //     'landasan' => 'required',
        //     'maksud_tujuan' => 'required',
        //     'kegiatan' => 'required',
        //     'perihal' => 'required',
        //     'kesimpulan' => 'required',
        //     'tgl_laporan' => 'required',
        //     'penutup' => 'required',
        //     'status' => 'required'
        // ]);

        //upload image

        //create post
        // Laporan::create([
        //     'sppd_id' => $request->sppd_id,
        //     'laporan_tentang' => $request->laporan_tentang,
        //     'latar_belakang' => $request->latar_belakang,
        //     'landasan' => $request->landasan,
        //     'maksud_tujuan' => $request->maksud_tujuan,
        //     'kegiatan' => $request->kegiatan,
        //     'perihal' => $request->perihal,
        //     'kesimpulan' => $request->kesimpulan,
        //     'tgl_laporan' => $request->tgl_laporan,
        //     'penutup' => $request->penutup,
        //     'status' => $request->status
        // ]);

        $request->validate([
            'sppd_id' => 'required',
            'laporan_tentang' => 'required',
            'latar_belakang' => 'required',
            'landasan' => 'required',
            'maksud_tujuan' => 'required',
            'kegiatan' => 'required',
            'perihal' => 'required',
            'kesimpulan' => 'required',
            'tgl_laporan' => 'required',
            'penutup' => 'required',
            'status' => 'required',
            'gambar'   => 'required|image|mimes:png,jpg|max:2040'
        ]);

        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '-' . $slug;
        $gambar->move('uploads/gambar/', $new_gambar);

        $laporan = new Laporan;
        $laporan->sppd_id = $request->sppd_id;
        $laporan->laporan_tentang = $request->laporan_tentang;
        $laporan->latar_belakang = $request->latar_belakang;
        $laporan->landasan = $request->landasan;
        $laporan->maksud_tujuan = $request->maksud_tujuan;
        $laporan->kegiatan = $request->kegiatan;
        $laporan->perihal = $request->perihal;
        $laporan->kesimpulan = $request->kesimpulan;
        $laporan->tgl_laporan = $request->tgl_laporan;
        $laporan->penutup = $request->penutup;
        $laporan->status = $request->status;
        $laporan->gambar = 'uploads/gambar/' . $new_gambar;
        $laporan->save();

        //redirect to index
        return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        //delete post
        // $laporan->delete();

        $laporan = Laporan::find($id);
        $laporan->delete();

        //redirect to index
        return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    // public function show($id)
    // {
    //     $laporan = DB::table('laporan')
    //         ->join('sppd', 'sppd.id', '=', 'laporan.sppd_id')
    //         // ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
    //         ->where('sppd.id', '=', $id)
    //         ->get()->first();
    //     $laporan = Laporan::with(['sppd.pelaksana.pegawai'])->where('id', $laporan->id)->first();
    //     return view('staff.laporan.show', [
    //         'laporan' => $laporan,
    //     ]);
    // }

    public function show($id)
    {
        $laporan = DB::table('laporan')
        ->join('sppd', 'sppd.id', '=', 'laporan.sppd_id')
        // ->join('pegawai', 'pegawai.id', '=', 'sppd_pegawai.pegawai_id')
        ->where('laporan.id', '=', $id)
        ->get()->first();
        // dd($laporan);
        return view('staff.laporan.show', [
            'laporan' => $laporan,
        ]);
    }

    // public function edit($id)
    // {
    //     return view('staff.laporan.edit')->with([
    //         'laporan' => Laporan::find($id)
    //     ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'sppd_id' => 'required',
    //         'laporan_tentang' => 'required',
    //         'latar_belakang' => 'required',
    //         'landasan' => 'required',
    //         'maksud_tujuan' => 'required',
    //         'kegiatan' => 'required',
    //         'perihal' => 'required',
    //         'kesimpulan' => 'required',
    //         'tgl_laporan' => 'required',
    //         'penutup' => 'required',
    //         'status' => 'required'
    //     ]);

    //     $laporan = Laporan::find($id);

    //     if($request->hasFile('gambar')){
    //         $request->validate([
    //             'gambar'   => 'required|image|mimes:png,jpg|max:2040'
    //         ]);
    //         File::delete($laporan->gambar);
    //         $gambar = $request->gambar;
    //         $slug = Str::slug($gambar->getClientOriginalName());
    //         $new_gambar = time() . '-' . $slug;
    //         $gambar->move('uploads/gambar/', $new_gambar);
    //         $laporan->gambar = 'uploads/gambar/' . $new_gambar;
    //         $laporan->save();
    //     }

    //     $laporan->sppd_id = $request->sppd_id;
    //     $laporan->laporan_tentang = $request->laporan_tentang;
    //     $laporan->latar_belakang = $request->latar_belakang;
    //     $laporan->landasan = $request->landasan;
    //     $laporan->maksud_tujuan = $request->maksud_tujuan;
    //     $laporan->kegiatan = $request->kegiatan;
    //     $laporan->perihal = $request->perihal;
    //     $laporan->kesimpulan = $request->kesimpulan;
    //     $laporan->tgl_laporan = $request->tgl_laporan;
    //     $laporan->penutup = $request->penutup;
    //     $laporan->status = $request->status;
    //     $laporan->save();

    //     //redirect to index
    //     return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Diubah!']);
    // }


}
