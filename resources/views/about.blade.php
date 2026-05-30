@extends('layouts.app')

@section('title', 'Tentang Kami | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-900 py-20 border-b-4 border-[#800000] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <i class="fa-solid fa-network-wired text-9xl absolute -right-10 -bottom-10"></i>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-6">Profil Pusat Studi STEM</h1>
            <p class="text-lg text-slate-300 max-w-3xl mx-auto leading-relaxed">
                Membangun ekosistem riset interdisipliner yang inovatif dan solutif. Kami berdedikasi untuk menjembatani ilmu pengetahuan murni dan terapan guna menjawab tantangan global di era digital.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="bg-white rounded-2xl shadow-xl p-8 sm:p-12 border-t-8 border-[#800000] transform transition duration-500 hover:-translate-y-2">
                <div class="w-16 h-16 bg-red-50 text-[#800000] rounded-full flex items-center justify-center text-3xl mb-6 shadow-inner">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Visi Kami</h2>
                <p class="text-slate-700 leading-relaxed text-lg italic">
                    "Menjadi pusat studi unggulan tingkat nasional dan internasional yang mengintegrasikan bidang Science, Technology, Engineering, dan Mathematics (STEM) untuk menghasilkan inovasi berkelanjutan pada tahun 2030."
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 sm:p-12 border-t-8 border-slate-800 transform transition duration-500 hover:-translate-y-2">
                <div class="w-16 h-16 bg-slate-100 text-slate-800 rounded-full flex items-center justify-center text-3xl mb-6 shadow-inner">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Misi Kami</h2>
                <ul class="space-y-4 text-slate-700">
                    <li class="flex items-start">
                        <i class="fa-solid fa-check text-[#800000] mt-1.5 mr-3"></i>
                        <span>Melaksanakan penelitian interdisipliner mutakhir di bidang STEM.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fa-solid fa-check text-[#800000] mt-1.5 mr-3"></i>
                        <span>Menerapkan hasil riset melalui program pengabdian masyarakat yang terukur.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fa-solid fa-check text-[#800000] mt-1.5 mr-3"></i>
                        <span>Membangun kolaborasi strategis dengan dunia industri, pemerintah, dan akademisi global.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fa-solid fa-check text-[#800000] mt-1.5 mr-3"></i>
                        <span>Mempublikasikan luaran ilmiah dan mendaftarkan hak kekayaan intelektual (HKI) dari karya inovatif.</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="bg-slate-50 py-20 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900">Susunan Anggota & Kepengurusan</h2>
                <div class="h-1 w-20 bg-[#800000] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-slate-600">Tim pakar yang menjadi motor penggerak inovasi Pusat Studi STEM.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition border border-slate-100">
                    <div class="w-24 h-24 mx-auto bg-slate-200 rounded-full mb-4 overflow-hidden border-4 border-red-50">
                        <div class="w-full h-full bg-[#800000] text-white flex items-center justify-center text-3xl">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Dr. Hendra Saputra, M.T.</h3>
                    <p class="text-sm font-semibold text-[#800000] uppercase tracking-wide mt-1 mb-3">Ketua Pusat Studi</p>
                    <p class="text-xs text-slate-500">Pakar Sistem Tertanam (Embedded Systems) dan Internet of Things.</p>
                </div>

                <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition border border-slate-100">
                    <div class="w-24 h-24 mx-auto bg-slate-200 rounded-full mb-4 overflow-hidden border-4 border-slate-50">
                        <div class="w-full h-full bg-slate-700 text-white flex items-center justify-center text-3xl">
                            <i class="fa-solid fa-microscope"></i>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Prof. Rina Wijayanti</h3>
                    <p class="text-sm font-semibold text-slate-600 uppercase tracking-wide mt-1 mb-3">Kadiv. Penelitian</p>
                    <p class="text-xs text-slate-500">Guru Besar bidang Data Science dan Kecerdasan Buatan (AI).</p>
                </div>

                <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition border border-slate-100">
                    <div class="w-24 h-24 mx-auto bg-slate-200 rounded-full mb-4 overflow-hidden border-4 border-slate-50">
                        <div class="w-full h-full bg-slate-700 text-white flex items-center justify-center text-3xl">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Ir. Budi Santoso, Ph.D.</h3>
                    <p class="text-sm font-semibold text-slate-600 uppercase tracking-wide mt-1 mb-3">Kadiv. Pengabdian</p>
                    <p class="text-xs text-slate-500">Spesialis Teknologi Tepat Guna dan Rekayasa Energi Terbarukan.</p>
                </div>

                <div class="bg-white rounded-xl p-6 text-center shadow-sm hover:shadow-md transition border border-slate-100">
                    <div class="w-24 h-24 mx-auto bg-slate-200 rounded-full mb-4 overflow-hidden border-4 border-slate-50">
                        <div class="w-full h-full bg-slate-700 text-white flex items-center justify-center text-3xl">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Dr. Anita Rahmawati</h3>
                    <p class="text-sm font-semibold text-slate-600 uppercase tracking-wide mt-1 mb-3">Kadiv. Mitra & Luaran</p>
                    <p class="text-xs text-slate-500">Ahli Ilmu Material (Nanotech) dan Manajemen HKI Inovasi.</p>
                </div>

            </div>
        </div>
    </div>
@endsection
