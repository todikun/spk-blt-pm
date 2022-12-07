<?php

namespace App\Http\Controllers;

use App\Models\Aspek;
use App\Models\Hasil;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class PerangkinganController extends Controller
{
    public function hitung()
    {
        $warga = request()->get('warga');
        $nilai = Hasil::where('wargaid', $warga)->get();
        $max_bobot = Kriteria::orderBy('nilai_ideal', 'DESC')->first();
        $aspek = Aspek::all();

        $aspekItem = [$aspek];

        $cf = array();
        $sf = [];
        $rata_rata = 0;
        // dd($aspekItem[0][0]->id);

        // foreach ($nilai as $n) {
        //     if ($n->aspekid == $aspekItem[0][$i]->id && $n->kriteria->prioritas == 60) {
        //         dd($cf += $n->aspekid + $max_bobot);
        //     } else if ($n->aspekid == $aspekItem[0][$i]->id && $n->kriteria->prioritas == 40) {
        //     }
        // }

        for ($i = 0; $i < sizeof($aspek); $i++) {
            for ($j = 0; $j < sizeof($nilai); $j++) {
                if ($nilai[$j]->aspekid == $aspek[$i]->id && $nilai[$j]->kriteria->prioritas == 60) {

                    array_push($cf, $nilai[$j]->gap);
                } else if ($nilai[$j]->aspekid == $aspek[$i]->id && $nilai[$j]->kriteria->prioritas == 40) {

                    array_push($sf, $nilai[$j]->gap);
                }
            }
        }

        // dd($nilai[0]->kriteria->prioritas);
        // dd($nilai[0]->aspekid);
        // dd($nilai[0]->gap);
        // dd($aspek[0]);
        dd($cf, $sf);




        return view();
    }
}
