<?php

namespace App\Http\Controllers;

use App\Models\Output;
use Illuminate\Http\Request;

class OutputController extends Controller
{
    public function index(Request $request)
    {
        $query = Output::latest();

        // Jika ada filter tipe di URL (contoh: ?type=jurnal)
        if ($request->has('type') && in_array($request->type, ['jurnal', 'hki', 'penghargaan'])) {
            $query->where('type', $request->type);
        }

        $outputs = $query->paginate(9);

        return view('output.index', compact('outputs'));
    }

    public function show(Output $output)
    {
        return view('output.show', compact('output'));
    }
}
