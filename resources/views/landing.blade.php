@extends('layouts.app')

@section('title', 'Beranda | Pusat Studi STEM')

@section('content')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Animasi Grid Mengalir */
        @keyframes gridFlow {
            0% { transform: translateY(0); }
            100% { transform: translateY(40px); }
        }
        .animate-grid-flow {
            animation: gridFlow 2.5s linear infinite;
        }

        /* Animasi Cahaya Mengambang */
        @keyframes blobFloat {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }
        .animate-blob {
            animation: blobFloat 8s ease-in-out infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }

        /* Animasi Kedip Lembut untuk Lencana */
        @keyframes softPulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(0.98); }
        }
        .animate-soft-pulse {
            animation: softPulse 2s ease-in-out infinite;
        }
    </style>

    <div class="relative bg-gradient-to-br from-[#800000] via-[#5a0000] to-slate-900 overflow-hidden py-16 lg:py-24 border-b-8 border-amber-500">

        <div class="absolute inset-0 opacity-10 overflow-hidden">
            <svg class="absolute -top-10 left-0 w-full h-[calc(100%+40px)] animate-grid-flow" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid-hero" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid-hero)" />
            </svg>
        </div>

        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-white opacity-5 blur-3xl animate-blob"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-amber-500 opacity-20 blur-3xl animate-blob animation-delay-2000"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col lg:flex-row items-center">

            <div class="lg:w-1/2 text-white pr-0 lg:pr-12 text-center lg:text-left pt-10 pb-16 lg:py-16" data-aos="fade-right" data-aos-duration="1000">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-white/10 border border-white/20 text-amber-300 uppercase tracking-widest mb-6 backdrop-blur-md shadow-sm" data-aos="fade-up" data-aos-delay="200">
                    Pusat Inovasi & Riset Terpadu
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight mb-6" data-aos="fade-up" data-aos-delay="300">
                    Sinergi Sains & Teknologi untuk <span class="text-amber-400 drop-shadow-md">Masa Depan</span>
                </h1>
                <p class="text-lg text-slate-200 mb-10 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="400">
                    Wadah kolaborasi akademisi, peneliti, dan mitra industri untuk melahirkan inovasi yang solutif bagi tantangan masa kini dan masa depan.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4" data-aos="fade-up" data-aos-delay="500">
                    <a href="#penelitian" class="w-full sm:w-auto px-8 py-3.5 bg-amber-500 text-neutral-900 font-bold rounded-full shadow-lg shadow-amber-500/30 hover:bg-amber-400 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                        Jelajahi Penelitian
                    </a>
                    <a href="{{ route('about') }}" class="w-full sm:w-auto px-8 py-3.5 bg-transparent border border-white/30 text-white font-semibold rounded-full hover:bg-white/10 transition-all duration-300 flex items-center justify-center group">
                        Profil STEM <i class="fa-solid fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2 hidden lg:block relative" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <div class="swiper heroSwiper relative w-full h-[550px] rounded-tl-[100px] rounded-br-[100px] rounded-tr-[20px] rounded-bl-[20px] overflow-hidden shadow-2xl border-4 border-white/10">
                    <div class="swiper-wrapper">
                        @forelse($sliders as $slider)
                            <div class="swiper-slide relative" data-type="{{ $slider->type }}" data-title="{{ $slider->title }}">
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#800000]/60 via-transparent to-transparent mix-blend-multiply opacity-50"></div>
                            </div>
                        @empty
                            <div class="swiper-slide relative" data-type="Pusat Studi" data-title="Inovasi STEM Berkelanjutan">
                                <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=1000&auto=format&fit=crop" alt="Default Image" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#800000]/60 via-transparent to-transparent mix-blend-multiply opacity-50"></div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="absolute -bottom-6 -left-6 bg-white p-5 rounded-2xl shadow-xl flex items-center gap-4 animate-bounce z-50 border border-slate-100" style="animation-duration: 3s;">
                    <div class="w-12 h-12 bg-amber-50 border border-amber-100 text-amber-600 rounded-full flex items-center justify-center text-xl transition-all duration-300 shadow-inner" id="slide-icon-container">
                        <i class="fa-solid fa-lightbulb" id="slide-icon"></i>
                    </div>
                    <div class="max-w-[200px]">
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest transition-all duration-300" id="slide-type">Pusat Studi</p>
                        <p class="text-sm font-extrabold text-slate-800 line-clamp-2 transition-all duration-300 leading-tight mt-0.5" id="slide-title">Inovasi STEM Berkelanjutan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 -mt-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            <div data-aos="zoom-in" data-aos-delay="0" class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-6 sm:p-8 text-center relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl hover:shadow-red-900/10 transition-all duration-300">
                <i class="fa-solid fa-microscope absolute -right-2 -bottom-4 text-7xl text-slate-50 group-hover:text-red-50 transition-colors duration-500 z-0 transform group-hover:scale-110 group-hover:-rotate-12"></i>
                <div class="relative z-10">
                    <span class="block text-4xl sm:text-5xl font-black text-slate-800 group-hover:text-[#800000] transition-colors">{{ $researchCount }}</span>
                    <span class="text-[10px] sm:text-xs font-bold text-slate-400 group-hover:text-amber-500 uppercase tracking-widest mt-2 block transition-colors">Penelitian</span>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="150" class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-6 sm:p-8 text-center relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl hover:shadow-red-900/10 transition-all duration-300">
                <i class="fa-solid fa-book-journal-whills absolute -right-2 -bottom-4 text-7xl text-slate-50 group-hover:text-blue-50 transition-colors duration-500 z-0 transform group-hover:scale-110 group-hover:-rotate-12"></i>
                <div class="relative z-10">
                    <span class="block text-4xl sm:text-5xl font-black text-slate-800 group-hover:text-blue-600 transition-colors">{{ $journalCount }}</span>
                    <span class="text-[10px] sm:text-xs font-bold text-slate-400 group-hover:text-amber-500 uppercase tracking-widest mt-2 block transition-colors">Jurnal Ilmiah</span>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300" class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-6 sm:p-8 text-center relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl hover:shadow-red-900/10 transition-all duration-300">
                <i class="fa-solid fa-certificate absolute -right-2 -bottom-4 text-7xl text-slate-50 group-hover:text-emerald-50 transition-colors duration-500 z-0 transform group-hover:scale-110 group-hover:-rotate-12"></i>
                <div class="relative z-10">
                    <span class="block text-4xl sm:text-5xl font-black text-slate-800 group-hover:text-emerald-600 transition-colors">{{ $hkiCount }}</span>
                    <span class="text-[10px] sm:text-xs font-bold text-slate-400 group-hover:text-amber-500 uppercase tracking-widest mt-2 block transition-colors">Paten & HKI</span>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="450" class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 p-6 sm:p-8 text-center relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl hover:shadow-red-900/10 transition-all duration-300">
                <i class="fa-solid fa-handshake absolute -right-2 -bottom-4 text-7xl text-slate-50 group-hover:text-amber-50 transition-colors duration-500 z-0 transform group-hover:scale-110 group-hover:-rotate-12"></i>
                <div class="relative z-10">
                    <span class="block text-4xl sm:text-5xl font-black text-slate-800 group-hover:text-amber-500 transition-colors">{{ $partnerCount }}</span>
                    <span class="text-[10px] sm:text-xs font-bold text-slate-400 group-hover:text-[#800000] uppercase tracking-widest mt-2 block transition-colors">Mitra Kolaborasi</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4" data-aos="fade-up">
            <div class="md:w-2/3">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 border-l-4 border-[#800000] pl-4">Ruang Lingkup</h2>
                <p class="mt-4 text-slate-500 pl-5 text-lg font-light leading-relaxed">Integrasi tridharma perguruan tinggi yang didukung jaringan kerja sama yang kuat untuk memberikan dampak inovasi yang nyata.</p>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div data-aos="fade-up" data-aos-delay="100" class="flex gap-5 group p-6 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-all duration-300">
                <div class="w-16 h-16 flex-shrink-0 bg-red-50 border border-red-100 rounded-2xl flex items-center justify-center text-2xl text-[#800000] group-hover:bg-[#800000] group-hover:text-white transition-all duration-500 transform group-hover:-translate-y-1 shadow-sm">
                    <i class="fa-solid fa-microscope"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-[#800000] transition-colors">Penelitian Unggulan</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-3">Mengembangkan studi interdisipliner mutakhir guna memecahkan masalah riil di masyarakat.</p>
                    <a href="{{ route('research.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider flex items-center">Jelajahi <i class="fa-solid fa-arrow-right ml-1 text-[10px]"></i></a>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" class="flex gap-5 group p-6 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-all duration-300">
                <div class="w-16 h-16 flex-shrink-0 bg-red-50 border border-red-100 rounded-2xl flex items-center justify-center text-2xl text-[#800000] group-hover:bg-[#800000] group-hover:text-white transition-all duration-500 transform group-hover:-translate-y-1 shadow-sm">
                    <i class="fa-solid fa-handshake-angle"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-[#800000] transition-colors">Pengabdian Masyarakat</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-3">Implementasi produk teknologi dan keilmuan langsung untuk meningkatkan taraf hidup warga.</p>
                    <a href="{{ route('service.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider flex items-center">Jelajahi <i class="fa-solid fa-arrow-right ml-1 text-[10px]"></i></a>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="300" class="flex gap-5 group p-6 rounded-2xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-all duration-300">
                <div class="w-16 h-16 flex-shrink-0 bg-red-50 border border-red-100 rounded-2xl flex items-center justify-center text-2xl text-[#800000] group-hover:bg-[#800000] group-hover:text-white transition-all duration-500 transform group-hover:-translate-y-1 shadow-sm">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-[#800000] transition-colors">Luaran & HKI</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-3">Kumpulan berkas publikasi jurnal ilmiah terakreditasi, paten, hak cipta, dan penghargaan.</p>
                    <a href="{{ route('output.index') }}" class="text-xs font-bold text-amber-600 hover:text-amber-700 uppercase tracking-wider flex items-center">Jelajahi <i class="fa-solid fa-arrow-right ml-1 text-[10px]"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div id="penelitian" class="bg-gradient-to-b from-[#4a0000] to-[#250000] py-24 relative border-t-8 border-amber-500 overflow-hidden">

        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <svg class="absolute -top-10 left-0 w-full h-[calc(100%+40px)] animate-grid-flow" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid-penelitian" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid-penelitian)" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col sm:flex-row justify-between items-end mb-12 gap-6" data-aos="fade-up">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-2 border-l-4 border-amber-500 pl-4">Penelitian Terbaru</h2>
                    <p class="text-neutral-300 pl-5 font-light">Inovasi terkini dari peneliti Pusat Studi STEM.</p>
                </div>
                <a href="{{ route('research.index') }}" class="px-6 py-2.5 bg-white/10 border border-white/20 text-white font-bold rounded-full hover:bg-amber-500 hover:text-neutral-900 hover:border-amber-500 hover:shadow-xl hover:shadow-amber-500/20 transition-all duration-300 flex items-center">
                    Lihat Katalog <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($recentResearches as $index => $research)
                    <div data-aos="fade-up" data-aos-delay="{{ $index * 150 }}" class="bg-white rounded-2xl overflow-hidden shadow-2xl hover:shadow-amber-500/10 transition-all duration-500 group flex flex-col transform hover:-translate-y-2 relative border border-white/5">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#800000] to-amber-500 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500 z-50"></div>
                        <div class="h-52 overflow-hidden relative bg-slate-100">
                            @if($research->image)
                                <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-50">
                                    <i class="fa-solid fa-microscope text-6xl text-slate-200 group-hover:text-[#800000]/20 transition-colors duration-500"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <div class="absolute top-4 right-4 z-10">
                                @if ($research->status == 'ongoing')
                                    <span class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-amber-600 text-[10px] font-black uppercase tracking-widest rounded-md shadow-sm border border-amber-100/50 animate-soft-pulse">
                                        <i class="fa-solid fa-spinner fa-spin mr-1"></i> Berjalan
                                    </span>
                                @else
                                    <span class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-emerald-600 text-[10px] font-black uppercase tracking-widest rounded-md shadow-sm border border-emerald-100/50">
                                        <i class="fa-solid fa-check-double mr-1"></i> Selesai
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between bg-white relative">
                            <div>
                                <div class="inline-flex items-center px-3 py-1 rounded-full bg-slate-50 border border-slate-100 text-[11px] font-bold text-slate-500 mb-4 group-hover:bg-red-50 group-hover:text-[#800000] group-hover:border-red-100 transition-colors duration-300">
                                    <i class="fa-solid fa-user-tie text-[#800000] mr-2"></i>
                                    {{ $research->leader_name }}
                                </div>
                                <h3 class="text-lg font-extrabold text-slate-900 mb-3 line-clamp-2 leading-tight group-hover:text-[#800000] transition-colors duration-300">
                                    {{ $research->title }}
                                </h3>
                                <p class="text-sm text-slate-500 line-clamp-3 leading-relaxed mb-6 font-light">
                                    {{ $research->abstract ?? 'Deskripsi atau abstrak penelitian belum tersedia untuk ditampilkan saat ini.' }}
                                </p>
                            </div>
                            <div class="pt-4 border-t border-slate-100">
                                <a href="{{ route('research.show', $research->slug) }}" class="flex items-center justify-between w-full text-xs font-bold text-slate-700 group-hover:text-[#800000] transition-colors duration-300 uppercase tracking-wider">
                                    <span>Lihat Rincian</span>
                                    <span class="w-8 h-8 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center group-hover:bg-[#800000] group-hover:text-white transition-all duration-300 shadow-sm">
                                        <i class="fa-solid fa-arrow-right text-[10px] transform group-hover:translate-x-0.5 transition-transform"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-16 bg-white/5 rounded-3xl border border-dashed border-white/10 shadow-sm" data-aos="fade-up">
                        <div class="w-20 h-20 mx-auto bg-white/5 rounded-full flex items-center justify-center mb-4 border border-white/10">
                            <i class="fa-solid fa-folder-open text-3xl text-neutral-400"></i>
                        </div>
                        <p class="text-neutral-300 font-medium">Belum ada data penelitian yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="py-24 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
            <h2 class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-10">Didukung oleh Institusi & Industri Terkemuka</h2>

            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-80 hover:opacity-100 transition-opacity duration-300">
                @forelse($partners as $index => $partner)
                    <div data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}" class="w-24 h-24 sm:w-32 sm:h-32 flex items-center justify-center transition-all duration-500 transform hover:scale-110 cursor-pointer group" title="{{ $partner->name }}">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 group-hover:drop-shadow-lg transition-all duration-500">
                    </div>
                @empty
                    <p class="text-slate-400 text-sm font-medium">Data logo kemitraan strategis akan segera ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi AOS (Animate on Scroll)
            AOS.init({
                once: true, // Animasi hanya berjalan sekali saat di-scroll turun
                offset: 50, // Muncul sedikit lebih cepat sebelum elemen masuk layar sepenuhnya
                duration: 800, // Durasi standar animasi 0.8 detik
                easing: 'ease-out-cubic', // Gerakan melambat yang sangat halus di akhir
            });

            // Inisialisasi Slider
            const slideTypeLabel = document.getElementById('slide-type');
            const slideTitleLabel = document.getElementById('slide-title');
            const slideIcon = document.getElementById('slide-icon');

            const swiper = new Swiper('.heroSwiper', {
                loop: true,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                on: {
                    slideChange: function () {
                        setTimeout(() => {
                            const activeSlide = this.slides[this.activeIndex];
                            const type = activeSlide.getAttribute('data-type');
                            const title = activeSlide.getAttribute('data-title');

                            slideTypeLabel.innerText = type;
                            slideTitleLabel.innerText = title;

                            if(type.toLowerCase().includes('penelitian')) {
                                slideIcon.className = 'fa-solid fa-microscope';
                            } else if(type.toLowerCase().includes('pengabdian')) {
                                slideIcon.className = 'fa-solid fa-handshake-angle';
                            } else if(type.toLowerCase().includes('luaran')) {
                                slideIcon.className = 'fa-solid fa-graduation-cap';
                            } else {
                                slideIcon.className = 'fa-solid fa-lightbulb';
                            }
                        }, 100);
                    }
                }
            });
        });
    </script>
@endsection
