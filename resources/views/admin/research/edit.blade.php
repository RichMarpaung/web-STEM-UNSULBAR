@extends('layouts.admin')

@section('title', 'Edit Penelitian | Admin STEM')
@section('header', 'Edit Data Penelitian')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple,
        .select2-container--default .select2-selection--single {
            border-color: #e2e8f0;
            border-radius: 0.75rem;
            min-height: 48px;
            padding: 4px 8px;
            transition: all 0.3s ease;
        }
        .select2-container--default .select2-selection--single {
            padding-top: 8px;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple,
        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #800000;
            box-shadow: 0 0 0 2px rgba(128, 0, 0, 0.2);
            outline: none;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            color: #800000;
            border-radius: 0.375rem;
            padding: 4px 10px;
            margin-top: 6px;
            font-weight: 600;
            font-size: 0.875rem;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #800000;
            margin-right: 8px;
            border-right: none;
            font-weight: bold;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            background-color: transparent;
            color: #dc2626;
        }
    </style>

    <div class="max-w-3xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('admin.research.index') }}"
                class="text-slate-500 hover:text-[#800000] transition flex items-center font-medium bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden max-w-4xl">

            <form action="{{ route('admin.research.update', $research->slug) }}" method="POST" enctype="multipart/form-data"
                class="p-8 sm:p-10">
                @csrf
                @method('PUT')

                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Informasi Umum</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Penelitian <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $research->title) }}" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="leader_name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Ketua Peneliti <span class="text-red-500">*</span></label>
                        <select name="leader_name" id="leader_name" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none transition bg-white @error('leader_name') border-red-500 @enderror">
                            <option value=""></option>
                            @foreach($teams as $team)
                                <option value="{{ $team->name }}" {{ old('leader_name', $research->leader_name) == $team->name ? 'selected' : '' }}>
                                    {{ $team->name }} ({{ $team->role }})
                                </option>
                            @endforeach
                        </select>
                        @error('leader_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">Status Penelitian <span class="text-red-500">*</span></label>
                        <select name="status" id="status" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition bg-white">
                            <option value="ongoing" {{ old('status', $research->status) == 'ongoing' ? 'selected' : '' }}>Sedang Berjalan</option>
                            <option value="completed" {{ old('status', $research->status) == 'completed' ? 'selected' : '' }}>Sudah Selesai</option>
                        </select>
                    </div>

                    <div>
                        <label for="start_date" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date"
                            value="{{ old('start_date', $research->start_date) }}"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition text-slate-600">
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Selesai (Jika ada)</label>
                        <input type="date" name="end_date" id="end_date"
                            value="{{ old('end_date', $research->end_date) }}"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition text-slate-600">
                        @error('end_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Susunan Tim & Dokumentasi</h3>

                <div class="mb-8">
                    <label for="team_ids" class="block text-sm font-semibold text-slate-700 mb-2">Anggota Tim Terlibat <span class="text-slate-400 font-normal">(Opsional)</span></label>
                    <select name="team_ids[]" id="team_ids" multiple="multiple" class="w-full">
                        @foreach($teams as $team)
                            @php
                                // Cek apakah ID anggota tim ada di old() input (jika error) ATAU ada di relasi database saat ini
                                $isSelected = (is_array(old('team_ids')) && in_array($team->id, old('team_ids'))) ||
                                              (old('team_ids') === null && $research->teams->contains($team->id));
                            @endphp
                            <option value="{{ $team->id }}" {{ $isSelected ? 'selected' : '' }}>
                                {{ $team->name }} ({{ $team->role }})
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-slate-500 mt-2"><i class="fa-solid fa-circle-info mr-1"></i> Anda dapat mengetik untuk mencari dan memilih lebih dari satu anggota.</p>
                    @error('team_ids')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="abstract" class="block text-sm font-semibold text-slate-700 mb-2">Abstrak / Deskripsi Singkat</label>
                    <textarea name="abstract" id="abstract" rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition resize-none">{{ old('abstract', $research->abstract) }}</textarea>
                </div>

                <div class="mb-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Ganti Dokumentasi (Opsional)</label>
                        <label
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition"
                            id="drop-area">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2 transition-colors duration-300"
                                    id="upload-icon"></i>
                                <p class="text-sm text-slate-500 text-center px-4" id="file-name-display">
                                    <span class="font-semibold text-[#800000]">Klik untuk mengunggah</span> file baru
                                </p>
                            </div>
                            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                                onchange="showFileName(this)" />
                        </label>
                        @error('image')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Dokumentasi Saat Ini</label>
                        <div
                            class="w-full h-40 rounded-xl overflow-hidden bg-slate-100 border border-slate-200 flex items-center justify-center">
                            @if ($research->image)
                                <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="text-center text-slate-400">
                                    <i class="fa-solid fa-image text-3xl mb-2"></i>
                                    <p class="text-xs font-medium">Belum ada gambar</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-6 border-t border-slate-100">
                    <button type="submit"
                        class="px-8 py-3 bg-[#800000] text-white font-bold rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000] hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200 flex items-center">
                        <i class="fa-solid fa-save mr-2"></i> Perbarui Penelitian
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 untuk Ketua Peneliti (Single Select)
            $('#leader_name').select2({
                placeholder: "Cari dan pilih Ketua Peneliti...",
                allowClear: true,
                width: '100%',
                language: {
                    noResults: function() {
                        return "Anggota tim tidak ditemukan";
                    }
                }
            });

            // Inisialisasi Select2 untuk Anggota Tim (Multiple Select)
            $('#team_ids').select2({
                placeholder: "Ketik nama anggota untuk mencari...",
                allowClear: true,
                width: '100%',
                language: {
                    noResults: function() {
                        return "Anggota tim tidak ditemukan";
                    }
                }
            });
        });

        // Script Upload File
        function showFileName(input) {
            const fileNameDisplay = document.getElementById('file-name-display');
            const uploadIcon = document.getElementById('upload-icon');
            const dropArea = document.getElementById('drop-area');

            if (input.files && input.files[0]) {
                const fileName = input.files[0].name;
                fileNameDisplay.innerHTML = `<span class="font-semibold text-emerald-600">File terpilih:</span> <br> ${fileName}`;

                uploadIcon.classList.remove('fa-cloud-arrow-up', 'text-slate-400');
                uploadIcon.classList.add('fa-file-circle-check', 'text-emerald-500');
                dropArea.classList.remove('border-slate-300', 'bg-slate-50');
                dropArea.classList.add('border-emerald-300', 'bg-emerald-50/50');
            }
        }
    </script>
@endsection
