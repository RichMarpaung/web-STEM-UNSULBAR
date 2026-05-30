@extends('layouts.app')

@section('title', 'Kerja Sama & Mitra | Pusat Studi STEM')

@section('content')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Animasi Grid Mengalir ke Bawah */
        @keyframes gridFlow {
            0% { transform: translateY(0); }
            100% { transform: translateY(40px); }
        }
        .animate-grid-flow {
            animation: gridFlow 2.5s linear infinite;
        }

        /* Animasi Ikon Bernapas (Pulse) */
        @keyframes softPulse {
            0%, 100% { opacity: 0.1; transform: scale(1) translate(25%, 25%); }
            50% { opacity: 0.15; transform: scale(1.05) translate(23%, 23%); }
        }
        .animate-soft-pulse {
            animation: softPulse 4s ease-in-out infinite;
        }
    </style>

    <div class="relative bg-gradient-to-br from-slate-950 via-slate-900 to-[#5a0000] py-20 lg:py-24 overflow-hidden border-b-8 border-amber-500">

        <div class="absolute inset-0 opacity-5 overflow-hidden">
            <svg class="absolute -top-10 left-0 w-full h-[calc(100%+40px)] animate-grid-flow" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="absolute right-0 bottom-0 transform translate-x-1/4 translate-y-1/4 animate-soft-pulse">
            <i class="fa-solid fa-globe text-[16rem] text-white"></i>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 text-amber-300 text-xs font-bold tracking-widest border border-white/20 mb-6 backdrop-blur-sm uppercase shadow-sm">
                Sinergi & Kolaborasi Global
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">Jaringan Kerja Sama</h1>
            <p class="text-lg text-slate-200 max-w-2xl mx-auto font-light leading-relaxed">
                Kemitraan strategis dengan berbagai universitas, industri, dan instansi pemerintah untuk memperluas dampak inovasi dan riset STEM.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">

        <div class="flex flex-wrap justify-center gap-3 mb-16 bg-white p-2 rounded-full shadow-[0_4px_20px_rgb(0,0,0,0.04)] border border-slate-100 max-w-fit mx-auto" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('partner.index') }}"
               class="px-6 py-2.5 rounded-full font-bold text-sm transition-all duration-300 {{ !request('type') ? 'bg-[#800000] text-white shadow-md shadow-red-900/20 transform scale-105' : 'bg-transparent text-slate-500 hover:text-[#800000] hover:bg-red-50' }}">
                Semua Jaringan
            </a>
            <a href="{{ route('partner.index', ['type' => 'kolaborasi']) }}"
               class="px-6 py-2.5 rounded-full font-bold text-sm transition-all duration-300 {{ request('type') == 'kolaborasi' ? 'bg-[#800000] text-white shadow-md shadow-red-900/20 transform scale-105' : 'bg-transparent text-slate-500 hover:text-[#800000] hover:bg-red-50' }}">
                <i class="fa-solid fa-building-columns mr-1"></i> Akademik
            </a>
            <a href="{{ route('partner.index', ['type' => 'mitra']) }}"
               class="px-6 py-2.5 rounded-full font-bold text-sm transition-all duration-300 {{ request('type') == 'mitra' ? 'bg-[#800000] text-white shadow-md shadow-red-900/20 transform scale-105' : 'bg-transparent text-slate-500 hover:text-[#800000] hover:bg-red-50' }}">
                <i class="fa-solid fa-industry mr-1"></i> Industri & Instansi
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($partners as $index => $partner)
                <div data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}" class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgba(128,0,0,0.08)] transition-all duration-500 border border-slate-100 flex flex-col items-center text-center group transform hover:-translate-y-2 relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#800000] to-amber-500 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>

                    <div class="h-40 w-full flex items-center justify-center p-8 relative">
                        <div class="absolute inset-0 bg-red-50/0 group-hover:bg-red-50/50 transition-colors duration-500 rounded-b-[3rem]"></div>

                        @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}"
                                 class="max-h-full max-w-full object-contain grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110 transition-all duration-500 relative z-10 filter drop-shadow-sm">
                        @else
                            <div class="w-20 h-20 rounded-full bg-slate-50 text-slate-300 group-hover:bg-red-50 group-hover:text-[#800000] transition-colors duration-500 flex items-center justify-center text-3xl relative z-10 shadow-inner">
                                <i class="fa-solid {{ $partner->type == 'mitra' ? 'fa-building' : 'fa-handshake' }}"></i>
                            </div>
                        @endif
                    </div>

                    <div class="p-6 pt-0 flex-grow flex flex-col items-center w-full">

                        <span class="text-[9px] font-black px-3 py-1 rounded-full bg-slate-50 border border-slate-100 text-slate-400 uppercase tracking-widest mb-4 group-hover:bg-red-50 group-hover:text-[#800000] group-hover:border-red-100 transition-colors duration-300">
                            {{ $partner->type }}
                        </span>

                        <h3 class="text-lg font-bold text-slate-900 mb-3 line-clamp-2 leading-tight group-hover:text-[#800000] transition-colors duration-300" title="{{ $partner->name }}">
                            {{ $partner->name }}
                        </h3>

                        <p class="text-slate-500 text-sm mb-6 flex-grow line-clamp-3 leading-relaxed">
                            {{ $partner->description ?? 'Deskripsi profil dan ruang lingkup kerja sama belum tersedia.' }}
                        </p>

                        <div class="w-full mt-auto">
                            <a href="{{ route('partner.show', $partner->slug) }}" class="block w-full py-3 rounded-xl font-bold text-sm bg-slate-50 text-slate-500 group-hover:bg-[#800000] group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-md">
                                Lihat Profil Kemitraan
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center py-24 bg-white rounded-3xl border border-dashed border-slate-200 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-24 h-24 mx-auto bg-slate-50 rounded-full flex items-center justify-center mb-6 border border-slate-100">
                        <i class="fa-solid fa-link-slash text-5xl text-slate-300"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Data Mitra</h3>
                    <p class="text-slate-500 max-w-md mx-auto">Sistem saat ini belum memiliki data jaringan kerja sama pada kategori yang Anda pilih.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 flex justify-center">
            {{ $partners->withQueryString()->links() }}
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: true,
                offset: 50,
                duration: 800,
                easing: 'ease-out-cubic',
            });
        });
    </script>
@endsection
