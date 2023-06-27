<?php

namespace App\Http\Controllers;
use App\Models\Disposisi;
use App\Models\Pegawai;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{

    public function index(){
        // mengambil semua
        // $suratmasuk = Suratmasuk::all();
        // return data ke view
        // return view('suratmasuk', ['suratmasuk' => $suratmasuk]);

        $disposisi = Disposisi::latest()->paginate(10);
        return view('kadin.disposisi.index', compact('disposisi'));
    }

    public function create()
    {
        $pegawai = Pegawai::all();
        $disposisi = Disposisi::all();
        return view('kadin.disposisi.create', ['pegawai' => $pegawai], ['disposisi' => $disposisi]);
    }

    public function store(Request $request)
    {

        // $request['pengikut'] = implode(", ", $request['pengikut']);
        // return $request->all();
        // $select = $request->all();
        // $select = implode(",", $select);
        // $select['pengikut'] = json_encode($select['pengikut']);
        // return $select->implode('pengikut', ', ');
        // Disposisi::create($select);

        $this->validate($request, [
            'suratmasuk_id'     => 'required',
            'pegawai_id'     => 'required',
            'pengikut' => 'required',
            'tgl_diterima'     => 'required',
            'nomer_agenda'     => 'required',
            'sifat_surat'   => 'required',
            'hal_surat'     => 'required',
            'urgensi_surat'   => 'required',
            'catatan_disposisi'     => 'required',
            'tgl_disposisi'     => 'required'

        ]);

        //create
        Disposisi::create([
            'suratmasuk_id'     => $request->suratmasuk_id,
            'pegawai_id'     => $request->pegawai_id,
            'pengikut'   => $request->pengikut,
            'tgl_diterima'     => $request->tgl_diterima,
            'nomer_agenda'   => $request->nomer_agenda,
            'sifat_surat'     => $request->sifat_surat,
            'hal_surat'   => $request->hal_surat,
            'urgensi_surat'     => $request->urgensi_surat,
            'catatan_disposisi'   => $request->catatan_disposisi,
            'tgl_disposisi'   => $request->tgl_disposisi

        ]);

        //redirect to ind
        return redirect()->route('disposisi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Disposisi $disposisi)
    {
        $pegawai = Pegawai::all();
        $disposisi = Disposisi::all();
        return view('kadin.disposisi.edit', ['pegawai' => $pegawai], ['disposisi' => $disposisi]);
    }

    public function update(Request $request, Disposisi $disposisi)
    {
        $this->validate($request, [
            'suratmasuk_id'     => 'required',
            'pegawai_id'     => 'required',
            'pengikut' => 'required',
            'tgl_diterima'     => 'required',
            'nomer_agenda'     => 'required',
            'sifat_surat'   => 'required',
            'hal_surat'     => 'required',
            'urgensi_surat'   => 'required',
            'catatan_disposisi'     => 'required',
            'tgl_disposisi'     => 'required'
        ]);

        $disposisi->update([
            'suratmasuk_id'     => $request->suratmasuk_id,
            'pegawai_id'     => $request->pegawai_id,
            'pengikut'   => $request->pengikut,
            'tgl_diterima'     => $request->tgl_diterima,
            'nomer_agenda'   => $request->nomer_agenda,
            'sifat_surat'     => $request->sifat_surat,
            'hal_surat'   => $request->hal_surat,
            'urgensi_surat'     => $request->urgensi_surat,
            'catatan_disposisi'   => $request->catatan_disposisi,
            'tgl_disposisi'   => $request->tgl_disposisi
        ]);

        //redirect to index
        return redirect()->route('disposisi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Disposisi $disposisi)
    {

        $disposisi->delete();

        //redirect to ind
        return redirect()->route('disposisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function show(Disposisi $disposisi){

        return view('kadin.disposisi.show', compact('disposisi'));
    }


}
