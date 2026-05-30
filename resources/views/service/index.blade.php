@extends('layouts.app')

@section('title', 'Pengabdian Masyarakat | Pusat Studi STEM')

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
            <i class="fa-solid fa-handshake-angle text-[16rem] text-white"></i>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 text-amber-300 text-xs font-bold tracking-widest border border-white/20 mb-6 backdrop-blur-sm uppercase shadow-sm">
                Aksi & Solusi Nyata
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">Pengabdian Masyarakat</h1>
            <p class="text-lg text-slate-200 max-w-2xl mx-auto font-light leading-relaxed">
                Hilirisasi produk teknologi dan implementasi keilmuan STEM langsung di lapangan untuk meningkatkan taraf hidup, kemandirian, dan kesejahteraan warga.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $index => $service)
                <div data-aos="zoom-in" data-aos-delay="{{ $index * 150 }}" class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgba(128,0,0,0.08)] transition-all duration-500 group flex flex-col transform hover:-translate-y-2 relative">

                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#800000] to-amber-500 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500 z-50"></div>

                    <div class="h-56 bg-slate-50 relative overflow-hidden">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition duration-1000 ease-in-out">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-red-50/50">
                                <i class="fa-solid fa-people-carry-box text-6xl text-[#800000]/30 group-hover:text-[#800000]/60 transition-colors duration-500 transform group-hover:-rotate-6"></i>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <div class="p-6 sm:p-8 flex-grow flex flex-col relative bg-white">

                        <h3 class="text-xl font-bold text-slate-900 mb-4 line-clamp-2 leading-snug group-hover:text-[#800000] transition-colors duration-300" title="{{ $service->title }}">
                            {{ $service->title }}
                        </h3>

                        <div class="mb-5 space-y-2 bg-slate-50/70 p-3 rounded-xl border border-slate-100">
                            <p class="text-xs text-slate-600 font-semibold flex items-center">
                                <span class="w-5 h-5 rounded-full bg-white shadow-sm flex items-center justify-center mr-2.5 text-[#800000]">
                                    <i class="fa-solid fa-location-dot text-[10px]"></i>
                                </span>
                                {{ $service->location }}
                            </p>
                            <p class="text-xs text-slate-600 font-semibold flex items-center">
                                <span class="w-5 h-5 rounded-full bg-white shadow-sm flex items-center justify-center mr-2.5 text-[#800000]">
                                    <i class="fa-solid fa-calendar-day text-[10px]"></i>
                                </span>
                                {{ $service->date ? \Carbon\Carbon::parse($service->date)->translatedFormat('d F Y') : 'Waktu Belum Ditentukan' }}
                            </p>
                        </div>

                        <p class="text-slate-600 text-sm mb-6 flex-grow line-clamp-3 leading-relaxed font-light">
                            {{ $service->description ?? 'Deskripsi detail jalannya program pengabdian masyarakat ini belum tersedia di dalam sistem.' }}
                        </p>

                        <div class="mt-auto pt-5 border-t border-slate-100">
                            <a href="{{ route('service.show', $service->slug) }}" class="flex items-center justify-between w-full text-sm font-bold text-slate-700 group-hover:text-[#800000] transition-colors duration-300">
                                <span class="uppercase tracking-wider text-[11px]">Dokumentasi Kegiatan</span>
                                <span class="w-9 h-9 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center group-hover:bg-[#800000] group-hover:text-white transition-all duration-300 shadow-sm">
                                    <i class="fa-solid fa-arrow-right text-[11px] transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-3xl border border-dashed border-slate-200 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-24 h-24 mx-auto bg-slate-50 rounded-full flex items-center justify-center mb-6 border border-slate-100">
                        <i class="fa-solid fa-handshake-angle text-5xl text-slate-300"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Agenda Pengabdian</h3>
                    <p class="text-slate-500 max-w-md mx-auto">Arsip data dokumentasi kegiatan pengabdian masyarakat sedang diperbarui oleh administrator.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 flex justify-center">
            {{ $services->links() }}
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: true,         // Animasi hanya jalan sekali
                offset: 50,         // Muncul lebih awal sedikit sebelum di-scroll penuh
                duration: 800,      // Durasi 0.8 detik yang sangat mulus
                easing: 'ease-out-cubic',
            });
        });
    </script>
@endsection
