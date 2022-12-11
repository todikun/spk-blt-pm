<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $warga_month = Warga::whereMonth('periode', Carbon::now()->format('m'))
            ->whereYear('periode', Carbon::now()->format('Y'))
            ->where('is_validasi', true)->where('nilai_akhir', '<>', 0)->orderBy('nilai_akhir', 'DESC')->get();
            
        $warga_year = Warga::whereYear('periode', Carbon::now()->format('Y'))
        ->where('is_validasi', true)->where('nilai_akhir', '<>', 0)->orderBy('nilai_akhir', 'DESC')->get();

        return view('pages.index', compact('warga_month', 'warga_year'));
    }
}
