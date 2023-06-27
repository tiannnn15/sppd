<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function index() {
        $penginapan = Penginapan::all();

        return view('sekre.penginapan.index', compact('penginapan'));
    }

    public function create()
    {
        return view('sekre.penginapan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'provinsi_id'     => 'required',
            'satuan'     => 'required',
            'gol_i'   => 'required',
            'gol_ii'     => 'required',
            'gol_iii'   => 'required',
            'gol_iv' => 'required'
        ]);

        //create post
        Penginapan::create([
            'provinsi_id'     => $request->provinsi_id,
            'satuan'   => $request->satuan,
            'gol_i'     => $request->gol_i,
            'gol_ii'   => $request->gol_ii,
            'gol_iii'     => $request->gol_iii,
            'gol_iv'    => $request->gol_iv
        ]);

        //redirect to index
        return redirect()->route('penginapan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Penginapan $penginapan)
    {
        return view('sekre.penginapan.edit', compact('penginapan'));
    }

    public function update(Request $request, Penginapan $penginapan)
    {
        //validate form
        $this->validate($request, [
            'provinsi_id'     => 'required',
            'satuan'     => 'required',
            'gol_i'   => 'required',
            'gol_ii'     => 'required',
            'gol_iii'   => 'required',
            'gol_iv' => 'required'
        ]);

        $penginapan->update([
            'provinsi_id'     => $request->provinsi_id,
            'satuan'   => $request->satuan,
            'gol_i'     => $request->gol_i,
            'gol_ii'   => $request->gol_ii,
            'gol_iii'     => $request->gol_iii,
            'gol_iv'    => $request->gol_iv
        ]);

        //redirect to index
        return redirect()->route('penginapan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Penginapan $penginapan)
    {
        //delete post
        $penginapan->delete();

        //redirect to index
        return redirect()->route('penginapan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
