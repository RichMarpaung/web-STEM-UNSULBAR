@extends('layouts.admin')

@section('title', 'Tambah Luaran Baru | Admin STEM')
@section('header', 'Tambah Data Luaran')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <a href="{{ route('admin.output.index') }}" class="text-slate-500 hover:text-[#800000] transition flex items-center font-medium bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden max-w-4xl">
        <form action="{{ route('admin.output.store') }}" method="POST" enctype="multipart/form-data" class="p-8 sm:p-10">
            @csrf

            <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Informasi Utama</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="md:col-span-2">
                    <label for="type" class="block text-sm font-semibold text-slate-700 mb-2">Jenis Luaran <span class="text-red-500">*</span></label>
                    <select name="type" id="type" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition bg-white @error('type') border-red-500 @enderror">
                        <option value="" disabled {{ old('type') ? '' : 'selected' }}>-- Pilih Jenis Luaran --</option>
                        <option value="jurnal" {{ old('type') == 'jurnal' ? 'selected' : '' }}>Publikasi Jurnal / Makalah</option>
                        <option value="hki" {{ old('type') == 'hki' ? 'selected' : '' }}>Hak Kekayaan Intelektual (HKI) / Paten</option>
                        <option value="penghargaan" {{ old('type') == 'penghargaan' ? 'selected' : '' }}>Penghargaan / Prestasi</option>
                    </select>
                    @error('type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Judul (Jurnal/HKI/Penghargaan) <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition @error('title') border-red-500 @enderror">
                </div>

                <div>
                    <label for="issuer" class="block text-sm font-semibold text-slate-700 mb-2">Penerbit / Penyelenggara</label>
                    <input type="text" name="issuer" id="issuer" value="{{ old('issuer') }}"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition"
                           placeholder="Cth: Jurnal Teknologi, IEEE, Kemenkumham...">
                </div>

                <div>
                    <label for="date" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Publikasi / Diperoleh</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition text-slate-600">
                </div>
            </div>

            <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Tautan & Dokumentasi</h3>

            <div class="mb-6">
                <label for="url_link" class="block text-sm font-semibold text-slate-700 mb-2">Tautan Eksternal (URL)</label>
                <input type="url" name="url_link" id="url_link" value="{{ old('url_link') }}"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition"
                       placeholder="https://doi.org/... atau link web terkait">
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Tambahan</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition resize-none"
                          placeholder="Abstrak singkat, nomor paten, atau keterangan tambahan...">{{ old('description') }}</textarea>
            </div>

            <div class="mb-10">
                <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">Unggah Bukti / Cover (Opsional)</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition" id="drop-area">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2 transition-colors duration-300" id="upload-icon"></i>
                            <p class="text-sm text-slate-500 text-center px-4" id="file-name-display">
                                <span class="font-semibold text-[#800000]">Klik untuk mengunggah</span> file gambar
                            </p>
                        </div>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="showFileName(this)" />
                    </label>
                </div>
            </div>

            <div class="flex justify-end pt-6 border-t border-slate-100">
                <button type="submit" class="px-8 py-3 bg-[#800000] text-white font-bold rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000] hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200 flex items-center">
                    <i class="fa-solid fa-save mr-2"></i> Simpan Luaran
                </button>
            </div>
        </form>
    </div>
</div>
    <script>
        function showFileName(input) {
            const fileNameDisplay = document.getElementById('file-name-display');
            const uploadIcon = document.getElementById('upload-icon');
            const dropArea = document.getElementById('drop-area');

            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                fileNameDisplay.innerHTML = `<span class="font-semibold text-emerald-600">File terpilih:</span> ${fileName}`;
                uploadIcon.classList.replace('fa-cloud-arrow-up', 'fa-file-circle-check');
                uploadIcon.classList.replace('text-slate-400', 'text-emerald-500');
                dropArea.classList.replace('border-slate-300', 'border-emerald-300');
                dropArea.classList.replace('bg-slate-50', 'bg-emerald-50/50');
            }
        }
    </script>
@endsection
