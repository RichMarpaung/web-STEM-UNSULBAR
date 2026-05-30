@extends('layouts.app')

@section('title', 'Katalog Penelitian | Pusat Studi STEM')

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

        /* Kedip Halus Khusus Lencana (Badge) */
        @keyframes badgePulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(0.97); }
        }
        .animate-badge-pulse {
            animation: badgePulse 2.5s ease-in-out infinite;
        }
    </style>

    <div class="relative bg-gradient-to-br from-[#800000] via-[#5a0000] to-slate-900 py-20 lg:py-24 overflow-hidden border-b-8 border-amber-500">

        <div class="absolute inset-0 opacity-10 overflow-hidden">
            <svg class="absolute -top-10 left-0 w-full h-[calc(100%+40px)] animate-grid-flow" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="absolute right-0 bottom-0 transform translate-x-1/4 translate-y-1/4 animate-soft-pulse">
            <i class="fa-solid fa-microscope text-[15rem] text-white"></i>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 text-amber-300 text-xs font-bold tracking-widest border border-white/20 mb-6 backdrop-blur-sm uppercase shadow-sm">
                Direktori Inovasi
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">Katalog Penelitian</h1>
            <p class="text-lg text-slate-200 max-w-2xl mx-auto font-light leading-relaxed">
                Eksplorasi berbagai inovasi dan riset interdisipliner yang dikembangkan oleh tim peneliti Pusat Studi STEM untuk menjawab tantangan masa depan.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($researches as $index => $research)
                <div data-aos="zoom-in" data-aos-delay="{{ $index * 150 }}" class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgba(128,0,0,0.08)] transition-all duration-500 border border-slate-100 overflow-hidden flex flex-col group transform hover:-translate-y-2 relative">

                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#800000] to-amber-500 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500 z-50"></div>

                    <div class="h-60 bg-slate-100 relative overflow-hidden">
                        @if ($research->image)
                            <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-1000 ease-in-out">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-300 group-hover:text-[#800000]/30 transition-colors duration-500 bg-red-50/30">
                                <i class="fa-solid fa-flask text-6xl transform group-hover:-rotate-12 transition-transform duration-500"></i>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-500"></div>

                        <div class="absolute top-4 right-4 z-10">
                            @if ($research->status == 'ongoing')
                                <span class="bg-white/95 backdrop-blur-md text-amber-600 border border-amber-100 text-[10px] font-extrabold uppercase tracking-widest px-4 py-2 rounded-full shadow-lg flex items-center animate-badge-pulse">
                                    <i class="fa-solid fa-spinner fa-spin mr-1.5 text-sm"></i> Berjalan
                                </span>
                            @else
                                <span class="bg-white/95 backdrop-blur-md text-emerald-600 border border-emerald-100 text-[10px] font-extrabold uppercase tracking-widest px-4 py-2 rounded-full shadow-lg flex items-center">
                                    <i class="fa-solid fa-check-double mr-1.5 text-sm"></i> Selesai
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="p-6 sm:p-7 flex-grow flex flex-col relative bg-white">

                        <div class="inline-flex items-center px-3.5 py-1.5 rounded-full bg-slate-50 border border-slate-100 text-[11px] font-bold text-slate-600 mb-4 self-start group-hover:bg-red-50 group-hover:text-[#800000] group-hover:border-red-100 transition-colors duration-300 shadow-sm">
                            <i class="fa-solid fa-user-tie text-[#800000] mr-2"></i>
                            {{ $research->leader_name }}
                        </div>

                        <h3 class="text-xl font-extrabold text-slate-900 mb-3 line-clamp-2 leading-tight group-hover:text-[#800000] transition-colors duration-300" title="{{ $research->title }}">
                            {{ $research->title }}
                        </h3>

                        <p class="text-slate-500 text-sm mb-6 flex-grow line-clamp-3 leading-relaxed font-light">
                            {{ $research->abstract ?? 'Deskripsi atau abstrak untuk penelitian ini belum tersedia di dalam sistem.' }}
                        </p>

                        <div class="mt-auto pt-5 border-t border-slate-100">
                            <a href="{{ route('research.show', $research->slug) }}" class="flex items-center justify-between w-full text-sm font-bold text-slate-700 group-hover:text-[#800000] transition-colors duration-300">
                                <span class="uppercase tracking-wider text-[11px]">Lihat Rincian</span>
                                <span class="w-9 h-9 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center group-hover:bg-[#800000] group-hover:text-white transition-all duration-300 shadow-sm">
                                    <i class="fa-solid fa-arrow-right text-[11px] transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-24 bg-white rounded-3xl border border-dashed border-slate-300 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-24 h-24 mx-auto bg-slate-50 rounded-full flex items-center justify-center mb-6 border border-slate-100">
                        <i class="fa-solid fa-folder-open text-5xl text-slate-300"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Penelitian</h3>
                    <p class="text-slate-500 max-w-md mx-auto">Data katalog penelitian sedang dalam tahap pembaruan. Silakan kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 flex justify-center">
            {{ $researches->links() }}
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
