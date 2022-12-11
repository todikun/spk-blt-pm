<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kondisi;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request()->get('kriteria');
        $kriteria = Kriteria::find($id);
        $kondisi = Kondisi::where('kriteriaid', $id)->get();

        return view('pages.master.kriteria.kondisi.index', compact('kriteria', 'kondisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = request()->get('kriteria');
        $kriteria = Kriteria::find($id);
        return view('pages.master.kriteria.kondisi.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kriteria = Kriteria::find($request->kriteriaid);

        $request->validate([
            'kriteriaid' => 'required',
            'nama' => 'required',
            'nilai' => 'required|lte:' . $kriteria->nilai_ideal,
        ]);

        Kondisi::create([
            'kriteriaid' => $request->kriteriaid,
            'nama' => $request->nama,
            'nilai' => $request->nilai,
        ]);

        notify()->success('Kondisi berhasil disimpan', 'Success');
        return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kondisi = Kondisi::find($id);
        $kondisi->delete();

        notify()->success('Kondisi berhasil dihapus', 'Success');
        return back();
    }
}
