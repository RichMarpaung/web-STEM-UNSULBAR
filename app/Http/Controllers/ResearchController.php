<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Menampilkan daftar penelitian untuk publik
     */
    public function index()
    {
        // Mengambil data penelitian, diurutkan dari yang terbaru.
        // Kita gunakan pagination agar halaman tidak berat jika data sudah ratusan.
        $researches = Research::latest()->paginate(9);

        // Mengirim data $researches ke view 'research.index'
        return view('research.index', compact('researches'));
    }
    public function show(Research $research)
{
    // Laravel otomatis mencarikan data berdasarkan ID berkat Route Model Binding.
    // Jika ID tidak ditemukan, Laravel otomatis menampilkan halaman Error 404 (Not Found).
    return view('research.show', compact('research'));
}
}
