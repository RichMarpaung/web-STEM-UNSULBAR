<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Pusat Studi STEM')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <nav class="bg-[#800000] text-white sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0 flex items-center space-x-3">
                    <div class="bg-white p-2 rounded-full text-[#800000] font-bold text-xl w-10 h-10 flex items-center justify-center shadow">
                        S
                    </div>
                    <span class="font-bold text-lg tracking-wider hidden sm:block">Pusat Studi STEM</span>
                </div>

                <div class="hidden md:flex space-x-1 font-medium">
                    <a href="#" class="px-3 py-2 rounded-md bg-[#5a0000] transition">Beranda</a>
                    <a href="#" class="px-3 py-2 rounded-md hover:bg-[#5a0000] transition">Tentang Kami</a>
                    <a href="#" class="px-3 py-2 rounded-md hover:bg-[#5a0000] transition">Penelitian</a>
                    <a href="#" class="px-3 py-2 rounded-md hover:bg-[#5a0000] transition">Pengabdian</a>
                    <a href="#" class="px-3 py-2 rounded-md hover:bg-[#5a0000] transition">Luaran</a>
                    <a href="#" class="px-3 py-2 rounded-md hover:bg-[#5a0000] transition">Kerja Sama</a>
                </div>

                <div class="md:hidden">
                    <button type="button" class="text-white hover:text-slate-200 focus:outline-none" onclick="toggleMobileMenu()">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-[#6b0000] px-4 pt-2 pb-4 space-y-1 shadow-inner">
            <a href="#" class="block px-3 py-2 rounded-md bg-[#5a0000]">Beranda</a>
            <a href="#" class="block px-3 py-2 rounded-md hover:bg-[#5a0000]">Tentang Kami</a>
            <a href="#" class="block px-3 py-2 rounded-md hover:bg-[#5a0000]">Penelitian</a>
            <a href="#" class="block px-3 py-2 rounded-md hover:bg-[#5a0000]">Pengabdian</a>
            <a href="#" class="block px-3 py-2 rounded-md hover:bg-[#5a0000]">Luaran</a>
            <a href="#" class="block px-3 py-2 rounded-md hover:bg-[#5a0000]">Kerja Sama</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-slate-400 py-12 mt-20 border-t-4 border-[#800000]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Pusat Studi STEM</h3>
                <p class="text-sm leading-relaxed">Menjadi pusat keunggulan interdisipliner dalam bidang Science, Technology, Engineering, dan Mathematics yang berdampak global.</p>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Tautan Cepat</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition">Agenda Kegiatan</a></li>
                    <li><a href="#" class="hover:text-white transition">Jurnal STEM</a></li>
                    <li><a href="#" class="hover:text-white transition">Sistem Kemitraan</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Kontak</h3>
                <p class="text-sm"><i class="fa-solid fa-envelope mr-2 text-[#800000]"></i> stem@universitas.ac.id</p>
                <p class="text-sm mt-2"><i class="fa-solid fa-location-dot mr-2 text-[#800000]"></i> Gedung Riset Terpadu, Lt. 3</p>
            </div>
        </div>
        <div class="text-center text-xs mt-12 pt-6 border-t border-slate-800">
            &copy; {{ date('Y') }} Pusat Studi STEM. All rights reserved.
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
