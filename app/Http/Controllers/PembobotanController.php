<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Pembobotan;
use App\Models\Warga;
use Illuminate\Http\Request;

class PembobotanController extends Controller
{
    public function hitung()
    {
        $id = request()->get('warga');
        $nilai = Hasil::where('wargaid', $id)->get();
        $warga = Warga::find($id);
        $max_bobot = Kriteria::orderBy('nilai_ideal', 'DESC')->first();
        $aspek = Aspek::all();

        $aspekItem = array($aspek);
        $tempCf = array();
        $tempSf = array();
        $cf = array();
        $sf = array();

        // Rumus
        for ($i = 0; $i < sizeof($aspek); $i++) {
            foreach ($nilai as $item) {
                $tempSf = [];
                if ($item->aspekid == $aspekItem[0][$i]->id && $item->prioritas == 60) {
                    array_push($tempCf, $item->gap + $max_bobot->nilai_ideal);
                    $cf = array_sum($tempCf) / sizeof($tempCf);
                } else if ($item->aspekid == $aspekItem[0][$i]->id && $item->prioritas == 40) {
                    $tempCf = [];
                    array_push($tempSf, $item->gap + $max_bobot->nilai_ideal);
                    $sf = array_sum($tempSf) / sizeof($tempSf);
                }
            }
            $bobot = (0.6 * $cf + 0.4 * $sf);
            Pembobotan::create([
                'wargaid' => $id,
                'cf_aspek' => $cf,
                'sf_aspek' => $sf,
                'rata_rata' => $bobot,
                'total' => $bobot / sizeof($aspek),
            ]);
        }

        $warga->update([
            'is_validasi' => true,
            'nilai_akhir' => Pembobotan::where('wargaid', $id)->get()->sum('total'),
        ]);

        notify()->success('Validasi berhasil', 'Success');
        return back();
    }
}
