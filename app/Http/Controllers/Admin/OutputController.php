<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Output;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OutputController extends Controller
{
    public function index(Request $request)
    {
        $query = Output::latest();

        // Fitur pintar: Filter berdasarkan tipe untuk Admin
        if ($request->has('type') && in_array($request->type, ['jurnal', 'hki', 'penghargaan'])) {
            $query->where('type', $request->type);
        }

        $outputs = $query->paginate(10);

        return view('admin.output.index', compact('outputs'));
    }

    public function create()
    {
        return view('admin.output.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:jurnal,hki,penghargaan',
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'url_link' => 'nullable|string', // Bisa menampung URL eksternal
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Konversi WebP
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::random(20).'.webp';
            $path = 'output/'.$filename;

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
                $data['image'] = $file->store('output', 'public');
            }
        }

        Output::create($data);

        return redirect()->route('admin.output.index')
            ->with('success', 'Data luaran/publikasi berhasil ditambahkan!');
    }

    public function edit(Output $output)
    {
        return view('admin.output.edit', compact('output'));
    }

    public function update(Request $request, Output $output)
    {
        $request->validate([
            'type' => 'required|in:jurnal,hki,penghargaan',
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'url_link' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Konversi WebP
        if ($request->hasFile('image')) {
            if ($output->image) {
                Storage::disk('public')->delete($output->image);
            }

            $file = $request->file('image');
            $filename = Str::random(20).'.webp';
            $path = 'output/'.$filename;

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
                $data['image'] = $file->store('output', 'public');
            }
        }

        $output->update($data);

        return redirect()->route('admin.output.index')
            ->with('success', 'Data luaran berhasil diperbarui!');
    }

    public function destroy(Output $output)
    {
        if ($output->image) {
            Storage::disk('public')->delete($output->image);
        }

        $output->delete();

        return redirect()->route('admin.output.index')
            ->with('success', 'Data luaran berhasil dihapus!');
    }
}
