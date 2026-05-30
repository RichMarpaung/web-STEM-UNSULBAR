@extends('layouts.admin')

@section('title', 'Edit Anggota Tim | Admin STEM')
@section('header', 'Edit Anggota Tim')

@section('content')
    <div class="max-w-4xl mx-auto">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">

        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('admin.team.index') }}"
                class="text-slate-500 hover:text-[#800000] font-medium bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100 transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
            <form action="{{ route('admin.team.update', $team->id) }}" method="POST" id="teamForm" class="p-8 sm:p-10">
                @csrf
                @method('PUT') <input type="hidden" name="cropped_image" id="cropped_image">

                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Informasi Profil</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap & Gelar <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-semibold text-slate-700 mb-2">Jabatan / Peran <span class="text-red-500">*</span></label>
                        <input type="text" name="role" id="role" value="{{ old('role', $team->role) }}" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition">
                        @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email (Opsional)</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $team->email) }}"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-100 pb-4">Tautan Indeksasi Akademik (Opsional)</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div>
                        <label for="scopus_url" class="block text-sm font-semibold text-slate-700 mb-2 flex items-center">
                            <i class="fa-solid fa-graduation-cap text-[#800000] mr-2"></i> Tautan Profil Scopus
                        </label>
                        <input type="url" name="scopus_url" id="scopus_url" value="{{ old('scopus_url', $team->scopus_url) }}"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition">
                    </div>

                    <div>
                        <label for="sinta_url" class="block text-sm font-semibold text-slate-700 mb-2 flex items-center">
                            <i class="fa-solid fa-star text-[#800000] mr-2"></i> Tautan Profil SINTA
                        </label>
                        <input type="url" name="sinta_url" id="sinta_url" value="{{ old('sinta_url', $team->sinta_url) }}"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition">
                    </div>

                    <div class="md:col-span-2">
                        <label for="scholar_url" class="block text-sm font-semibold text-slate-700 mb-2 flex items-center">
                            <i class="fa-brands fa-google text-[#800000] mr-2"></i> Tautan Profil Google Scholar
                        </label>
                        <input type="url" name="scholar_url" id="scholar_url" value="{{ old('scholar_url', $team->scholar_url) }}"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-[#800000]/20 focus:border-[#800000] outline-none transition">
                    </div>
                </div>

                <div class="mb-10">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Ganti Foto Profil (Biarkan kosong jika tidak diubah)</label>
                    <div class="flex items-center justify-center w-full relative">
                        <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition overflow-hidden relative" id="drop-area">

                            <img id="preview-image" src="{{ $team->image ? asset('storage/' . $team->image) : '' }}"
                                 class="absolute inset-0 w-full h-full object-contain {{ $team->image ? '' : 'hidden' }}" />

                            <div class="flex flex-col items-center justify-center pt-5 pb-6 z-10 {{ $team->image ? 'hidden' : '' }}" id="upload-instruction">
                                <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-400 mb-2" id="upload-icon"></i>
                                <p class="text-sm text-slate-500 text-center px-4">
                                    <span class="font-semibold text-[#800000]">Klik untuk mengganti</span> dan memotong foto baru
                                </p>
                            </div>
                            <input type="file" id="image_input" class="hidden" accept="image/*" />
                        </label>
                    </div>
                </div>

                <div class="flex justify-end pt-6 border-t border-slate-100">
                    <button type="submit" class="px-8 py-3 bg-[#800000] text-white font-bold rounded-full shadow-lg hover:bg-[#6a0000] transition-all flex items-center transform hover:-translate-y-0.5">
                        <i class="fa-solid fa-save mr-2"></i> Perbarui Anggota
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="cropperModal" class="fixed inset-0 z-[99] hidden flex items-center justify-center bg-slate-900/80 backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden flex flex-col">
            <div class="p-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                <h3 class="font-bold text-slate-800">Potong Foto Profil Baru</h3>
                <button type="button" id="closeModalBtn" class="w-8 h-8 flex items-center justify-center rounded-full bg-slate-200 text-slate-500 hover:text-white hover:bg-red-500 transition"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div class="p-4 bg-slate-100 h-[60vh] md:h-[400px] w-full relative flex items-center justify-center">
                <img id="cropperImage" src="" alt="Gambar untuk dicrop" class="max-w-full block">
            </div>
            <div class="p-4 border-t border-slate-100 flex justify-end gap-3 bg-white">
                <button type="button" id="cancelCropBtn" class="px-6 py-2.5 rounded-full text-sm font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 transition">Batal</button>
                <button type="button" id="cropBtn" class="px-6 py-2.5 rounded-full text-sm font-bold text-white bg-emerald-500 hover:bg-emerald-600 shadow-md shadow-emerald-500/30 transition">Potong & Ganti</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image_input');
            const cropperModal = document.getElementById('cropperModal');
            const cropperImage = document.getElementById('cropperImage');
            const cropBtn = document.getElementById('cropBtn');
            const cancelCropBtn = document.getElementById('cancelCropBtn');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const previewImage = document.getElementById('preview-image');
            const uploadInstruction = document.getElementById('upload-instruction');
            const hiddenInput = document.getElementById('cropped_image');
            let cropper;

            imageInput.addEventListener('change', function(e) {
                const files = e.target.files;
                if (files && files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        cropperImage.src = event.target.result;
                        cropperModal.classList.remove('hidden');

                        if (cropper) cropper.destroy();
                        cropper = new Cropper(cropperImage, {
                            aspectRatio: 1,
                            viewMode: 2,
                            autoCropArea: 1,
                            background: false,
                        });
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            const closeModal = () => {
                cropperModal.classList.add('hidden');
                if (cropper) cropper.destroy();
                imageInput.value = '';
            };

            cancelCropBtn.addEventListener('click', closeModal);
            closeModalBtn.addEventListener('click', closeModal);

            cropBtn.addEventListener('click', function() {
                if (cropper) {
                    const canvas = cropper.getCroppedCanvas({
                        width: 600,
                        height: 600,
                    });

                    const croppedBase64 = canvas.toDataURL('image/jpeg', 0.9);

                    hiddenInput.value = croppedBase64;
                    previewImage.src = croppedBase64;
                    previewImage.classList.remove('hidden');
                    uploadInstruction.classList.add('hidden');

                    closeModal();
                }
            });
        });
    </script>
@endsection
