@extends('layouts.app')

@section('title', $workProgram->name . ' | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-100 py-4 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('work_program.index') }}" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000] inline-flex items-center transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Katalog Program
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 relative">

            <div class="lg:col-span-2">
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                    {{ $workProgram->name }}
                </h1>

                <div class="w-full h-80 sm:h-96 bg-slate-100 rounded-2xl overflow-hidden shadow-inner mb-8 border border-slate-200 relative group">
                    @if($workProgram->image)
                        <img src="{{ asset('storage/' . $workProgram->image) }}" alt="{{ $workProgram->name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700 ease-in-out">
                    @else
                        <div class="absolute inset-0 bg-gradient-to-br from-slate-50 to-slate-100 flex flex-col items-center justify-center text-slate-300">
                            <i class="fa-solid fa-briefcase text-7xl mb-3"></i>
                            <span class="text-sm font-medium">Dokumentasi Belum Tersedia</span>
                        </div>
                    @endif
                </div>

                <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-8">
                    <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                        <span class="w-1.5 h-6 bg-[#800000] rounded-full mr-3"></span> Rincian Program Kerja
                    </h2>
                    <p class="text-slate-600 leading-relaxed text-base whitespace-pre-line font-light text-justify">
                        {{ $workProgram->description ?? 'Deskripsi lengkap atau rincian program kerja belum ditambahkan.' }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                    <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                        <span class="w-1.5 h-6 bg-[#800000] rounded-full mr-3"></span> Anggota Terlibat
                    </h2>

                    @if($workProgram->teams->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($workProgram->teams as $team)
                                <div class="flex items-center p-4 bg-slate-50 border border-slate-100 rounded-xl hover:bg-red-50 hover:border-red-100 transition-colors duration-300 group/team">
                                    @if($team->image)
                                        <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}" class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-sm flex-shrink-0 mr-4 group-hover/team:border-red-200 transition-colors">
                                    @else
                                        <div class="w-12 h-12 rounded-full bg-white border border-slate-200 text-slate-400 flex items-center justify-center font-bold text-sm flex-shrink-0 mr-4 shadow-sm group-hover/team:border-red-200 group-hover/team:text-[#800000] transition-colors">
                                            {{ strtoupper(substr($team->name, 0, 2)) }}
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-slate-800 truncate leading-tight group-hover/team:text-[#800000] transition-colors">{{ $team->name }}</p>
                                        <p class="text-[11px] text-slate-500 truncate mt-0.5 font-medium uppercase tracking-wider">{{ $team->role }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 bg-slate-50 rounded-xl border border-dashed border-slate-200">
                            <i class="fa-solid fa-users-slash text-3xl text-slate-300 mb-2"></i>
                            <p class="text-sm text-slate-500">Belum ada rincian anggota yang ditautkan pada program ini.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] sticky top-28">
                    <h3 class="text-lg font-bold text-slate-900 pb-4 border-b border-slate-100 mb-6">Info Pelaksanaan</h3>

                    <div class="space-y-5 text-sm">
                        <div class="flex items-start">
                            <div class="text-[#800000] mt-0.5 w-6 flex-shrink-0"><i class="fa-solid fa-map-location-dot text-base"></i></div>
                            <div>
                                <span class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-0.5">Lokasi Kegiatan</span>
                                <span class="text-slate-800 font-bold leading-tight">{{ $workProgram->location }}</span>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="text-[#800000] mt-0.5 w-6 flex-shrink-0"><i class="fa-solid fa-calendar-check text-base"></i></div>
                            <div>
                                <span class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-0.5">Waktu Pelaksanaan</span>
                                <span class="text-slate-800 font-bold">
                                    {{ \Carbon\Carbon::parse($workProgram->date)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
