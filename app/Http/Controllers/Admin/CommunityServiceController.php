<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityService;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CommunityServiceController extends Controller
{
    public function index()
    {
        $services = CommunityService::latest()->paginate(10);
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $teams = Team::orderBy('name', 'asc')->get();
        return view('admin.service.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'date'        => 'required|date',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'team_ids'    => 'nullable|array',
            'team_ids.*'  => 'exists:teams,id',
        ]);

        // Ambil semua input kecuali team_ids
        $data = $request->except('team_ids');

        // Generate Slug otomatis dari Judul Pengabdian
        $data['slug'] = Str::slug($request->title);

        // --- KONVERSI WEBP MENGGUNAKAN NATIVE PHP ---
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(20) . '.webp';
            $path = 'service/' . $filename;

            $imageResource = imagecreatefromstring(file_get_contents($file->getRealPath()));

            if ($imageResource !== false) {
                ob_start();
                imagewebp($imageResource, null, 80); // Kualitas 80%
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['image'] = $path;
            } else {
                $data['image'] = $file->store('service', 'public');
            }
        }

        // Simpan Data Utama Pengabdian ke Database
        $communityService = CommunityService::create($data);

        // Simpan Relasi Anggota Tim ke Tabel Pivot (Many-to-Many)
        if ($request->filled('team_ids')) {
            $communityService->teams()->attach($request->team_ids);
        }

        return redirect()->route('admin.service.index')
            ->with('success', 'Data kegiatan pengabdian berhasil ditambahkan !');
    }

    public function edit(CommunityService $communityService)
    {
        $teams = Team::orderBy('name', 'asc')->get();
        return view('admin.service.edit', compact('communityService', 'teams'));
    }

    public function update(Request $request, CommunityService $communityService)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'date'        => 'required|date',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'team_ids'    => 'nullable|array',
            'team_ids.*'  => 'exists:teams,id',
        ]);

        $data = $request->except('team_ids');
        $data['slug'] = Str::slug($request->title);

        // --- KONVERSI WEBP MENGGUNAKAN NATIVE PHP (UNTUK UPDATE) ---
        if ($request->hasFile('image')) {
            if ($communityService->image) {
                Storage::disk('public')->delete($communityService->image);
            }

            $file = $request->file('image');
            $filename = Str::random(20) . '.webp';
            $path = 'service/' . $filename;

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
                $data['image'] = $file->store('service', 'public');
            }
        }

        $communityService->update($data);

        // Sinkronisasi Relasi Anggota Tim (Many-to-Many)
        if ($request->filled('team_ids')) {
            $communityService->teams()->sync($request->team_ids);
        } else {
            $communityService->teams()->detach();
        }

        return redirect()->route('admin.service.index')
            ->with('success', 'Data kegiatan pengabdian berhasil diperbarui!');
    }

    public function destroy(CommunityService $communityService)
    {
        if ($communityService->image) {
            Storage::disk('public')->delete($communityService->image);
        }

        $communityService->teams()->detach();
        $communityService->delete();

        return redirect()->route('admin.service.index')
            ->with('success', 'Data kegiatan pengabdian berhasil dihapus!');
    }
}
