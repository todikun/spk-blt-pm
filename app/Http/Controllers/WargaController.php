<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Kondisi;
use App\Models\Kriteria;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = request()->get('periode') ?? Carbon::now();

        $warga = Warga::whereMonth('periode', Carbon::parse($periode)->format('m'))
            ->whereYear('periode', Carbon::parse($periode)->format('Y'))
            ->where('is_validasi', false)->orderBy('id', 'DESC')->get();

        $kriteria = Kriteria::all()->count();
        return view('pages.data-warga.index', compact('warga', 'kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.data-warga.create');
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
            'nik' => 'required',
            'nama' => 'required',
            'periode' => 'required',
        ]);

        $warga = Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'periode' => $request->periode . '-01',
        ]);

        return redirect()->route('warga.show', $warga->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warga = Warga::find($id);
        $hasil = Hasil::where('wargaid', $warga->id)->get();
        $kriteria = Kriteria::get();

        return view('pages.data-warga.show', compact('warga', 'hasil', 'kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kondisi = Kondisi::find($id);
        $item_kondisi = Kondisi::all($id);
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
        $warga = Warga::find($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Warga berhasil dihapus');
    }

    public function search(Request $request)
    {
        $type = $request->type;
        if ($type == 'index') {
            return redirect()->route('warga.index', ['periode' => $request->periode]);
        } else {
            return redirect()->route('warga.result', ['periode' => $request->periode]);
        }
    }

    public function result()
    {
        $periode = request()->get('periode') ?? Carbon::now();

        $warga = Warga::whereMonth('periode', Carbon::parse($periode)->format('m'))
            ->whereYear('periode', Carbon::parse($periode)->format('Y'))
            ->where('is_validasi', true)->where('nilai_akhir', '<>', 0)->orderBy('nilai_akhir', 'DESC')->get();

        return view('pages.data-warga.result', compact('warga', 'periode'));
    }

    public function laporan()
    {
        $periode = request()->get('periode') ?? Carbon::now();

        $warga = Warga::whereMonth('periode', Carbon::parse($periode)->format('m'))
            ->whereYear('periode', Carbon::parse($periode)->format('Y'))
            ->where('is_validasi', true)->where('nilai_akhir', '<>', 0)->orderBy('nilai_akhir', 'DESC')->get();

        if (sizeof($warga) == 0) {
            return back()->with('error', 'Data pada periode ' . Carbon::parse($periode)->format('F Y') . ' belum ada!');
        }

        $pdf = PDF::loadview('pages.data-warga.laporan', ['warga' => $warga, 'periode' => $periode])
            ->setPaper('A4', 'potrait');

        return $pdf->download('BLT Periode [' . Carbon::parse($periode)->format('F Y') . '].pdf');
    }
}
