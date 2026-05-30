<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Pusat Studi STEM')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.webp') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <nav class="bg-white text-slate-800 sticky top-0 z-50 shadow-md border-b-4 border-[#800000]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <a href="{{ route('landing') }}" class="flex-shrink-0 flex items-center space-x-3 group">
                    <img src="{{ asset('image/logo.webp') }}" alt="Logo STEM"
                        class="h-14 w-14 object-contain transform group-hover:scale-105 transition duration-300">
                    <img src="{{ asset('image/teks.webp') }}" alt="Pusat Studi STEM"
                        class="h-8 w-auto object-contain hidden sm:block transition duration-300">
                </a>

                <div class="hidden md:flex space-x-1 font-medium">
                    <a href="{{ route('landing') }}"
                        class="px-3 py-2 rounded-md transition {{ request()->routeIs('landing') ? 'bg-red-50 text-[#800000]' : 'hover:bg-red-50 hover:text-[#800000]' }}">Beranda</a>
                    <a href="{{ route('about') }}"
                        class="px-3 py-2 rounded-md transition {{ request()->routeIs('about') ? 'bg-red-50 text-[#800000]' : 'hover:bg-red-50 hover:text-[#800000]' }}">Tentang
                        Kami</a>
                    <a href="{{ route('research.index') }}"
                        class="px-3 py-2 rounded-md transition {{ request()->routeIs('research.*') ? 'bg-red-50 text-[#800000]' : 'hover:bg-red-50 hover:text-[#800000]' }}">Penelitian</a>
                    <a href="{{ route('service.index') }}"
                        class="px-3 py-2 rounded-md transition {{ request()->routeIs('service.*') ? 'bg-red-50 text-[#800000]' : 'hover:bg-red-50 hover:text-[#800000]' }}">Pengabdian</a>
                    <a href="{{ route('output.index') }}"
                        class="px-3 py-2 rounded-md transition {{ request()->routeIs('output.*') ? 'bg-red-50 text-[#800000]' : 'hover:bg-red-50 hover:text-[#800000]' }}">Luaran</a>
                    <a href="{{ route('partner.index') }}"
                        class="px-3 py-2 rounded-md transition {{ request()->routeIs('partner.*') ? 'bg-red-50 text-[#800000]' : 'hover:bg-red-50 hover:text-[#800000]' }}">Kerja
                        Sama</a>
                </div>

                <div class="md:hidden">
                    <button type="button" class="text-slate-800 hover:text-[#800000] focus:outline-none"
                        onclick="toggleMobileMenu()">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu"
            class="hidden md:hidden bg-slate-50 px-4 pt-2 pb-4 space-y-1 shadow-inner border-t border-slate-200">
            <a href="{{ route('landing') }}"
                class="block px-3 py-2 rounded-md transition {{ request()->routeIs('landing') ? 'bg-red-50 text-[#800000] font-semibold' : 'text-slate-800 hover:bg-red-50 hover:text-[#800000]' }}">
                Beranda
            </a>

            <a href="{{ route('about') }}"
                class="block px-3 py-2 rounded-md transition {{ request()->routeIs('about') ? 'bg-red-50 text-[#800000] font-semibold' : 'text-slate-800 hover:bg-red-50 hover:text-[#800000]' }}">
                Tentang Kami
            </a>

            <a href="{{ route('research.index') }}"
                class="block px-3 py-2 rounded-md transition {{ request()->routeIs('research.*') ? 'bg-red-50 text-[#800000] font-semibold' : 'text-slate-800 hover:bg-red-50 hover:text-[#800000]' }}">
                Penelitian
            </a>

            <a href="{{ route('service.index') }}"
                class="block px-3 py-2 rounded-md transition {{ request()->routeIs('service.*') ? 'bg-red-50 text-[#800000] font-semibold' : 'text-slate-800 hover:bg-red-50 hover:text-[#800000]' }}">
                Pengabdian
            </a>

            <a href="{{ route('output.index') }}"
                class="block px-3 py-2 rounded-md transition {{ request()->routeIs('output.*') ? 'bg-red-50 text-[#800000] font-semibold' : 'text-slate-800 hover:bg-red-50 hover:text-[#800000]' }}">
                Luaran
            </a>

            <a href="{{ route('partner.index') }}"
                class="block px-3 py-2 rounded-md transition {{ request()->routeIs('partner.*') ? 'bg-red-50 text-[#800000] font-semibold' : 'text-slate-800 hover:bg-red-50 hover:text-[#800000]' }}">
                Kerja Sama
            </a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

   <footer class="bg-gradient-to-b from-[#4a0000] to-slate-950 text-slate-300 py-16 mt-20 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 rounded-full bg-white opacity-5"></div>
        <div class="absolute bottom-0 left-0 -ml-10 -mb-10 w-64 h-64 rounded-full bg-amber-500 opacity-[0.03]"></div>

        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-600 via-amber-400 to-amber-600"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-12 relative z-10">
            <div class="space-y-6">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center p-1 shadow-lg">
                        <img src="{{ asset('image/logo.webp') }}" alt="Logo STEM" class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-white font-extrabold text-xl tracking-tight">Pusat Studi <span class="text-amber-400">STEM Education</span>  </h3>
                </div>
                <p class="text-sm leading-relaxed text-slate-400 font-light pr-4">
                    Menjadi pusat keunggulan interdisipliner dalam bidang Science, Technology, Engineering, dan Mathematics yang berdampak global serta berkontribusi nyata bagi masyarakat.
                </p>
                <div class="flex space-x-4 pt-2">
                    <a href="#" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-slate-300 hover:bg-amber-500 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-slate-300 hover:bg-amber-500 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-youtube text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-slate-300 hover:bg-amber-500 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-linkedin-in text-sm"></i>
                    </a>
                </div>
            </div>

            <div class="md:pl-10">
                <h3 class="text-white font-bold text-lg mb-6 flex items-center">
                    <i class="fa-solid fa-link text-amber-500 mr-2 text-sm"></i> Tautan Cepat
                </h3>
                <ul class="space-y-3 text-sm font-medium">
                    <li><a href="{{ route('research.index') }}" class="flex items-center hover:text-amber-400 transition-colors group"><i class="fa-solid fa-chevron-right text-[10px] text-slate-600 group-hover:text-amber-500 mr-2"></i> Katalog Penelitian</a></li>
                    <li><a href="{{ route('service.index') }}" class="flex items-center hover:text-amber-400 transition-colors group"><i class="fa-solid fa-chevron-right text-[10px] text-slate-600 group-hover:text-amber-500 mr-2"></i> Kegiatan Pengabdian</a></li>
                    <li><a href="{{ route('output.index') }}" class="flex items-center hover:text-amber-400 transition-colors group"><i class="fa-solid fa-chevron-right text-[10px] text-slate-600 group-hover:text-amber-500 mr-2"></i> Jurnal & Publikasi</a></li>
                    <li><a href="{{ route('partner.index') }}" class="flex items-center hover:text-amber-400 transition-colors group"><i class="fa-solid fa-chevron-right text-[10px] text-slate-600 group-hover:text-amber-500 mr-2"></i> Sistem Kemitraan</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-bold text-lg mb-6 flex items-center">
                    <i class="fa-solid fa-address-book text-amber-500 mr-2 text-sm"></i> Hubungi Kami
                </h3>
                <div class="space-y-4 text-sm font-light">
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0 mr-3 text-amber-500">
                            <i class="fa-solid fa-envelope text-xs"></i>
                        </div>
                        <div class="pt-1.5">
                            <p class="text-white font-medium mb-0.5">Email Resmi</p>
                            <a href="mailto:stem@universitas.ac.id" class="hover:text-amber-400 transition-colors">stem@universitas.ac.id</a>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0 mr-3 text-amber-500">
                            <i class="fa-solid fa-location-dot text-xs"></i>
                        </div>
                        <div class="pt-1.5">
                            <p class="text-white font-medium mb-0.5">Alamat Kantor</p>
                            <p class="leading-relaxed">Gedung Riset Terpadu, Lt. 3<br>Universitas Sulawesi Barat<br>Majene, Sulawesi Barat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 pt-8 border-t border-white/10 flex flex-col md:flex-row items-center justify-between relative z-10 text-xs font-light">
            <p>&copy; {{ date('Y') }} Pusat Studi STEM Education - Universitas Sulawesi Barat. Hak Cipta Dilindungi.</p>
            <p class="mt-2 md:mt-0 opacity-75">Dikembangkan oleh <span class="font-semibold text-amber-400">Tim IT STEM Education</span></p>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>

</html>
