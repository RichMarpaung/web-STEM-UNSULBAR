<?php

namespace App\Http\Controllers;

use App\Models\WorkProgram;
use Illuminate\Http\Request;

class WorkProgramController extends Controller
{
    public function index()
    {
        // Menampilkan 9 program kerja per halaman, diurutkan dari yang terbaru
        $programs = WorkProgram::latest()->paginate(9);
        return view('work_program.index', compact('programs'));
    }

    public function show($slug)
    {
        // Mencari program kerja berdasarkan slug, beserta relasi anggotanya
        $workProgram = WorkProgram::where('slug', $slug)->with('teams')->firstOrFail();
        return view('work_program.show', compact('workProgram'));
    }
}
