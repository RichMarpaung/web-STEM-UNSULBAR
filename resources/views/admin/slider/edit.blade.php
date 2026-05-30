@extends('layouts.admin')

@section('title', 'Edit Slider | Admin STEM')
@section('header', 'Edit Slider Beranda')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <a href="{{ route('admin.slider.index') }}" class="text-slate-500 hover:text-[#800000] font-medium bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100 transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden max-w-3xl">
        <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data" class="p-8 sm:p-10">
            @csrf
            @method('PUT')

            <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Konten Slider</h3>

            <div class="mb-6">
                <label for="type" class="block text-sm font-semibold text-slate-700 mb-2">Jenis Label <span class="text-red-500">*</span></label>
                <select name="type" id="type" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition">
                    <option value="Fokus Riset" {{ (old('type', $slider->type) == 'Fokus Riset') ? 'selected' : '' }}>Fokus Riset</option>
                    <option value="Pengabdian" {{ (old('type', $slider->type) == 'Pengabdian') ? 'selected' : '' }}>Pengabdian</option>
                    <option value="Luaran & Publikasi" {{ (old('type', $slider->type) == 'Luaran & Publikasi') ? 'selected' : '' }}>Luaran & Publikasi</option>
                    <option value="Info Publik" {{ (old('type', $slider->type) == 'Info Publik') ? 'selected' : '' }}>Info Publik</option>
                </select>
            </div>

            <div class="mb-8">
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Utama <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $slider->title) }}" required
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition">
            </div>

            <div class="mb-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Ganti Gambar (Opsional)</label>
                    <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative overflow-hidden">
                        <img id="preview" class="absolute inset-0 w-full h-full object-cover hidden">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 relative z-10" id="upload-icon-container">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2" id="upload-icon"></i>
                            <p class="text-sm text-slate-500 text-center px-4" id="file-name"><span class="font-semibold text-[#800000]">Klik untuk ganti</span> gambar</p>
                        </div>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(this)" />
                    </label>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Gambar Saat Ini</label>
                    <div class="w-full h-40 rounded-xl overflow-hidden bg-slate-100 border border-slate-200">
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="Current Slider" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-6 border-t border-slate-100">
                <button type="submit" class="px-8 py-3 bg-[#800000] text-white font-bold rounded-full shadow-lg hover:bg-[#6a0000] transition-all flex items-center">
                    <i class="fa-solid fa-save mr-2"></i> Perbarui Slider
                </button>
            </div>
        </form>
    </div>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('preview').classList.remove('hidden');
                    document.getElementById('upload-icon-container').classList.add('bg-white/70', 'backdrop-blur-sm', 'px-6', 'py-2', 'rounded-xl');
                    document.getElementById('file-name').innerHTML = `<span class="font-semibold text-emerald-600">Terpilih:</span> ${input.files[0].name}`;
                    document.getElementById('upload-icon').className = 'fa-solid fa-file-circle-check text-3xl text-emerald-500 mb-2';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
