<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Research;
use App\Models\Team;
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
        $teams = Team::orderBy('name', 'asc')->get();
        return view('admin.research.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'leader_name' => 'required|string|max:255',
            'status'      => 'required|in:ongoing,completed',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'abstract'    => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'team_ids'    => 'nullable|array',
            'team_ids.*'  => 'exists:teams,id',
        ]);

        // Mengambil semua input kecuali team_ids
        $data = $request->except('team_ids');

        // Memasukkan slug ke dalam array $data
        $data['slug'] = Str::slug($request->title);

        // --- KONVERSI WEBP MENGGUNAKAN NATIVE PHP ---
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(20) . '.webp';
            $path = 'research/' . $filename;

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
                // Masukkan nama file ke array $data
                $data['image'] = $path;
            } else {
                // Fallback jika gagal dibaca, simpan file aslinya
                $data['image'] = $file->store('research', 'public');
            }
        }

        // PENTING: Gunakan $data untuk di-insert ke database, BUKAN $request!
        $research = Research::create($data);

        // Simpan Relasi Anggota Tim
        if ($request->filled('team_ids')) {
            $research->teams()->attach($request->team_ids);
        }

        return redirect()->route('admin.research.index')
            ->with('success', 'Data penelitian berhasil ditambahkan !');
    }

    public function edit(Research $research)
    {
        $teams = Team::orderBy('name', 'asc')->get();
        return view('admin.research.edit', compact('research', 'teams'));
    }

    public function update(Request $request, Research $research)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'leader_name' => 'required|string|max:255',
            'status'      => 'required|in:ongoing,completed',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'abstract'    => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'team_ids'    => 'nullable|array',
            'team_ids.*'  => 'exists:teams,id',
        ]);

        // Mengambil semua input kecuali team_ids
        $data = $request->except('team_ids');

        // Memasukkan slug ke dalam array $data
        $data['slug'] = Str::slug($request->title);

        // --- KONVERSI WEBP MENGGUNAKAN NATIVE PHP (UNTUK UPDATE) ---
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($research->image) {
                Storage::disk('public')->delete($research->image);
            }

            $file = $request->file('image');
            $filename = Str::random(20) . '.webp';
            $path = 'research/' . $filename;

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

        // PENTING: Gunakan $data untuk mengupdate database
        $research->update($data);

        // Simpan / Update Relasi Anggota Tim
        if ($request->filled('team_ids')) {
            $research->teams()->sync($request->team_ids);
        } else {
            // Jika admin menghilangkan semua centang anggota tim
            $research->teams()->detach();
        }

        return redirect()->route('admin.research.index')
            ->with('success', 'Data penelitian berhasil diperbarui!');
    }

    public function destroy(Research $research)
    {
        // Hapus gambar dari storage sebelum menghapus data dari database
        if ($research->image) {
            Storage::disk('public')->delete($research->image);
        }

        // Hapus relasi pivot (otomatis terhapus jika Anda menggunakan cascadeOnDelete di migration,
        // tapi menaruh detach() di sini adalah praktik keamanan ekstra yang baik)
        $research->teams()->detach();

        $research->delete();

        return redirect()->route('admin.research.index')
            ->with('success', 'Data penelitian berhasil dihapus!');
    }
}
