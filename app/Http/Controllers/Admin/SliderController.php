<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);

        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072', // Maksimal 3MB
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'slider-'.Str::random(8).'.webp';
            $path = 'slider/'.$filename;

            $imageResource = imagecreatefromstring(file_get_contents($file->getRealPath()));

            if ($imageResource !== false) {
                imagesavealpha($imageResource, true);
                ob_start();
                imagewebp($imageResource, null, 80); // Kompresi kualitas 80%
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['image'] = $path;
            } else {
                $data['image'] = $file->store('slider', 'public');
            }
        }

        Slider::create($data);

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider beranda berhasil ditambahkan!');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }

            $file = $request->file('image');
            $filename = 'slider-'.Str::random(8).'.webp';
            $path = 'slider/'.$filename;

            $imageResource = imagecreatefromstring(file_get_contents($file->getRealPath()));

            if ($imageResource !== false) {
                imagesavealpha($imageResource, true);
                ob_start();
                imagewebp($imageResource, null, 80);
                $webpData = ob_get_contents();
                ob_end_clean();
                imagedestroy($imageResource);

                Storage::disk('public')->put($path, $webpData);
                $data['image'] = $path;
            } else {
                $data['image'] = $file->store('slider', 'public');
            }
        }

        $slider->update($data);

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider beranda berhasil diperbarui!');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('admin.slider.index')
            ->with('success', 'Slider beranda berhasil dihapus!');
    }
}
