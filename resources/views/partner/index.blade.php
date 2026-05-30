@extends('layouts.app')

@section('title', 'Kerja Sama & Mitra | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-900 py-16 border-b-4 border-[#800000]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white mb-4">Jaringan Kerja Sama</h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">
                Kolaborasi strategis dengan berbagai universitas, industri, dan instansi pemerintah untuk memperluas dampak inovasi STEM.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex flex-wrap justify-center gap-4 mb-12 border-b border-slate-200 pb-6">
            <a href="{{ route('partner.index') }}" class="px-5 py-2 rounded-full font-medium text-sm transition {{ !request('type') ? 'bg-[#800000] text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Semua Jaringan
            </a>
            <a href="{{ route('partner.index', ['type' => 'kolaborasi']) }}" class="px-5 py-2 rounded-full font-medium text-sm transition {{ request('type') == 'kolaborasi' ? 'bg-[#800000] text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Kolaborasi Akademik
            </a>
            <a href="{{ route('partner.index', ['type' => 'mitra']) }}" class="px-5 py-2 rounded-full font-medium text-sm transition {{ request('type') == 'mitra' ? 'bg-[#800000] text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Mitra Industri & Instansi
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($partners as $partner)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 overflow-hidden flex flex-col text-center group">

                    <div class="h-40 w-full bg-slate-50 border-b border-slate-100 flex items-center justify-center p-6 relative">
                        <div class="absolute top-3 right-3">
                            <span class="text-[10px] font-bold px-2 py-1 rounded bg-slate-200 text-slate-600 uppercase tracking-wider">
                                {{ $partner->type }}
                            </span>
                        </div>

                        @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="max-h-full max-w-full object-contain grayscale group-hover:grayscale-0 transition duration-300">
                        @else
                            <div class="w-16 h-16 rounded-full bg-red-100 text-[#800000] flex items-center justify-center text-2xl">
                                <i class="fa-solid {{ $partner->type == 'mitra' ? 'fa-building' : 'fa-handshake' }}"></i>
                            </div>
                        @endif
                    </div>

                    <div class="p-6 flex-grow flex flex-col items-center">
                        <h3 class="text-lg font-bold text-slate-900 mb-3 line-clamp-2" title="{{ $partner->name }}">
                            {{ $partner->name }}
                        </h3>

                        <p class="text-slate-500 text-sm mb-6 flex-grow line-clamp-3">
                            {{ $partner->description ?? 'Deskripsi tidak tersedia.' }}
                        </p>

                        <div class="mt-auto pt-4 w-full">
                            <a href="{{ route('partner.show', $partner->slug) }}" class="inline-block w-full py-2 bg-slate-100 text-[#800000] font-semibold text-sm rounded hover:bg-[#800000] hover:text-white transition">
                                Lihat Profil
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <i class="fa-solid fa-link-slash text-5xl text-slate-300 mb-4"></i>
                    <h3 class="text-xl font-medium text-slate-600">Belum ada data kerja sama.</h3>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $partners->withQueryString()->links() }}
        </div>
    </div>
@endsection
