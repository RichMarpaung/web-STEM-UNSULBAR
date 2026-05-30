<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $query = Partner::latest();

        // Filter berdasarkan tipe (mitra / kolaborasi)
        if ($request->has('type') && in_array($request->type, ['mitra', 'kolaborasi'])) {
            $query->where('type', $request->type);
        }

        $partners = $query->paginate(12); // Menampilkan 12 data per halaman

        return view('partner.index', compact('partners'));
    }

    public function show(Partner $partner)
    {
        return view('partner.show', compact('partner'));
    }
}
