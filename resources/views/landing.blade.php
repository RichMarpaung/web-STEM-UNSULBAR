@extends('layouts.app')

@section('title', 'Beranda | Pusat Studi STEM')

@section('content')
    <div class="relative bg-gradient-to-br from-[#800000] via-[#5a0000] to-slate-950 text-white overflow-hidden min-h-[75vh] md:min-h-[85vh] flex items-center py-20">
        
        <div class="absolute inset-0 opacity-20" style="mask-image: radial-gradient(ellipse at center, black 20%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse at center, black 20%, transparent 70%);">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="lg:w-2/3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-500 text-slate-950 uppercase tracking-wider mb-6 animate-pulse">
                    Pusat Inovasi & Riset
                </span>
                
                <h1 class="text-4xl sm:text-6xl md:text-7xl font-extrabold tracking-tight leading-none mb-6">
                    Mendorong Batas Sains dan Teknologi Lewat <span class="text-amber-400">STEM</span>
                </h1>
                
                <p class="text-lg sm:text-xl md:text-2xl text-slate-200 mb-10 leading-relaxed max-w-2xl">
                    Wadah kolaborasi akademisi, peneliti, dan mitra industri untuk melahirkan inovasi yang solutif bagi tantangan masa kini dan masa depan.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="#penelitian" class="px-6 py-3 md:px-8 md:py-4 bg-amber-500 text-slate-950 text-base md:text-lg font-bold rounded-lg shadow-lg hover:bg-amber-400 transition transform hover:-translate-y-0.5">
                        Jelajahi Penelitian <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                    <a href="#" class="px-6 py-3 md:px-8 md:py-4 bg-transparent border-2 border-white text-white text-base md:text-lg font-semibold rounded-lg hover:bg-white hover:text-slate-900 transition">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-20">
        <div class="bg-white rounded-xl shadow-xl grid grid-cols-2 md:grid-cols-4 p-8 gap-y-8 divide-x divide-slate-100 text-center">
            <div>
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#800000]">{{ $researchCount }}</span>
                <span class="text-xs sm:text-sm font-medium text-slate-500 uppercase tracking-wider mt-1 block">Penelitian Aktif</span>
            </div>
            <div>
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#800000]">{{ $journalCount }}</span>
                <span class="text-xs sm:text-sm font-medium text-slate-500 uppercase tracking-wider mt-1 block">Jurnal Terindeks</span>
            </div>
            <div>
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#800000]">{{ $hkiCount }}</span>
                <span class="text-xs sm:text-sm font-medium text-slate-500 uppercase tracking-wider mt-1 block">Sertifikat HKI</span>
            </div>
            <div>
                <span class="block text-3xl sm:text-4xl font-extrabold text-[#800000]">{{ $partnerCount }}</span>
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
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Luaran & HKI</h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">Kumpulan berkas publikasi jurnal ilmiah terakreditasi, paten, hak cipta, serta penghargaan ilmiah.</p>
                <a href="#" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000]">Arsip Luaran <i class="fa-solid fa-chevron-right ml-1"></i></a>
            </div>
        </div>
    </div>

    <div id="penelitian" class="bg-slate-50 py-20 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900">Penelitian Terbaru</h2>
                    <div class="h-1 w-20 bg-[#800000] mt-4 rounded-full"></div>
                </div>
                <a href="#" class="hidden sm:inline-flex items-center text-sm font-semibold text-[#800000] hover:text-[#5a0000]">
                    Lihat Semua Penelitian <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($recentResearches as $research)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100 flex flex-col">
                        <div class="h-48 overflow-hidden bg-slate-200 relative">
                            @if($research->image)
                                <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 bg-slate-100">
                                    <i class="fa-solid fa-microscope text-4xl"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-bold {{ $research->status == 'ongoing' ? 'text-amber-600' : 'text-emerald-600' }}">
                                {{ $research->status == 'ongoing' ? 'Sedang Berjalan' : 'Selesai' }}
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-lg font-bold text-slate-900 mb-2 line-clamp-2 hover:text-[#800000] transition cursor-pointer">
                                {{ $research->title }}
                            </h3>
                            <p class="text-sm text-slate-500 mb-4 flex-1 line-clamp-3">
                                {{ $research->abstract ?? 'Deskripsi penelitian belum tersedia.' }}
                            </p>
                            <div class="flex items-center text-xs text-slate-400 font-medium pt-4 border-t border-slate-100">
                                <i class="fa-solid fa-user-tie mr-2"></i> {{ $research->leader_name }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 text-slate-500">
                        Belum ada data penelitian yang dipublikasikan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

   <div class="py-20 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-slate-900 mb-2">Mitra Strategis Kami</h2>
            <p class="text-slate-500 mb-10">Berkolaborasi untuk mewujudkan ekosistem inovasi yang berkelanjutan.</p>
            
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
                @forelse($partners as $partner)
                    <div class="w-24 h-24 sm:w-32 sm:h-32 flex items-center justify-center transition-transform duration-300 transform hover:scale-110 cursor-pointer" title="{{ $partner->name }}">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="max-w-full max-h-full object-contain">
                    </div>
                @empty
                    <p class="text-slate-400 text-sm">Logo mitra akan segera ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection