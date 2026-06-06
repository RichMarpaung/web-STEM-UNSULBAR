<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkProgram;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WorkProgramController extends Controller
{
    public function index()
    {
        $programs = WorkProgram::latest()->paginate(10);
        return view('admin.work_program.index', compact('programs'));
    }

    public function create()
    {
        $teams = Team::orderBy('name', 'asc')->get();
        return view('admin.work_program.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'date'        => 'required|date',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'team_ids'    => 'nullable|array',
            'team_ids.*'  => 'exists:teams,id',
        ]);

        $data = $request->except('team_ids');
        $data['slug'] = Str::slug($request->name);

        // Konversi Native WebP
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(20) . '.webp';
            $path = 'work-program/' . $filename;

            $imageResource = imagecreatefromstring(file_get_contents($file->getRealPath()));

            if ($imageResource !== false) {
                ob_start();
                imagewebp($imageResource, null, 80);
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['image'] = $path;
            } else {
                $data['image'] = $file->store('work-program', 'public');
            }
        }

        $program = WorkProgram::create($data);

        // Relasi Anggota
        if ($request->filled('team_ids')) {
            $program->teams()->attach($request->team_ids);
        }

        return redirect()->route('admin.work_program.index')->with('success', 'Program Kerja berhasil ditambahkan!');
    }

    public function edit(WorkProgram $workProgram)
    {
        $teams = Team::orderBy('name', 'asc')->get();
        return view('admin.work_program.edit', compact('workProgram', 'teams'));
    }

    public function update(Request $request, WorkProgram $workProgram)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'date'        => 'required|date',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'team_ids'    => 'nullable|array',
            'team_ids.*'  => 'exists:teams,id',
        ]);

        $data = $request->except('team_ids');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if ($workProgram->image) {
                Storage::disk('public')->delete($workProgram->image);
            }

            $file = $request->file('image');
            $filename = Str::random(20) . '.webp';
            $path = 'work-program/' . $filename;

            $imageResource = imagecreatefromstring(file_get_contents($file->getRealPath()));

            if ($imageResource !== false) {
                ob_start();
                imagewebp($imageResource, null, 80);
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['image'] = $path;
            } else {
                $data['image'] = $file->store('work-program', 'public');
            }
        }

        $workProgram->update($data);

        if ($request->filled('team_ids')) {
            $workProgram->teams()->sync($request->team_ids);
        } else {
            $workProgram->teams()->detach();
        }

        return redirect()->route('admin.work_program.index')->with('success', 'Program Kerja berhasil diperbarui!');
    }

    public function destroy(WorkProgram $workProgram)
    {
        if ($workProgram->image) {
            Storage::disk('public')->delete($workProgram->image);
        }
        $workProgram->teams()->detach();
        $workProgram->delete();

        return redirect()->route('admin.work_program.index')->with('success', 'Program Kerja berhasil dihapus!');
    }
}
