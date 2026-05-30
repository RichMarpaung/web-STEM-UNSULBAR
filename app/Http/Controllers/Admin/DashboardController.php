<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\CommunityService;
use App\Models\Output;
use App\Models\Partner;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data dari masing-masing tabel
        $totalResearch = Research::count();
        $totalService  = CommunityService::count();
        $totalOutput   = Output::count();
        $totalPartner  = Partner::count();

        return view('admin.dashboard', compact(
            'totalResearch', 'totalService', 'totalOutput', 'totalPartner'
        ));
    }
}