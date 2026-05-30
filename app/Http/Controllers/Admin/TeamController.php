<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(10);
        return view('admin.team.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'role'          => 'required|string|max:255',
            'email'         => 'nullable|email|max:255',
            'linkedin_url'  => 'nullable|url|max:255',
            'cropped_image' => 'nullable|string', // Menangkap gambar base64 hasil crop
        ]);

        $data = $request->except(['cropped_image']);

        // Proses Gambar Base64 ke WebP
        if ($request->filled('cropped_image')) {
            $image_parts = explode(";base64,", $request->cropped_image);
            $image_base64 = base64_decode($image_parts[1]);

            $filename = Str::slug($request->name) . '-' . Str::random(5) . '.webp';
            $path = 'team/' . $filename;

            $imageResource = imagecreatefromstring($image_base64);

            if ($imageResource !== false) {
                imagesavealpha($imageResource, true);
                ob_start();
                imagewebp($imageResource, null, 80);
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['image'] = $path;
            }
        }

        Team::create($data);

        return redirect()->route('admin.team.index')
                         ->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'role'          => 'required|string|max:255',
            'email'         => 'nullable|email|max:255',
            'linkedin_url'  => 'nullable|url|max:255',
            'cropped_image' => 'nullable|string',
        ]);

        $data = $request->except(['cropped_image']);

        if ($request->filled('cropped_image')) {
            // Hapus foto lama jika ada
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }

            $image_parts = explode(";base64,", $request->cropped_image);
            $image_base64 = base64_decode($image_parts[1]);

            $filename = Str::slug($request->name) . '-' . Str::random(5) . '.webp';
            $path = 'team/' . $filename;

            $imageResource = imagecreatefromstring($image_base64);

            if ($imageResource !== false) {
                imagesavealpha($imageResource, true);
                ob_start();
                imagewebp($imageResource, null, 80);
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['image'] = $path;
            }
        }

        $team->update($data);

        return redirect()->route('admin.team.index')
                         ->with('success', 'Data anggota tim berhasil diperbarui!');
    }

    public function destroy(Team $team)
    {
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        return redirect()->route('admin.team.index')
                         ->with('success', 'Anggota tim berhasil dihapus!');
    }
}
