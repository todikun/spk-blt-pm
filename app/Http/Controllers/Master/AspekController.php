<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Aspek;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspek = Aspek::orderBy('id', 'DESC')->get();
        return view('pages.master.aspek.index', compact('aspek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.master.aspek.create');
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
            'kode' => 'required|min:2|max:5|unique:aspek',
            'nama' => 'required'
        ]);

        Aspek::insert([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        notify()->success('Aspek berhasil disimpan', 'Success');
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
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aspek = Aspek::find($id);
        return view('pages.master.aspek.edit', compact('aspek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspek $aspek)
    {
        $request->validate([
            'kode' => 'required|min:2|max:5|',
            'nama' => 'required'
        ]);

        $aspek->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        notify()->success('Aspek berhasil diupdate', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspek = Aspek::find($id);
        $aspek->delete();

        notify()->success('Aspek berhasil dihapus', 'Success');
        return back();
    }
}
