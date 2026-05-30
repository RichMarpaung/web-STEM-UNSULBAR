@extends('layouts.admin')

@section('title', 'Tambah Mitra Baru | Admin STEM')
@section('header', 'Tambah Mitra Kerja Sama')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <a href="{{ route('admin.partner.index') }}" class="text-slate-500 hover:text-[#800000] font-medium bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden max-w-4xl">
        <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data" class="p-8 sm:p-10">
            @csrf

            <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Informasi Mitra</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label for="type" class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kerja Sama <span class="text-red-500">*</span></label>
                    <select name="type" id="type" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:border-[#800000] outline-none transition bg-white">
                        <option value="mitra" {{ old('type') == 'mitra' ? 'selected' : '' }}>Mitra Instansi / Perusahaan</option>
                        <option value="kolaborasi" {{ old('type') == 'kolaborasi' ? 'selected' : '' }}>Kolaborasi Riset / Pengabdian</option>
                    </select>
                </div>

                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Instansi / Perusahaan <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:border-[#800000] outline-none transition" placeholder="Contoh: Universitas Gadjah Mada">
                </div>

                <div class="md:col-span-2">
                    <label for="website" class="block text-sm font-semibold text-slate-700 mb-2">Tautan Website (URL)</label>
                    <input type="url" name="website" id="website" value="{{ old('website') }}"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:border-[#800000] outline-none transition" placeholder="https://www.contoh.com">
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Mulai MoU</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:border-[#800000] outline-none transition text-slate-600">
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Berakhir MoU</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                           class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:border-[#800000] outline-none transition text-slate-600">
                </div>
            </div>

            <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Detail & Logo</h3>

            <div class="mb-6">
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Penjelasan Ruang Lingkup Kerja Sama</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:border-[#800000] outline-none transition resize-none">{{ old('description') }}</textarea>
            </div>

            <div class="mb-10">
                <label for="logo" class="block text-sm font-semibold text-slate-700 mb-2">Unggah Logo Mitra</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition" id="drop-area">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2 transition-colors duration-300" id="upload-icon"></i>
                            <p class="text-sm text-slate-500 text-center px-4" id="file-name-display"><span class="font-semibold text-[#800000]">Klik untuk mengunggah</span> logo</p>
                        </div>
                        <input type="file" name="logo" id="logo" class="hidden" accept="image/*" onchange="showFileName(this)" />
                    </label>
                </div>
            </div>

            <div class="flex justify-end pt-6 border-t border-slate-100">
                <button type="submit" class="px-8 py-3 bg-[#800000] text-white font-bold rounded-full shadow-lg hover:bg-[#6a0000] transition-all"><i class="fa-solid fa-save mr-2"></i> Simpan Mitra</button>
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
