<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Menampilkan halaman Landing Page Pusat Studi STEM
     */
    public function index()
    {
        // Menyemburkan (render) file view bernama 'landing.blade.php'
        return view('landing');
    }
}
