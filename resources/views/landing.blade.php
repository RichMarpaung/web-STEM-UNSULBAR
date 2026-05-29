@extends('layouts.landing-layout')

@section('title', 'Beranda | Pusat Studi STEM')

@section('content')
    <div class="relative bg-gradient-to-br from-[#800000] via-[#5a0000] to-slate-950 text-white overflow-hidden py-24 sm:py-32">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="lg:w-2/3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-500 text-slate-950 uppercase tracking-wider mb-6 animate-pulse">
                    Pusat Inovasi & Riset
                </span>
                <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-none mb-6">
                    Mendorong Batas Sains dan Teknologi Lewat <span class="text-amber-400">STEM</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-200 mb-10 leading-relaxed">
                    Wadah kolaborasi akademisi, peneliti, dan mitra industri untuk melahirkan inovasi yang solutif bagi tantangan masa kini dan masa depan.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#" class="px-6 py-3 bg-amber-500 text-slate-950 font-bold rounded-lg shadow-lg hover:bg-amber-400 transition transform hover:-translate-y-0.5">
                        Jelajahi Penelitian <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                    <a href="#" class="px-6 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-slate-900 transition">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-20">
        <div class="bg-white rounded-xl shadow-xl grid grid-cols-2 md:grid-cols-4 p-8 gap-y-8 divide-x divide-slate-100 text-center">
            <div>
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#800000]">50+</span>
                <span class="text-xs sm:text-sm font-medium text-slate-500 uppercase tracking-wider mt-1 block">Penelitian Aktif</span>
            </div>
            <div>
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#800000]">30+</span>
                <span class="text-xs sm:text-sm font-medium text-slate-500 uppercase tracking-wider mt-1 block">Jurnal Terindeks</span>
            </div>
            <div>
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#800000]">12</span>
                <span class="text-xs sm:text-sm font-medium text-slate-500 uppercase tracking-wider mt-1 block">Sertifikat HKI</span>
            </div>
            <div>
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#800000]">25+</span>
                <span class="text-xs sm:text-sm font-medium text-slate-500 uppercase tracking-wider mt-1 block">Mitra Strategis</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-slate-900 sm:text-4xl">Fokus Utama Kami</h2>
            <div class="h-1 w-20 bg-[#800000] mx-auto mt-4 rounded-full"></div>
            <p class="mt-4 text-lg text-slate-600">Integrasi tridharma perguruan tinggi yang didukung jaringan kerja sama yang kuat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white border border-slate-100 rounded-xl p-8 shadow-sm hover:shadow-md transition group">
                <div class="w-12 h-12 bg-red-50 text-[#800000] rounded-lg flex items-center justify-center text-xl mb-6 group-hover:bg-[#800000] group-hover:text-white transition duration-300">
                    <i class="fa-solid fa-microscope"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Penelitian Unggulan</h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">Mengembangkan studi interdisipliner mutakhir guna memecahkan masalah riil di masyarakat.</p>
                <a href="#" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000]">Lihat Katalog <i class="fa-solid fa-chevron-right ml-1"></i></a>
            </div>

            <div class="bg-white border border-slate-100 rounded-xl p-8 shadow-sm hover:shadow-md transition group">
                <div class="w-12 h-12 bg-red-50 text-[#800000] rounded-lg flex items-center justify-center text-xl mb-6 group-hover:bg-[#800000] group-hover:text-white transition duration-300">
                    <i class="fa-solid fa-handshake-angle"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Pengabdian Masyarakat</h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">Implementasi produk teknologi dan keilmuan langsung untuk meningkatkan taraf hidup warga.</p>
                <a href="#" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000]">Lihat Kegiatan <i class="fa-solid fa-chevron-right ml-1"></i></a>
            </div>

            <div class="bg-white border border-slate-100 rounded-xl p-8 shadow-sm hover:shadow-md transition group">
                <div class="w-12 h-12 bg-red-50 text-[#800000] rounded-lg flex items-center justify-center text-xl mb-6 group-hover:bg-[#800000] group-hover:text-white transition duration-300">
                    <i class="fa-solid fa-graduationcap"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Luaran & HKI</h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">Kumpulan berkas publikasi jurnal ilmiah terakreditasi, paten, hak cipta, serta penghargaan ilmiah.</p>
                <a href="#" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000]">Arsip Luaran <i class="fa-solid fa-chevron-right ml-1"></i></a>
            </div>
        </div>
    </div>
@endsection
