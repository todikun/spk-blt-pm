<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Aspek;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::orderBy('id', 'DESC')->get();
        return view('pages.master.kriteria.index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aspek = Aspek::all();
        return view('pages.master.kriteria.create', compact('aspek'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'aspekid' => 'required',
            'nama' => 'required',
            'nilai_ideal' => 'required|numeric'
        ]);

        Kriteria::insert([
            'aspekid' => $request->aspekid,
            'nama' => $request->nama,
            'nilai_ideal' => $request->nilai_ideal,
        ]);
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aspek = Aspek::all();
        $kriteria = Kriteria::find($id);
        return view('pages.master.kriteria.edit', compact('aspek', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'aspekid' => 'required',
            'nama' => 'required',
            'nilai_ideal' => 'required|numeric'
        ]);

        $kriteria = Kriteria::find($id);
        $kriteria->update([
            'aspekid' => $request->aspekid,
            'nama' => $request->nama,
            'nilai_ideal' => $request->nilai_ideal,
        ]);
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus');
    }
}
