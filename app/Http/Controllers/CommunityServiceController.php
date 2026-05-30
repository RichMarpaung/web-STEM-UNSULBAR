<?php

namespace App\Http\Controllers;

use App\Models\CommunityService;
use Illuminate\Http\Request;

class CommunityServiceController extends Controller
{
    public function index()
    {
        // Ambil data terbaru, batasi 9 per halaman
        $services = CommunityService::latest()->paginate(9);
        return view('service.index', compact('services'));
    }

    public function show(CommunityService $communityService)
    {
        // Mengirim data tunggal ke view detail
        return view('service.show', compact('communityService'));
    }
}
