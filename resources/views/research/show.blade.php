@extends('layouts.app')

@section('title', $research->title . ' | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-100 py-4 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('research.index') }}" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000] inline-flex items-center transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Katalog Penelitian
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $research->status == 'ongoing' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800' }} mb-4 shadow-sm">
                    {{ $research->status == 'ongoing' ? 'Sedang Berjalan' : 'Selesai' }}
                </span>

                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                    {{ $research->title }}
                </h1>

                <div class="w-full h-80 sm:h-96 bg-slate-200 rounded-xl overflow-hidden shadow-inner mb-8">
                    @if($research->image)
                        <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                            <i class="fa-solid fa-flask-vial text-7xl opacity-40 mb-3"></i>
                            <span class="text-sm font-medium">Dokumentasi Penelitian Belum Tersedia</span>
                        </div>
                    @endif
                </div>

                <div class="bg-white rounded-xl p-8 border border-slate-100 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                        <span class="w-1 h-6 bg-[#800000] rounded-full mr-3"></span> Abstrak / Deskripsi Penelitian
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-base whitespace-pre-line">
                        {{ $research->abstract ?? 'Deskripsi lengkap belum ditambahkan untuk penelitian ini.' }}
                    </p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl p-6 border border-slate-100 shadow-sm sticky top-28">
                    <h3 class="text-lg font-bold text-slate-900 pb-4 border-b border-slate-100 mb-4">
                        Informasi Penelitian
                    </h3>

                    <div class="space-y-4 text-sm">
                        <div class="flex items-start">
                            <div class="text-[#800000] mt-0.5 w-6"><i class="fa-solid fa-user-tie text-base"></i></div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Ketua Peneliti</span>
                                <span class="text-slate-800 font-medium">{{ $research->leader_name }}</span>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-[#800000] mt-0.5 w-6"><i class="fa-solid fa-calendar-day text-base"></i></div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Tanggal Mulai</span>
                                <span class="text-slate-800 font-medium">
                                    {{ $research->start_date ? \Carbon\Carbon::parse($research->start_date)->translatedFormat('d F Y') : '-' }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-[#800000] mt-0.5 w-6"><i class="fa-solid fa-calendar-check text-base"></i></div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Tanggal Selesai</span>
                                <span class="text-slate-800 font-medium">
                                    {{ $research->end_date ? \Carbon\Carbon::parse($research->end_date)->translatedFormat('d F Y') : 'Masih Berjalan' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-4 border-t border-slate-100">
                        <a href="mailto:stem@universitas.ac.id?subject=Tanya Tentang Penelitian: {{ $research->title }}" class="w-full py-3 bg-[#800000] text-white font-bold rounded-lg shadow block text-center hover:bg-[#5a0000] transition text-sm">
                            <i class="fa-solid fa-envelope mr-2"></i> Hubungi Peneliti
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
