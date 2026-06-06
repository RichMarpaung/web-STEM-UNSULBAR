@extends('layouts.admin')

@section('title', 'Tambah Program Kerja | Admin STEM')
@section('header', 'Tambah Program Kerja')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple {
            border-color: #e2e8f0; border-radius: 0.75rem; min-height: 48px; padding: 4px 8px; transition: all 0.3s ease;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #800000; box-shadow: 0 0 0 2px rgba(128, 0, 0, 0.2);
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #fef2f2; border: 1px solid #fee2e2; color: #800000; border-radius: 0.375rem; padding: 4px 10px; margin-top: 6px; font-weight: 600; font-size: 0.875rem;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #800000; margin-right: 8px; border-right: none; font-weight: bold;
        }
    </style>

    <div class="max-w-3xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('admin.work_program.index') }}"
                class="text-slate-500 hover:text-[#800000] transition flex items-center font-medium bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden max-w-4xl">
            <form action="{{ route('admin.work_program.store') }}" method="POST" enctype="multipart/form-data" class="p-8 sm:p-10">
                @csrf

                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Informasi Program</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Kegiatan/Program <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama program kerja...">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-semibold text-slate-700 mb-2">Lokasi Pelaksanaan <span class="text-red-500">*</span></label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition @error('location') border-red-500 @enderror"
                            placeholder="Contoh: Lab Terpadu / Desa Maju">
                        @error('location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Pelaksanaan <span class="text-red-500">*</span></label>
                        <input type="date" name="date" id="date" value="{{ old('date') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition text-slate-600 @error('date') border-red-500 @enderror">
                        @error('date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Tim & Dokumentasi</h3>

                <div class="mb-8">
                    <label for="team_ids" class="block text-sm font-semibold text-slate-700 mb-2">Anggota Terlibat <span class="text-slate-400 font-normal">(Opsional)</span></label>
                    <select name="team_ids[]" id="team_ids" multiple="multiple" class="w-full">
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ (is_array(old('team_ids')) && in_array($team->id, old('team_ids'))) ? 'selected' : '' }}>
                                {{ $team->name }} ({{ $team->role }})
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-slate-500 mt-2"><i class="fa-solid fa-circle-info mr-1"></i> Ketik nama anggota untuk mencari.</p>
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Kegiatan</label>
                    <textarea name="description" id="description" rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition resize-none"
                        placeholder="Jelaskan rincian program kerja ini...">{{ old('description') }}</textarea>
                </div>

                <div class="mb-10">
                    <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">Dokumentasi Gambar (Opsional)</label>
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition" id="drop-area">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2" id="upload-icon"></i>
                            <p class="text-sm text-slate-500 text-center px-4" id="file-name-display"><span class="font-semibold text-[#800000]">Klik untuk mengunggah</span> file gambar</p>
                        </div>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="showFileName(this)" />
                    </label>
                </div>

                <div class="flex justify-end pt-6 border-t border-slate-100">
                    <button type="submit" class="px-8 py-3 bg-[#800000] text-white font-bold rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000] hover:-translate-y-0.5 transition-all duration-200 flex items-center">
                        <i class="fa-solid fa-save mr-2"></i> Simpan Program
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#team_ids').select2({ placeholder: "Cari anggota tim...", allowClear: true, width: '100%' });
        });
        function showFileName(input) {
            const fileNameDisplay = document.getElementById('file-name-display');
            const uploadIcon = document.getElementById('upload-icon');
            const dropArea = document.getElementById('drop-area');
            if (input.files && input.files[0]) {
                fileNameDisplay.innerHTML = `<span class="font-semibold text-emerald-600">File terpilih:</span> ${input.files[0].name}`;
                uploadIcon.className = 'fa-solid fa-file-circle-check text-3xl text-emerald-500 mb-2';
                dropArea.className = 'flex flex-col items-center justify-center w-full h-32 border-2 border-emerald-300 border-dashed rounded-xl cursor-pointer bg-emerald-50/50 transition';
            }
        }
    </script>
@endsection
