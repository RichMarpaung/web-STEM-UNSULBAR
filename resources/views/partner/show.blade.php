@extends('layouts.app')

@section('title', 'Profil ' . $partner->name . ' | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-100 py-4 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('partner.index') }}" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000] transition inline-flex items-center">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Jaringan Kerja Sama
            </a>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">

            <div class="bg-slate-50 p-8 sm:p-12 border-b border-slate-100 flex flex-col sm:flex-row items-center sm:items-start gap-8">
                <div class="w-32 h-32 flex-shrink-0 bg-white rounded-xl shadow-sm border border-slate-200 flex items-center justify-center overflow-hidden p-4">
                    @if($partner->logo)
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" class="max-w-full max-h-full object-contain">
                    @else
                        <i class="fa-solid {{ $partner->type == 'mitra' ? 'fa-building' : 'fa-handshake' }} text-5xl text-slate-300"></i>
                    @endif
                </div>

                <div class="text-center sm:text-left flex-grow">
                    <span class="inline-block px-3 py-1 mb-3 rounded-full text-xs font-bold bg-[#800000] text-white uppercase tracking-wider">
                        {{ $partner->type == 'mitra' ? 'Mitra Industri / Instansi' : 'Kolaborasi Akademik' }}
                    </span>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4">
                        {{ $partner->name }}
                    </h1>

                    @if($partner->website)
                        <a href="{{ $partner->website }}" target="_blank" rel="noopener noreferrer" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition inline-flex items-center">
                            <i class="fa-solid fa-globe mr-2"></i> Kunjungi Website Resmi
                        </a>
                    @endif
                </div>
            </div>

            <div class="p-8 sm:p-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                    <div class="md:col-span-2">
                        <h2 class="text-xl font-bold text-slate-900 mb-4 border-b border-slate-100 pb-2">Ruang Lingkup Kerja Sama</h2>
                        <p class="text-slate-700 leading-relaxed whitespace-pre-line text-lg">
                            {{ $partner->description ?? 'Informasi ruang lingkup kerja sama belum tersedia.' }}
                        </p>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-6 border border-slate-100 h-fit">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Periode Perjanjian</h3>

                        <div class="space-y-4">
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Mulai Berlaku</span>
                                <span class="text-slate-800 font-medium">
                                    {{ $partner->start_date ? \Carbon\Carbon::parse($partner->start_date)->translatedFormat('d F Y') : 'Tidak Diketahui' }}
                                </span>
                            </div>

                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Berakhir Pada</span>
                                <span class="text-slate-800 font-medium">
                                    @if($partner->end_date)
                                        {{ \Carbon\Carbon::parse($partner->end_date)->translatedFormat('d F Y') }}
                                    @else
                                        <span class="text-emerald-600 font-semibold">Hingga Saat Ini (Aktif)</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
