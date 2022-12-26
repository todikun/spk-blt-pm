<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Warga, Aspek, Kriteria};
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {   
        $warga = Warga::whereYear('periode', Carbon::now()->format('Y'))
        ->where('is_validasi', true)->where('nilai_akhir', '<>', 0)->get()->count();

        $aspek = Aspek::get()->count();
        $kriteria = Kriteria::get()->count();

        return view('pages.index', compact('warga', 'aspek', 'kriteria'));
    }
}
