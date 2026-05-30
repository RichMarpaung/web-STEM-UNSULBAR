<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->paginate(10);
        return view('admin.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'        => 'required|in:mitra,kolaborasi',
            'name'        => 'required|string|max:255',
            'website'     => 'nullable|url',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = Str::random(20) . '.webp';
            $path = 'partner/' . $filename;

            $imageResource = imagecreatefromstring(file_get_contents($file->getRealPath()));

            if ($imageResource !== false) {
                imagesavealpha($imageResource, true);
                ob_start();
                imagewebp($imageResource, null, 80);
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['logo'] = $path;
            } else {
                $data['logo'] = $file->store('partner', 'public');
            }
        }

        Partner::create($data);

        return redirect()->route('admin.partner.index')
                         ->with('success', 'Data Mitra Kerja Sama berhasil ditambahkan!');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'type'        => 'required|in:mitra,kolaborasi',
            'name'        => 'required|string|max:255',
            'website'     => 'nullable|url',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }

            $file = $request->file('logo');
            $filename = Str::random(20) . '.webp';
            $path = 'partner/' . $filename;

            $imageResource = imagecreatefromstring(file_get_contents($file->getRealPath()));

            if ($imageResource !== false) {
                imagesavealpha($imageResource, true);
                ob_start();
                imagewebp($imageResource, null, 80);
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['logo'] = $path;
            } else {
                $data['logo'] = $file->store('partner', 'public');
            }
        }

        $partner->update($data);

        return redirect()->route('admin.partner.index')
                         ->with('success', 'Data Mitra Kerja Sama berhasil diperbarui!');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partner.index')
                         ->with('success', 'Data Mitra Kerja Sama berhasil dihapus!');
    }
}