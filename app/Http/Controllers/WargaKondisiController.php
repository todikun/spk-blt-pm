<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Kondisi;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaKondisiController extends Controller
{
    public function create()
    {
        $id = request()->get('warga');
        $warga = Warga::find($id);
        $kondisi = Kondisi::all();
        return view('pages.data-warga.kondisi', compact('warga', 'kondisi'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'kondisiid' => 'required',
        ]);

        $kondisi = Kondisi::where('id', $request->kondisiid)->first();

        // validasi kondisi
        $hasil = Hasil::where('wargaid', $request->wargaid)->where('kriteriaid', $kondisi->kriteriaid)->get();
        if ($hasil->count() > 0) {
            return redirect()->route('warga.show', $request->wargaid)
                ->with('error', 'Kondisi ' . $kondisi->kriteria->nama . ' sudah ditambahkan!');
        }

        Hasil::create([
            'wargaid' => $request->wargaid,
            'kondisiid' => $request->kondisiid,
            'kriteriaid' => $kondisi->kriteriaid,
            'nilai' => '5555',
        ]);

        return redirect()->route('warga.show', $request->wargaid)->with('success', 'Kondisi berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $hasil = Hasil::find($id);
        $hasil->delete();
        return back()->with('success', '');
    }
}
