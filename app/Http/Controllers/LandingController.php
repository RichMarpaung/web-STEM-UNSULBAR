<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Output;
use App\Models\Partner;
use App\Models\Research;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Menampilkan halaman Landing Page Pusat Studi STEM
     */
    public function index()
    {
        // 1. Mengambil Data Statistik
        $researchCount = Research::count();
        $journalCount  = Output::where('type', 'jurnal')->count();
        $hkiCount      = Output::where('type', 'hki')->count();
        $partnerCount  = Partner::count();

        // 2. Mengambil 3 Penelitian Terbaru untuk di-highlight
        $recentResearches = Research::latest()->take(3)->get();

        // 3. Mengambil Mitra yang memiliki logo untuk ditampilkan
        $partners = Partner::whereNotNull('logo')->latest()->take(6)->get();
// TAMBAHKAN INI: Ambil data slider
        $sliders = Slider::latest()->get();

        return view('landing', compact(
            'researchCount', 'journalCount', 'hkiCount', 'partnerCount', 'recentResearches', 'partners', 'sliders'
        ));

    }

    public function about()
    {
       $teams = Team::all();
    return view('about', compact('teams'));
    }
}
