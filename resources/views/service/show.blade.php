@extends('layouts.app')

@section('title', $communityService->title . ' | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-100 py-4 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('service.index') }}" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000] inline-flex items-center transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Pengabdian
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2">
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                    {{ $communityService->title }}
                </h1>

                <div class="w-full h-80 sm:h-96 bg-red-50 rounded-xl overflow-hidden shadow-inner mb-8 border border-red-100">
                    @if($communityService->image)
                        <img src="{{ asset('storage/' . $communityService->image) }}" alt="{{ $communityService->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                            <i class="fa-solid fa-camera text-7xl opacity-40 mb-3 text-[#800000]"></i>
                            <span class="text-sm font-medium">Dokumentasi Belum Tersedia</span>
                        </div>
                    @endif
                </div>

                <div class="bg-white rounded-xl p-8 border border-slate-100 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                        <span class="w-1 h-6 bg-[#800000] rounded-full mr-3"></span> Rincian Kegiatan
                    </h2>
                    <p class="text-slate-700 leading-relaxed text-base whitespace-pre-line">
                        {{ $communityService->description ?? 'Deskripsi lengkap belum ditambahkan.' }}
                    </p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl p-6 border border-slate-100 shadow-sm sticky top-28">
                    <h3 class="text-lg font-bold text-slate-900 pb-4 border-b border-slate-100 mb-4">
                        Info Pelaksanaan
                    </h3>

                    <div class="space-y-4 text-sm">
                        <div class="flex items-start">
                            <div class="text-[#800000] mt-0.5 w-6"><i class="fa-solid fa-map-location-dot text-base"></i></div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Lokasi</span>
                                <span class="text-slate-800 font-medium">{{ $communityService->location }}</span>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-[#800000] mt-0.5 w-6"><i class="fa-solid fa-calendar-check text-base"></i></div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Tanggal Kegiatan</span>
                                <span class="text-slate-800 font-medium">
                                    {{ $communityService->date ? \Carbon\Carbon::parse($communityService->date)->translatedFormat('d F Y') : '-' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
