@extends('layouts.app')

@section('title', 'Beranda | Pusat Studi STEM')

@section('content')
    <div class="relative bg-gradient-to-r from-[#800000] to-[#4a0000] overflow-hidden py-16 lg:py-24">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-white opacity-5"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-amber-500 opacity-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col lg:flex-row items-center">

            <div class="lg:w-1/2 text-white pr-0 lg:pr-12 text-center lg:text-left pt-10 pb-16 lg:py-16">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-white/10 border border-white/20 text-amber-300 uppercase tracking-widest mb-6 backdrop-blur-md">
                    Pusat Inovasi & Riset
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight mb-6">
                    Sinergi Sains & Teknologi untuk <span class="text-amber-400">Masa Depan</span>
                </h1>
                <p class="text-lg text-neutral-200 mb-10 leading-relaxed font-light">
                    Wadah kolaborasi akademisi, peneliti, dan mitra industri untuk melahirkan inovasi yang solutif bagi tantangan masa kini dan masa depan.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="#penelitian" class="w-full sm:w-auto px-8 py-3.5 bg-amber-500 text-neutral-900 font-bold rounded-full shadow-lg hover:bg-amber-400 hover:shadow-xl transition-all duration-300">
                        Jelajahi Penelitian
                    </a>
                    <a href="#" class="w-full sm:w-auto px-8 py-3.5 bg-transparent border border-white/50 text-white font-semibold rounded-full hover:bg-white/10 transition-all duration-300">
                        <i class="fa-regular fa-envelope mr-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2 hidden lg:block relative">
                <div class="relative w-full h-[500px] rounded-tl-[100px] rounded-br-[100px] overflow-hidden shadow-2xl border-4 border-white/10">
                    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=1000&auto=format&fit=crop" alt="Riset STEM" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-[#800000] mix-blend-multiply opacity-30"></div>
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white p-5 rounded-2xl shadow-xl flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                    <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center text-xl">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <div>
                        <p class="text-xs text-neutral-400 font-semibold uppercase">Fokus Riset</p>
                        <p class="text-sm font-bold text-neutral-800">Teknologi Berkelanjutan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 -mt-16 lg:-mt-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            <div class="bg-white rounded-xl shadow-lg border-t-4 border-[#800000] p-6 text-center transform hover:-translate-y-1 transition duration-300">
                <span class="block text-4xl font-black text-neutral-800">{{ $researchCount }}</span>
                <span class="text-xs font-bold text-neutral-500 uppercase tracking-widest mt-2 block">Penelitian</span>
            </div>
            <div class="bg-white rounded-xl shadow-lg border-t-4 border-[#800000] p-6 text-center transform hover:-translate-y-1 transition duration-300">
                <span class="block text-4xl font-black text-neutral-800">{{ $journalCount }}</span>
                <span class="text-xs font-bold text-neutral-500 uppercase tracking-widest mt-2 block">Jurnal</span>
            </div>
            <div class="bg-white rounded-xl shadow-lg border-t-4 border-amber-500 p-6 text-center transform hover:-translate-y-1 transition duration-300">
                <span class="block text-4xl font-black text-neutral-800">{{ $hkiCount }}</span>
                <span class="text-xs font-bold text-neutral-500 uppercase tracking-widest mt-2 block">HKI</span>
            </div>
            <div class="bg-white rounded-xl shadow-lg border-t-4 border-amber-500 p-6 text-center transform hover:-translate-y-1 transition duration-300">
                <span class="block text-4xl font-black text-neutral-800">{{ $partnerCount }}</span>
                <span class="text-xs font-bold text-neutral-500 uppercase tracking-widest mt-2 block">Mitra</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
            <div class="md:w-2/3">
                <h2 class="text-3xl sm:text-4xl font-bold text-neutral-900 border-l-4 border-[#800000] pl-4">Ruang Lingkup</h2>
                <p class="mt-4 text-neutral-600 pl-5 text-lg">Integrasi tridharma perguruan tinggi yang didukung jaringan kerja sama yang kuat untuk memberikan dampak nyata.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="flex gap-5 group">
                <div class="w-16 h-16 flex-shrink-0 bg-[#800000]/5 border border-[#800000]/10 rounded-2xl flex items-center justify-center text-2xl text-[#800000] group-hover:bg-[#800000] group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-microscope"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-2 group-hover:text-[#800000] transition-colors">Penelitian Unggulan</h3>
                    <p class="text-neutral-500 text-sm leading-relaxed mb-3">Mengembangkan studi interdisipliner mutakhir guna memecahkan masalah riil di masyarakat.</p>
                    <a href="#" class="text-sm font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider">Selengkapnya &rarr;</a>
                </div>
            </div>

            <div class="flex gap-5 group">
                <div class="w-16 h-16 flex-shrink-0 bg-[#800000]/5 border border-[#800000]/10 rounded-2xl flex items-center justify-center text-2xl text-[#800000] group-hover:bg-[#800000] group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-handshake-angle"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-2 group-hover:text-[#800000] transition-colors">Pengabdian Masyarakat</h3>
                    <p class="text-neutral-500 text-sm leading-relaxed mb-3">Implementasi produk teknologi dan keilmuan langsung untuk meningkatkan taraf hidup warga.</p>
                    <a href="#" class="text-sm font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider">Selengkapnya &rarr;</a>
                </div>
            </div>

            <div class="flex gap-5 group">
                <div class="w-16 h-16 flex-shrink-0 bg-[#800000]/5 border border-[#800000]/10 rounded-2xl flex items-center justify-center text-2xl text-[#800000] group-hover:bg-[#800000] group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-neutral-900 mb-2 group-hover:text-[#800000] transition-colors">Luaran & HKI</h3>
                    <p class="text-neutral-500 text-sm leading-relaxed mb-3">Kumpulan berkas publikasi jurnal ilmiah terakreditasi, paten, hak cipta, dan penghargaan.</p>
                    <a href="#" class="text-sm font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    </div>

    <div id="penelitian" class="bg-gradient-to-b from-[#3a0000] to-[#1a0000] py-24 relative border-t-8 border-amber-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col sm:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">Penelitian Terbaru</h2>
                    <p class="text-neutral-300">Inovasi terkini dari peneliti Pusat Studi STEM.</p>
                </div>
                <a href="#" class="px-6 py-2.5 bg-white/10 text-white font-medium rounded-full hover:bg-white/20 transition">
                    Lihat Semua
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($recentResearches as $research)
                    <div class="relative h-80 rounded-2xl overflow-hidden group shadow-2xl">
                        @if($research->image)
                            <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                        @else
                            <div class="absolute inset-0 w-full h-full bg-[#4a0000] flex items-center justify-center">
                                <i class="fa-solid fa-microscope text-6xl text-[#2a0000]"></i>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>

                        <div class="absolute inset-0 p-6 flex flex-col justify-end">
                            <div class="mb-3">
                                <span class="px-3 py-1 bg-amber-500 text-neutral-900 text-[10px] font-bold uppercase tracking-wider rounded">
                                    {{ $research->status == 'ongoing' ? 'Berjalan' : 'Selesai' }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-white mb-1 line-clamp-2 leading-snug group-hover:text-amber-400 transition">
                                {{ $research->title }}
                            </h3>
                            <p class="text-sm text-neutral-300 font-medium">
                                <i class="fa-solid fa-user text-[10px] mr-1 text-amber-500"></i> {{ $research->leader_name }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 text-neutral-400 border border-[#4a0000] rounded-2xl border-dashed">
                        Belum ada data penelitian yang dipublikasikan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="py-20 bg-neutral-50 border-t border-neutral-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-sm font-bold text-[#800000] uppercase tracking-widest mb-8">Didukung oleh Institusi & Industri Terkemuka</h2>

            <div class="flex flex-wrap justify-center items-center gap-10 md:gap-20">
                @forelse($partners as $partner)
                    <div class="w-24 h-24 sm:w-32 sm:h-32 flex items-center justify-center transition-transform duration-300 transform hover:scale-110 cursor-pointer" title="{{ $partner->name }}">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="max-w-full max-h-full object-contain filter drop-shadow-sm">
                    </div>
                @empty
                    <p class="text-neutral-400 text-sm">Logo mitra akan segera ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
