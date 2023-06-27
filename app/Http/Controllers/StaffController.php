<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index() {
        return view('staff.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'suratmasuk_id'     => 'required',
            'tgl_diterima'     => 'required',
            'nomer_agenda'     => 'required',
            'sifat_surat'   => 'required',
            'hal_surat'     => 'required',
            'urgensi_surat'   => 'required',
            'catatan_disposisi'     => 'required',
            'tgl_disposisi'     => 'required'
        ]);

        //create post
        Disposisi::create([
            'suratmasuk_id'     => $request->suratmasuk_id,
            'tgl_diterima'     => $request->tgl_diterima,
            'nomer_agenda'   => $request->nomer_agenda,
            'sifat_surat'     => $request->sifat_surat,
            'hal_surat'   => $request->hal_surat,
            'urgensi_surat'     => $request->urgensi_surat,
            'catatan_disposisi'   => $request->catatan_disposisi,
            'tgl_disposisi'   => $request->tgl_disposisi
        ]);

        //redirect to index
        // return redirect()->route('disposisi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function listdisposisi(){
        $disposisi = Disposisi::latest()->paginate(10);
        // return data ke view
        return view('staff.listdisposisi', ['disposisi' => $disposisi]);
    }

    public function show($id){
        // $disposisi=Disposisi::get();
        // $suratmasuk=Suratmasuk::get();
        $item = DB::table('suratmasuk')
            ->join('disposisi', 'disposisi.suratmasuk_id', '=', 'suratmasuk.id')
            ->join('pegawai', 'pegawai.id', '=', 'disposisi.pegawai_id')
            ->where('disposisi.id', '=', $id)
            ->get()->first();
// dd($item);
        return view('staff.show', ['item' => $item]);

    }

    public function destroy(Disposisi $disposisi)
    {
        //delete post
        $disposisi->delete();

        //redirect to index
        return redirect()->route('disposisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}











