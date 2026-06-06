<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Pusat Studi STEM')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.webp') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-800 flex h-screen overflow-hidden antialiased">

    <aside class="w-72 bg-slate-900 text-white flex flex-col hidden md:flex h-full z-20 relative">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#800000] to-red-500"></div>

        <div class="h-24 flex items-center border-b border-slate-800/50">
            <a href="{{ route('landing') }}" class="flex items-center justify-center gap-3 group w-full"
                title="Ke Halaman Publik">
                <div class="bg-white p-1 shadow-lg shadow-red-900/50 flex flex-shrink-0 items-center justify-center transform group-hover:scale-105 transition duration-300 rounded-full">
                    <img src="{{ asset('image/logo.webp') }}" alt="Logo STEM"
                        class="h-14 w-14 object-contain rounded-full">
                </div>
                <img src="{{ asset('image/teks.webp') }}" alt="Admin STEM"
                    class="h-10 w-auto object-contain opacity-90 group-hover:opacity-100 transition duration-300">
            </a>
        </div>

        <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3.5 rounded-2xl {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-[#800000] to-[#6a0000] text-white shadow-lg shadow-red-900/20 transform hover:-translate-y-0.5' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition duration-300 mb-6">
                <div class="w-8 flex justify-center"><i
                        class="fa-solid fa-gauge {{ request()->routeIs('admin.dashboard') ? 'text-red-200' : '' }}"></i>
                </div>
                <span class="font-medium text-sm">Dashboard</span>
            </a>

            <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-4">Manajemen Konten</p>
<a href="{{ route('admin.team.index') }}"
                class="flex items-center px-4 py-3.5 rounded-2xl {{ request()->routeIs('admin.team.*') ? 'bg-gradient-to-r from-[#800000] to-[#6a0000] text-white shadow-lg shadow-red-900/20 transform hover:-translate-y-0.5' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition duration-300">
                <div class="w-8 flex justify-center"><i
                        class="fa-solid fa-users {{ request()->routeIs('admin.team.*') ? 'text-red-200' : '' }}"></i>
                </div>
                <span class="font-medium text-sm">Data Tim</span>
            </a>
            <a href="{{ route('admin.work_program.index') }}"
                    class="flex items-center px-4 py-3.5 rounded-2xl {{ request()->routeIs('admin.work_program.*') ? 'bg-gradient-to-r from-[#800000] to-[#6a0000] text-white shadow-lg shadow-red-900/20 transform hover:-translate-y-0.5' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition duration-300">
                    <div class="w-8 flex justify-center">
                        <i class="fa-solid fa-briefcase {{ request()->routeIs('admin.work_program.*') ? 'text-red-200' : '' }}"></i>
                    </div>
                    <span class="font-medium text-sm">Program Kerja</span>
                </a>
            <a href="{{ route('admin.research.index') }}"
                class="flex items-center px-4 py-3.5 rounded-2xl {{ request()->routeIs('admin.research.*') ? 'bg-gradient-to-r from-[#800000] to-[#6a0000] text-white shadow-lg shadow-red-900/20 transform hover:-translate-y-0.5' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition duration-300">
                <div class="w-8 flex justify-center"><i
                        class="fa-solid fa-microscope {{ request()->routeIs('admin.research.*') ? 'text-red-200' : '' }}"></i>
                </div>
                <span class="font-medium text-sm">Data Penelitian</span>
            </a>

            <a href="{{ route('admin.service.index') }}"
                class="flex items-center px-4 py-3.5 rounded-2xl {{ request()->routeIs('admin.service.*') ? 'bg-gradient-to-r from-[#800000] to-[#6a0000] text-white shadow-lg shadow-red-900/20 transform hover:-translate-y-0.5' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition duration-300">
                <div class="w-8 flex justify-center"><i
                        class="fa-solid fa-people-carry-box {{ request()->routeIs('admin.service.*') ? 'text-red-200' : '' }}"></i>
                </div>
                <span class="font-medium text-sm">Data Pengabdian</span>
            </a>


            <a href="{{ route('admin.output.index') }}"
                class="flex items-center px-4 py-3.5 rounded-2xl {{ request()->routeIs('admin.output.*') ? 'bg-gradient-to-r from-[#800000] to-[#6a0000] text-white shadow-lg shadow-red-900/20 transform hover:-translate-y-0.5' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition duration-300">
                <div class="w-8 flex justify-center"><i
                        class="fa-solid fa-file-export {{ request()->routeIs('admin.output.*') ? 'text-red-200' : '' }}"></i>
                </div>
                <span class="font-medium text-sm">Data Luaran</span>
            </a>

            <a href="{{ route('admin.partner.index') }}"
                class="flex items-center px-4 py-3.5 rounded-2xl {{ request()->routeIs('admin.partner.*') ? 'bg-gradient-to-r from-[#800000] to-[#6a0000] text-white shadow-lg shadow-red-900/20 transform hover:-translate-y-0.5' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition duration-300">
                <div class="w-8 flex justify-center"><i
                        class="fa-solid fa-handshake {{ request()->routeIs('admin.partner.*') ? 'text-red-200' : '' }}"></i>
                </div>
                <span class="font-medium text-sm">Data Kerja Sama</span>
            </a>

            <a href="{{ route('admin.slider.index') }}"
                class="flex items-center px-4 py-3.5 rounded-2xl {{ request()->routeIs('admin.slider.*') ? 'bg-gradient-to-r from-[#800000] to-[#6a0000] text-white shadow-lg shadow-red-900/20 transform hover:-translate-y-0.5' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }} transition duration-300">
                <div class="w-8 flex justify-center"><i
                        class="fa-solid fa-images {{ request()->routeIs('admin.slider.*') ? 'text-red-200' : '' }}"></i>
                </div>
                <span class="font-medium text-sm">Data Slider</span>
            </a>

        </nav>

        <div class="p-6 border-t border-slate-800/50">
            <a href="{{ route('landing') }}" target="_blank"
                class="flex items-center justify-center px-4 py-3 bg-slate-800/50 text-sm font-medium text-slate-300 rounded-2xl hover:text-white hover:bg-slate-800 transition duration-300 w-full border border-slate-700/50">
                <i class="fa-solid fa-globe mr-2 text-slate-400"></i> Kunjungi Website
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-screen overflow-hidden">

        <header
            class="h-24 bg-white/80 backdrop-blur-md border-b border-slate-200/60 flex items-center justify-between px-8 z-10">
            <div class="flex items-center">
                <button class="md:hidden text-slate-500 hover:text-slate-800">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <h2 class="ml-4 text-2xl font-bold text-slate-800 tracking-tight">@yield('header', 'Dashboard')</h2>
            </div>

            <div class="flex items-center space-x-4 relative group">
                <div
                    class="flex items-center bg-slate-50 px-4 py-2 rounded-full border border-slate-100 cursor-pointer hover:bg-slate-100 transition">
                    <div
                        class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#800000] to-red-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <span
                        class="ml-3 text-sm font-semibold text-slate-700 hidden sm:block">{{ Auth::user()->name ?? 'Administrator' }}</span>
                    <i
                        class="fa-solid fa-chevron-down ml-3 text-xs text-slate-400 group-hover:rotate-180 transition duration-300"></i>
                </div>

                <div
                    class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right z-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 hover:rounded-xl font-medium transition">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8 bg-[#f8fafc]">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Notifikasi Sukses
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{!! session('success') !!}',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top-end',
                    heightAuto: false // Tambahkan ini
                });
            @endif

            // Notifikasi Error
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{!! session('error') !!}',
                    confirmButtonColor: '#800000',
                    heightAuto: false // Tambahkan ini
                });
            @endif
        });

        // Fungsi Konfirmasi Hapus
        function confirmDelete(event, formElement) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: '<i class="fa-solid fa-trash-can mr-2"></i>Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                heightAuto: false, // TAMBAHKAN INI DI SINI AGAR SIDEBAR TIDAK Menciut
                customClass: {
                    confirmButton: 'rounded-full px-6 py-2.5 font-bold shadow-lg hover:shadow-xl transition-all',
                    cancelButton: 'rounded-full px-6 py-2.5 font-bold mr-3 hover:bg-slate-500 transition-all'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    formElement.submit();
                }
            })
        }
    </script>
</body>

</html>
