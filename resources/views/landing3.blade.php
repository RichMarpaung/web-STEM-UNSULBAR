@extends('layouts.app')

@section('title', 'Beranda | Pusat Studi STEM')

@section('content')
    <!-- HERO SECTION (STYLE 3: CENTERED & ELEGANT) -->
    <div class="relative pt-32 pb-48 lg:pt-40 lg:pb-56 overflow-hidden text-center">
        <!-- Latar Belakang Gambar dengan Overlay Maroon -->
        <div class="absolute inset-0">
            <!-- Ganti URL ini dengan foto nyata lab/kampus -->
            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=2000&auto=format&fit=crop" alt="Background STEM" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-b from-[#800000]/95 via-[#5a0000]/95 to-[#2a0000]/95"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="inline-block py-1 px-4 rounded-full bg-amber-500/20 text-amber-400 text-sm font-bold tracking-widest border border-amber-500/30 mb-8 backdrop-blur-sm">
                PUSAT INOVASI & RISET
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-8 leading-tight">
                Membangun Masa Depan Melalui <span class="text-amber-400">STEM</span>
            </h1>
            <p class="text-lg md:text-xl text-neutral-300 mb-10 max-w-2xl mx-auto font-light leading-relaxed">
                Wadah kolaborasi akademisi, peneliti, dan mitra industri untuk melahirkan inovasi yang solutif bagi tantangan masa kini dan masa depan.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#penelitian" class="px-8 py-4 bg-amber-500 text-neutral-900 text-lg font-bold rounded-lg hover:bg-amber-400 transition-all duration-300 shadow-[0_0_20px_rgba(245,158,11,0.4)]">
                    Lihat Inovasi Kami
                </a>
                <a href="#" class="px-8 py-4 bg-white/10 text-white border border-white/20 text-lg font-semibold rounded-lg hover:bg-white/20 backdrop-blur-md transition-all duration-300">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>

    <!-- STATISTIK (STYLE 3: FLOATING CARD) -->
    <div class="relative z-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 lg:-mt-32 mb-20">
        <div class="bg-white rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] p-8 lg:p-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:divide-x md:divide-neutral-100">
                <div class="text-center px-4">
                    <p class="text-5xl font-black text-[#800000] mb-2">{{ $researchCount }}</p>
                    <p class="text-sm font-bold text-neutral-400 uppercase tracking-widest">Penelitian</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-5xl font-black text-[#800000] mb-2">{{ $journalCount }}</p>
                    <p class="text-sm font-bold text-neutral-400 uppercase tracking-widest">Jurnal</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-5xl font-black text-amber-500 mb-2">{{ $hkiCount }}</p>
                    <p class="text-sm font-bold text-neutral-400 uppercase tracking-widest">Paten / HKI</p>
                </div>
                <div class="text-center px-4">
                    <p class="text-5xl font-black text-amber-500 mb-2">{{ $partnerCount }}</p>
                    <p class="text-sm font-bold text-neutral-400 uppercase tracking-widest">Mitra Strategis</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FOKUS UTAMA (STYLE 3: MINIMALIST & CLEAN) -->
    <div class="py-16 bg-neutral-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-neutral-900 sm:text-4xl">Tridharma Perguruan Tinggi</h2>
                <div class="h-1 w-16 bg-[#800000] mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <!-- Item 1 -->
                <div class="group cursor-pointer">
                    <div class="w-20 h-20 mx-auto bg-white border border-neutral-200 rounded-full flex items-center justify-center text-3xl text-[#800000] shadow-sm group-hover:scale-110 group-hover:bg-[#800000] group-hover:text-white transition-all duration-300 mb-6">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-4">Riset Unggulan</h3>
                    <p class="text-neutral-500 leading-relaxed">Mengembangkan studi interdisipliner mutakhir guna memecahkan masalah riil di masyarakat dan industri.</p>
                </div>

                <!-- Item 2 -->
                <div class="group cursor-pointer">
                    <div class="w-20 h-20 mx-auto bg-white border border-neutral-200 rounded-full flex items-center justify-center text-3xl text-[#800000] shadow-sm group-hover:scale-110 group-hover:bg-[#800000] group-hover:text-white transition-all duration-300 mb-6">
                        <i class="fa-solid fa-people-carry-box"></i>
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-4">Pengabdian</h3>
                    <p class="text-neutral-500 leading-relaxed">Implementasi produk teknologi dan keilmuan langsung untuk meningkatkan taraf hidup warga secara berkelanjutan.</p>
                </div>

                <!-- Item 3 -->
                <div class="group cursor-pointer">
                    <div class="w-20 h-20 mx-auto bg-white border border-neutral-200 rounded-full flex items-center justify-center text-3xl text-[#800000] shadow-sm group-hover:scale-110 group-hover:bg-[#800000] group-hover:text-white transition-all duration-300 mb-6">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-4">Publikasi & HKI</h3>
                    <p class="text-neutral-500 leading-relaxed">Penyebarluasan karya inovatif melalui jurnal terakreditasi nasional dan internasional serta pencatatan kekayaan intelektual.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- PENELITIAN TERBARU (STYLE 3: CLASSIC CARD) -->
    <div id="penelitian" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12 border-b border-neutral-200 pb-6">
                <h2 class="text-3xl font-bold text-neutral-900">Publikasi Riset Terkini</h2>
                <a href="#" class="text-sm font-bold text-[#800000] hover:text-[#5a0000] hidden sm:block uppercase tracking-wider">
                    Lihat Direktori <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($recentResearches as $research)
                    <div class="bg-neutral-50 border border-neutral-100 hover:border-neutral-300 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col">
                        <div class="h-56 overflow-hidden relative">
                            @if($research->image)
                                <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full bg-neutral-200 flex items-center justify-center">
                                    <i class="fa-solid fa-microscope text-5xl text-neutral-400"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur text-[#800000] text-[10px] font-black uppercase tracking-widest rounded-sm shadow-sm">
                                    {{ $research->status == 'ongoing' ? 'Sedang Berjalan' : 'Telah Selesai' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6 md:p-8 flex-1 flex flex-col">
                            <h3 class="text-xl font-bold text-neutral-900 mb-4 line-clamp-2 leading-tight group-hover:text-[#800000] transition">
                                {{ $research->title }}
                            </h3>
                            <p class="text-neutral-500 text-sm mb-6 flex-1 line-clamp-3">
                                {{ $research->abstract ?? 'Abstrak tidak tersedia untuk penelitian ini.' }}
                            </p>
                            <div class="flex items-center text-xs font-bold text-neutral-400 uppercase tracking-wider">
                                <i class="fa-solid fa-user-pen mr-2 text-[#800000]"></i> {{ $research->leader_name }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 bg-neutral-50 rounded-xl border border-neutral-100">
                        <i class="fa-solid fa-folder-open text-4xl text-neutral-300 mb-4"></i>
                        <p class="text-neutral-500">Katalog penelitian sedang diperbarui.</p>
                    </div>
                @endforelse
            </div>

            <!-- Tombol mobile -->
            <div class="mt-8 text-center sm:hidden">
                <a href="#" class="inline-block px-6 py-3 border border-[#800000] text-[#800000] font-bold rounded-lg w-full">
                    Lihat Semua Riset
                </a>
            </div>
        </div>
    </div>

    <!-- MITRA STRATEGIS -->
    <div class="py-20 bg-neutral-50 border-t border-neutral-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-sm font-bold text-[#800000] uppercase tracking-widest mb-10">Menjalin Kolaborasi dengan Institusi & Industri</h2>

            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-24">
                @forelse($partners as $partner)
                    <div class="w-24 h-24 sm:w-32 sm:h-32 flex items-center justify-center transition-transform duration-300 transform hover:-translate-y-2 cursor-pointer" title="{{ $partner->name }}">
                        <!-- Logo menggunakan blend-mode multiply agar menyatu dengan background (opsional, cocok jika logo berlatar putih) -->
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="max-w-full max-h-full object-contain mix-blend-multiply">
                    </div>
                @empty
                    <p class="text-neutral-400 text-sm">Logo mitra akan segera ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
