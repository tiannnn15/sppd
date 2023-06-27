<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        //get posts
        $pegawai = Pegawai::all();

        //render view with posts
        return view('sekre.pegawai.index', compact('pegawai'));
    }
    public function create()
    {
        return view('sekre.pegawai.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pegawai'     => 'required',
            'nip'     => 'required',
            'jabatan'   => 'required',
            'pangkat'     => 'required',
            'golongan'   => 'required'
        ]);

        //create post
        Pegawai::create([
            'nama_pegawai'     => $request->nama_pegawai,
            'nip'   => $request->nip,
            'jabatan'     => $request->jabatan,
            'pangkat'   => $request->pangkat,
            'golongan'     => $request->golongan
        ]);

        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Pegawai $pegawai)
    {
        return view('sekre.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        //validate form
        $this->validate($request, [
            'nama_pegawai'     => 'required',
            'nip'     => 'required',
            'jabatan'   => 'required',
            'pangkat'     => 'required',
            'golongan'   => 'required'
        ]);

        $pegawai->update([
            'nama_pegawai'     => $request->nama_pegawai,
            'nip'   => $request->nip,
            'jabatan'     => $request->jabatan,
            'pangkat'   => $request->pangkat,
            'golongan'     => $request->golongan
        ]);

        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Pegawai $pegawai)
    {
        //delete post
        $pegawai->delete();

        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
