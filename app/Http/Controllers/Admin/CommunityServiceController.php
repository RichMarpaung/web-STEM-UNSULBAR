<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityService;
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
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(20).'.webp';
            $path = 'service/'.$filename;

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

        CommunityService::create($data);

        return redirect()->route('admin.service.index')
            ->with('success', 'Data pengabdian berhasil ditambahkan!');
    }

    public function edit(CommunityService $communityService)
    {
        return view('admin.service.edit', compact('communityService'));
    }

    public function update(Request $request, CommunityService $communityService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if ($communityService->image) {
                Storage::disk('public')->delete($communityService->image);
            }

            $file = $request->file('image');
            $filename = Str::random(20).'.webp';
            $path = 'service/'.$filename;

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

        return redirect()->route('admin.service.index')
            ->with('success', 'Data pengabdian berhasil diperbarui!');
    }

    public function destroy(CommunityService $communityService)
    {
        if ($communityService->image) {
            Storage::disk('public')->delete($communityService->image);
        }

        $communityService->delete();

        return redirect()->route('admin.service.index')
            ->with('success', 'Data pengabdian berhasil dihapus!');
    }
}
