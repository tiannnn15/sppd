<?php

namespace App\Http\Controllers;

use App\Models\Suratmasuk;
use Illuminate\Http\Request;

class SuratmasukController extends Controller
{
    public function index() {
        $suratmasuk = Suratmasuk::all();
        return view('sekre.suratmasuk.index', compact('suratmasuk'));
    }

    public function create()
    {
        return view('sekre.suratmasuk.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sifat_surat_masuk'     => 'required',
            'nomer_surat_masuk'     => 'required',
            'tgl_surat_masuk'   => 'required',
            'ditujukan_kepada'     => 'required',
            'instansi_pengirim'   => 'required',
            'perihal'     => 'required',
            'status'     => 'required'
        ]);

        //create post
        Suratmasuk::create([
            'sifat_surat_masuk'     => $request->sifat_surat_masuk,
            'nomer_surat_masuk'   => $request->nomer_surat_masuk,
            'tgl_surat_masuk'     => $request->tgl_surat_masuk,
            'ditujukan_kepada'   => $request->ditujukan_kepada,
            'instansi_pengirim'     => $request->instansi_pengirim,
            'perihal'   => $request->perihal,
            'status'   => $request->status
        ]);

        //redirect to index
        return redirect()->route('suratmasuk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(Suratmasuk $suratmasuk)
    {
        //delete post
        $suratmasuk->delete();

        //redirect to index
        return redirect()->route('suratmasuk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
