@extends('layouts.app')

@section('title', 'Luaran & Publikasi | Pusat Studi STEM')

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

        /* Animasi Ikon Bernapas */
        @keyframes softPulse {
            0%, 100% { opacity: 0.1; transform: scale(1) translate(25%, 25%); }
            50% { opacity: 0.15; transform: scale(1.05) translate(23%, 23%); }
        }
        .animate-soft-pulse {
            animation: softPulse 4s ease-in-out infinite;
        }
    </style>

    <div class="relative bg-gradient-to-br from-[#800000] via-[#6a0000] to-slate-900 py-20 lg:py-24 overflow-hidden border-b-8 border-amber-500">

        <div class="absolute inset-0 opacity-10 overflow-hidden">
            <svg class="absolute -top-10 left-0 w-full h-[calc(100%+40px)] animate-grid-flow" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="absolute right-0 bottom-0 transform translate-x-1/4 translate-y-1/4 animate-soft-pulse">
            <i class="fa-solid fa-award text-[16rem] text-white"></i>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 text-amber-300 text-xs font-bold tracking-widest border border-white/20 mb-6 backdrop-blur-sm uppercase shadow-sm">
                Arsip Prestasi & Karya
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">Luaran & Publikasi</h1>
            <p class="text-lg text-slate-200 max-w-2xl mx-auto font-light leading-relaxed">
                Kumpulan rekam jejak publikasi jurnal ilmiah terakreditasi, pendaftaran hak kekayaan intelektual (HKI), dan pencapaian gemilang tim peneliti.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">

        <div class="flex flex-wrap justify-center gap-3 mb-16 bg-white p-2 rounded-full shadow-[0_4px_20px_rgb(0,0,0,0.04)] border border-slate-100 max-w-fit mx-auto" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('output.index') }}"
               class="px-6 py-2.5 rounded-full font-bold text-sm transition-all duration-300 {{ !request('type') ? 'bg-[#800000] text-white shadow-md shadow-red-900/20 transform scale-105' : 'bg-transparent text-slate-500 hover:text-[#800000] hover:bg-red-50' }}">
                Semua Luaran
            </a>
            <a href="{{ route('output.index', ['type' => 'jurnal']) }}"
               class="px-6 py-2.5 rounded-full font-bold text-sm transition-all duration-300 {{ request('type') == 'jurnal' ? 'bg-[#800000] text-white shadow-md shadow-red-900/20 transform scale-105' : 'bg-transparent text-slate-500 hover:text-[#800000] hover:bg-red-50' }}">
                <i class="fa-solid fa-book-journal-whills mr-1"></i> Jurnal Ilmiah
            </a>
            <a href="{{ route('output.index', ['type' => 'hki']) }}"
               class="px-6 py-2.5 rounded-full font-bold text-sm transition-all duration-300 {{ request('type') == 'hki' ? 'bg-[#800000] text-white shadow-md shadow-red-900/20 transform scale-105' : 'bg-transparent text-slate-500 hover:text-[#800000] hover:bg-red-50' }}">
                <i class="fa-solid fa-certificate mr-1"></i> HKI & Paten
            </a>
            <a href="{{ route('output.index', ['type' => 'penghargaan']) }}"
               class="px-6 py-2.5 rounded-full font-bold text-sm transition-all duration-300 {{ request('type') == 'penghargaan' ? 'bg-[#800000] text-white shadow-md shadow-red-900/20 transform scale-105' : 'bg-transparent text-slate-500 hover:text-[#800000] hover:bg-red-50' }}">
                <i class="fa-solid fa-trophy mr-1"></i> Penghargaan
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($outputs as $index => $output)

                @php
                    $icon = 'fa-file-lines';
                    $iconColor = 'text-slate-500';
                    $bgBadge = 'bg-slate-100 text-slate-600';

                    if(strtolower($output->type) == 'jurnal') {
                        $icon = 'fa-book-journal-whills';
                        $iconColor = 'text-blue-500';
                        $bgBadge = 'bg-blue-50 text-blue-700 border-blue-100';
                    } elseif(strtolower($output->type) == 'hki' || strtolower($output->type) == 'paten') {
                        $icon = 'fa-certificate';
                        $iconColor = 'text-emerald-500';
                        $bgBadge = 'bg-emerald-50 text-emerald-700 border-emerald-100';
                    } elseif(strtolower($output->type) == 'penghargaan') {
                        $icon = 'fa-trophy';
                        $iconColor = 'text-amber-500';
                        $bgBadge = 'bg-amber-50 text-amber-700 border-amber-100';
                    }
                @endphp

                <div data-aos="zoom-in" data-aos-delay="{{ $index * 150 }}" class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgba(128,0,0,0.08)] transition-all duration-500 border border-slate-100 p-8 flex flex-col group transform hover:-translate-y-2 relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#800000] to-amber-500 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>

                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center border border-slate-100 shadow-sm group-hover:scale-110 transition-transform duration-300">
                                <i class="fa-solid {{ $icon }} text-xl {{ $iconColor }}"></i>
                            </div>
                            <span class="text-[10px] font-bold px-2.5 py-1 rounded-md border uppercase tracking-widest {{ $bgBadge }}">
                                {{ $output->type }}
                            </span>
                        </div>
                        <span class="text-sm font-black text-slate-300 group-hover:text-amber-500 transition-colors duration-300">
                            {{ $output->date ? \Carbon\Carbon::parse($output->date)->format('Y') : '' }}
                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-3 leading-snug group-hover:text-[#800000] transition-colors duration-300">
                        {{ $output->title }}
                    </h3>

                    <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-5 flex items-center">
                        <i class="fa-solid fa-building-columns mr-2 text-[#800000]"></i>
                        <span class="truncate">{{ $output->issuer ?? 'Penerbit Tidak Diketahui' }}</span>
                    </p>

                    <p class="text-slate-600 text-sm mb-8 flex-grow line-clamp-3 leading-relaxed">
                        {{ $output->description }}
                    </p>

                    <div class="mt-auto pt-5 border-t border-slate-100">
                        <a href="{{ route('output.show', $output->slug) }}" class="inline-flex items-center text-sm font-bold text-[#800000] group/link">
                            Detail Publikasi
                            <span class="w-7 h-7 rounded-full bg-red-50 flex items-center justify-center ml-2 group-hover/link:bg-[#800000] group-hover/link:text-white transition-colors duration-300 shadow-sm">
                                <i class="fa-solid fa-arrow-right text-[10px] transform group-hover/link:translate-x-1 transition-transform duration-300"></i>
                            </span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-24 bg-white rounded-3xl border border-dashed border-slate-300 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-24 h-24 mx-auto bg-slate-50 rounded-full flex items-center justify-center mb-6 border border-slate-100">
                        <i class="fa-solid fa-box-open text-5xl text-slate-300"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Tidak Ada Data</h3>
                    <p class="text-slate-500 max-w-md mx-auto">Belum ada data luaran atau publikasi yang ditambahkan pada kategori ini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 flex justify-center">
            {{ $outputs->withQueryString()->links() }}
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
