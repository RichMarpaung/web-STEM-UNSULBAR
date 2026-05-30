@extends('layouts.app')

@section('title', 'Tentang Kami | Pusat Studi STEM')

@section('content')
    <!-- CSS ANIMASI & AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Animasi Grid Mengalir ke Bawah */
        @keyframes gridFlow {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(40px);
            }
        }

        .animate-grid-flow {
            animation: gridFlow 2.5s linear infinite;
        }

        /* Animasi Ikon Bernapas (Pulse) */
        @keyframes softPulse {
            0%, 100% {
                opacity: 0.1;
                transform: scale(1);
            }
            50% {
                opacity: 0.2;
                transform: scale(1.05);
            }
        }

        .animate-soft-pulse {
            animation: softPulse 4s ease-in-out infinite;
        }
    </style>

    <!-- HERO SECTION -->
    <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-[#4a0000] py-20 lg:py-24 border-b-8 border-amber-500 relative overflow-hidden">

        <!-- Ornamen Latar: Animasi Grid Flow -->
        <div class="absolute inset-0 opacity-5 overflow-hidden">
            <svg class="absolute -top-10 left-0 w-full h-[calc(100%+40px)] animate-grid-flow" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid-pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid-pattern)" />
            </svg>
        </div>

        <!-- Ikon Jaringan (Animasi Bernapas) -->
        <div class="absolute inset-0 animate-soft-pulse pointer-events-none">
            <i class="fa-solid fa-network-wired text-[15rem] absolute -right-10 -bottom-10 text-white transform -rotate-12"></i>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 text-amber-300 text-xs font-bold tracking-widest border border-white/20 mb-6 backdrop-blur-sm uppercase shadow-sm">
                Mengenal Lebih Dekat
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white mb-6 tracking-tight drop-shadow-lg">
                Profil Pusat Studi <span class="text-amber-400">STEM</span>
            </h1>
            <p class="text-lg md:text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed font-light">
                Membangun ekosistem riset interdisipliner yang inovatif dan solutif. Kami berdedikasi untuk menjembatani ilmu pengetahuan murni dan terapan guna menjawab tantangan global di era digital.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div data-aos="fade-up" data-aos-delay="100" class="bg-white rounded-2xl shadow-xl p-8 sm:p-12 border-t-8 border-[#800000] transform transition duration-500 hover:-translate-y-2 group">
                <div class="w-16 h-16 bg-red-50 text-[#800000] rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:bg-[#800000] group-hover:text-white transition-colors duration-300 transform group-hover:rotate-12">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-900 mb-6">Visi Kami</h2>
                <div class="relative">
                    <i class="fa-solid fa-quote-left text-4xl absolute -top-4 -left-2 text-slate-100 -z-10"></i>
                    <p class="text-slate-600 leading-relaxed text-lg italic font-medium z-10 relative">
                        "Menjadi pusat unggulan (Centre of Excellence) dalam Science, Technology, Engineering dan Mathematics (STEM) dan STEM education yang inovatif, kolaboratif, dan berkelanjutan untuk menghasilkan riset berdampak, mempercepat hilirisasi inovasi, serta menumbuhkan generasi entreprenur yang berdaya saing global dan berakar pada potensi lokal."
                    </p>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="250" class="bg-white rounded-2xl shadow-xl p-8 sm:p-12 border-t-8 border-slate-800 transform transition duration-500 hover:-translate-y-2 group">
                <div class="w-16 h-16 bg-slate-100 text-slate-800 rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:bg-slate-800 group-hover:text-white transition-colors duration-300 transform group-hover:-rotate-12">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-900 mb-6">Misi Kami</h2>
                <ul class="space-y-5 text-slate-600 font-medium">
                    <li class="flex items-start group/list">
                        <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mt-0.5 mr-4 flex-shrink-0 group-hover/list:bg-amber-500 group-hover/list:text-white transition-colors">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <span>Mengembangkan riset dan inovasi STEM yang berkualitas dan relevan dengan kebutuhan masyarakat, industri, dan pembangunan daerah melalui pendekatan multidisiplin dan berbasis potensi lokal.</span>
                    </li>
                    <li class="flex items-start group/list">
                        <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mt-0.5 mr-4 flex-shrink-0 group-hover/list:bg-amber-500 group-hover/list:text-white transition-colors">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <span>Mendorong hilirisasi hasil riset dan inovasi menjadi produk, teknologi, model, maupun layanan yang memberikan manfaat nyata bagi masyarakat serta memiliki nilai ekonomi dan sosial yang berkelanjutan.</span>
                    </li>
                    <li class="flex items-start group/list">
                        <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mt-0.5 mr-4 flex-shrink-0 group-hover/list:bg-amber-500 group-hover/list:text-white transition-colors">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <span>Membangun ekosistem kewirausahaan berbasis STEM (STEM-preneurship) melalui pendampingan, inkubasi, pelatihan, dan penguatan kapasitas mahasiswa, dosen, serta masyarakat.</span>
                    </li>
                    <li class="flex items-start group/list">
                        <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mt-0.5 mr-4 flex-shrink-0 group-hover/list:bg-amber-500 group-hover/list:text-white transition-colors">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <span>Memperkuat kolaborasi pentahelix antara perguruan tinggi, pemerintah, industri, sekolah, komunitas, dan media untuk mempercepat transfer pengetahuan, adopsi teknologi, serta pengembangan inovasi daerah.</span>
                    </li>
                    <li class="flex items-start group/list">
                        <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mt-0.5 mr-4 flex-shrink-0 group-hover/list:bg-amber-500 group-hover/list:text-white transition-colors">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <span>Mengembangkan pendidikan dan literasi STEM yang inklusif dan transformatif guna meningkatkan minat, kompetensi, dan orientasi karir generasi muda pada bidang sains, teknologi, rekayasa, dan matematika.</span>
                    </li>
                    <li class="flex items-start group/list">
                        <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mt-0.5 mr-4 flex-shrink-0 group-hover/list:bg-amber-500 group-hover/list:text-white transition-colors">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <span>Menjadi pusat diseminasi dan jejaring STEM regional dan nasional melalui penyelenggaraan program, festival, pelatihan, publikasi, dan kemitraan strategis yang mendukung pembangunan berkelanjutan Sulawesi Barat.</span>
                    </li>
                </ul>
            </div>

            <!-- KARTU MOTTO (Disesuaikan dengan Kearifan Lokal) -->
            <div data-aos="fade-up" data-aos-delay="400" class="md:col-span-2 bg-white rounded-2xl shadow-xl p-8 sm:p-12 border-t-8 border-amber-500 transform transition duration-500 hover:-translate-y-2 group flex flex-col items-center text-center relative overflow-hidden">

                <i class="fa-solid fa-lightbulb absolute -right-10 -top-10 text-[12rem] text-amber-50 opacity-50 transform rotate-12 transition duration-700 group-hover:rotate-0 group-hover:scale-110"></i>

                <div class="relative z-10 w-full">
                    <div class="w-16 h-16 mx-auto bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300 transform group-hover:scale-110">
                        <i class="fa-solid fa-rocket"></i>
                    </div>

                    <h2 class="text-sm font-bold text-slate-400 mb-6 uppercase tracking-widest">Motto Kami</h2>

                    <p class="text-2xl md:text-3xl lg:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-[#800000] to-amber-600 leading-tight py-2 mb-4">
                        "From Research to Impact, <br class="hidden sm:block"> From Innovation to Entrepreneurship."
                    </p>

                    <div class="flex items-center justify-center w-full mb-5">
                        <div class="h-px bg-slate-200 w-16 md:w-32"></div>
                        <i class="fa-solid fa-leaf text-amber-400 mx-4"></i>
                        <div class="h-px bg-slate-200 w-16 md:w-32"></div>
                    </div>

                    <p class="text-xl md:text-2xl font-bold text-slate-800 italic drop-shadow-sm">
                        "Mappatuo Sains, Mappadalle Inovasi"
                    </p>
                    <p class="text-sm md:text-base text-slate-500 font-medium mt-3 px-4">
                        (Menghidupkan sains, menguatkan inovasi untuk kesejahteraan masyarakat)
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-slate-50 py-24 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-extrabold text-slate-900">Susunan Anggota & Kepengurusan</h2>
                <div class="h-1.5 w-24 bg-[#800000] mx-auto mt-6 rounded-full"></div>
                <p class="mt-4 text-lg text-slate-500 max-w-2xl mx-auto">
                    Mengenal lebih dekat tim pakar yang menjadi motor penggerak inovasi Pusat Studi STEM.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($teams as $index => $member)
                    <div data-aos="zoom-in" data-aos-delay="{{ $index * 150 }}"
                        class="relative w-full h-[420px] overflow-hidden group cursor-pointer shadow-[0_10px_30px_rgba(0,0,0,0.1)] hover:shadow-[0_20px_40px_rgba(128,0,0,0.25)] transition-all duration-700 ease-in-out
                                rounded-tl-[90px] rounded-br-[90px] rounded-tr-[16px] rounded-bl-[16px]
                                hover:rounded-tl-[16px] hover:rounded-br-[16px] hover:rounded-tr-[90px] hover:rounded-bl-[90px]">

                        @if ($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="Foto {{ $member->name }}"
                                class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition duration-1000">
                        @else
                            <div
                                class="absolute inset-0 w-full h-full bg-gradient-to-br from-slate-200 to-slate-300 text-slate-400 flex items-center justify-center text-7xl">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-transparent opacity-80 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <div class="absolute bottom-0 left-0 w-full p-6 sm:p-8 z-10 text-left transform translate-y-14 group-hover:translate-y-0 transition-all duration-500 ease-out">

                            <span class="inline-block px-3 py-1 rounded bg-amber-500 text-neutral-900 text-[10px] font-black uppercase tracking-widest mb-3 shadow-md">
                                {{ $member->role }}
                            </span>

                            <h3 class="text-lg sm:text-xl font-bold text-white leading-tight drop-shadow-md group-hover:text-amber-300 transition-colors duration-300 pr-4">
                                {{ $member->name }}
                            </h3>

                            <!-- DERETAN IKON INDEKSASI AKADEMIK -->
                            <div class="flex items-center space-x-3 mt-4 opacity-0 group-hover:opacity-100 transition-all duration-500 delay-100 transform scale-95 group-hover:scale-100">

                                @if ($member->scholar_url)
                                    <a href="{{ $member->scholar_url }}" target="_blank"
                                        class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center hover:bg-[#4285F4] hover:border-[#4285F4] transition-all duration-300"
                                        title="Profil Google Scholar">
                                        <i class="fa-brands fa-google text-sm"></i>
                                    </a>
                                @endif

                                @if ($member->sinta_url)
                                    <a href="{{ $member->sinta_url }}" target="_blank"
                                        class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center hover:bg-[#3252DF] hover:border-[#3252DF] transition-all duration-300"
                                        title="Profil SINTA">
                                        <i class="fa-solid fa-star text-sm"></i>
                                    </a>
                                @endif

                                @if ($member->scopus_url)
                                    <a href="{{ $member->scopus_url }}" target="_blank"
                                        class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md text-white border border-white/30 flex items-center justify-center hover:bg-[#ff8200] hover:border-[#ff8200] transition-all duration-300"
                                        title="Profil Scopus">
                                        <i class="fa-solid fa-graduation-cap text-sm"></i>
                                    </a>
                                @endif

                                @if (!$member->scopus_url && !$member->sinta_url && !$member->scholar_url)
                                    <span class="text-xs text-slate-300 italic font-light h-10 flex items-center">Profil akademik belum ditautkan</span>
                                @endif
                            </div>
                        </div>

                        <div class="absolute left-0 bottom-8 w-1 h-16 bg-amber-500 rounded-r-full transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500 delay-200"></div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-slate-400 bg-white rounded-3xl border border-dashed border-slate-300 shadow-sm" data-aos="fade-up">
                        <i class="fa-solid fa-users text-4xl mb-3 text-slate-300"></i>
                        <p class="font-medium">Data susunan anggota kepengurusan sedang diperbarui.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,
                offset: 50,
                duration: 800,
                easing: 'ease-out-cubic',
            });
        });
    </script>
@endsection
