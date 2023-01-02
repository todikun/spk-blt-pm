<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Kondisi;
use App\Models\Kriteria;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaKondisiController extends Controller
{
    public function create()
    {
        $id = request()->get('warga');
        $warga = Warga::find($id);
        $kondisi = Kondisi::all();
        $hasil = Hasil::where('wargaid', $id)->get();

        $data = [];
        for ($i = 0; $i < sizeof($kondisi); $i++) { 
            for ($j = 0; $j < sizeof($hasil); $j++) { 
                if ($kondisi[$i]['kriteriaid'] == $hasil[$j]['kriteriaid']) {
                    array_push($data, $kondisi[$i]['kriteriaid']);
                }
            }
        }

        return view('pages.data-warga.kondisi', compact('warga', 'kondisi', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kondisiid' => 'required',
        ]);
        
        $kondisi = Kondisi::where('id', $request->kondisiid)->first();
        $nilaiKondisi = Kondisi::find($request->kondisiid);
        $kriteria = Kriteria::find($kondisi->kriteriaid);

        // validasi kondisi
        $hasil = Hasil::where('wargaid', $request->wargaid)->where('kriteriaid', $kondisi->kriteriaid)->get();
        if ($hasil->count() > 0) {
            notify()->warning('Kondisi ' . $kondisi->kriteria->nama . ' sudah ditambahkan!', 'Warning');
            return redirect()->route('warga.show', $request->wargaid);
        }

        Hasil::create([
            'wargaid' => $request->wargaid,
            'kondisiid' => $request->kondisiid,
            'kriteriaid' => $kondisi->kriteriaid,
            'aspekid' => $kriteria->aspekid,
            'prioritas' => $kriteria->prioritas,
            'nilai' => $nilaiKondisi->nilai,
            'gap' => $nilaiKondisi->nilai - $kriteria->nilai_ideal,
        ]);

        notify()->success('Kondisi berhasil disimpan', 'Success');
        return redirect()->route('warga.show', $request->wargaid);
    }

    public function destroy($id)
    {
        $hasil = Hasil::find($id);
        $hasil->delete();

        notify()->success('Kondisi berhasil dihapus', 'Success');
        return back();
    }
}
