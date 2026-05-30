<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResearchController extends Controller
{
    public function index()
    {
        $researches = Research::latest()->paginate(10);

        return view('admin.research.index', compact('researches'));
    }

    public function create()
    {
        return view('admin.research.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'leader_name' => 'required|string|max:255',
            'status' => 'required|in:ongoing,completed',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'abstract' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // --- KONVERSI WEBP MENGGUNAKAN NATIVE PHP ---
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(20).'.webp';
            $path = 'research/'.$filename;

            // Baca file ke memori PHP
            $imageResource = imagecreatefromstring(file_get_contents($file->getRealPath()));

            if ($imageResource !== false) {
                // Aktifkan output buffering untuk menangkap data WebP
                ob_start();
                imagewebp($imageResource, null, 80); // Kualitas 80%
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource); // Bebaskan memori

                // Simpan data WebP ke storage
                Storage::disk('public')->put($path, $webpData);
                $data['image'] = $path;
            } else {
                // Fallback jika gagal dibaca, simpan file aslinya
                $data['image'] = $file->store('research', 'public');
            }
        }

        Research::create($data);

        return redirect()->route('admin.research.index')
            ->with('success', 'Data penelitian berhasil ditambahkan (Gambar dioptimasi ke WebP)!');
    }

    public function edit(Research $research)
    {
        return view('admin.research.edit', compact('research'));
    }

    public function update(Request $request, Research $research)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'leader_name' => 'required|string|max:255',
            'status' => 'required|in:ongoing,completed',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'abstract' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // --- KONVERSI WEBP MENGGUNAKAN NATIVE PHP (UNTUK UPDATE) ---
        if ($request->hasFile('image')) {
            if ($research->image) {
                Storage::disk('public')->delete($research->image);
            }

            $file = $request->file('image');
            $filename = Str::random(20).'.webp';
            $path = 'research/'.$filename;

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
                $data['image'] = $file->store('research', 'public');
            }
        }

        $research->update($data);

        return redirect()->route('admin.research.index')
            ->with('success', 'Data penelitian berhasil diperbarui!');
    }

    public function destroy(Research $research)
    {
        if ($research->image) {
            Storage::disk('public')->delete($research->image);
        }

        $research->delete();

        return redirect()->route('admin.research.index')
            ->with('success', 'Data penelitian berhasil dihapus!');
    }
}
