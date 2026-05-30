@extends('layouts.app')

@section('title', 'Luaran & Publikasi | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-900 py-16 border-b-4 border-[#800000]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white mb-4">Luaran & Publikasi</h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">
                Arsip publikasi jurnal ilmiah, hak kekayaan intelektual (HKI), dan penghargaan yang diraih oleh tim peneliti.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex flex-wrap justify-center gap-4 mb-12 border-b border-slate-200 pb-6">
            <a href="{{ route('output.index') }}" class="px-5 py-2 rounded-full font-medium text-sm transition {{ !request('type') ? 'bg-[#800000] text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Semua Luaran
            </a>
            <a href="{{ route('output.index', ['type' => 'jurnal']) }}" class="px-5 py-2 rounded-full font-medium text-sm transition {{ request('type') == 'jurnal' ? 'bg-[#800000] text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Jurnal Ilmiah
            </a>
            <a href="{{ route('output.index', ['type' => 'hki']) }}" class="px-5 py-2 rounded-full font-medium text-sm transition {{ request('type') == 'hki' ? 'bg-[#800000] text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                HKI & Paten
            </a>
            <a href="{{ route('output.index', ['type' => 'penghargaan']) }}" class="px-5 py-2 rounded-full font-medium text-sm transition {{ request('type') == 'penghargaan' ? 'bg-[#800000] text-white shadow' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Penghargaan
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($outputs as $output)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100 p-6 flex flex-col">

                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold px-3 py-1 rounded text-[#800000] bg-red-50 uppercase tracking-wider">
                            {{ $output->type }}
                        </span>
                        <span class="text-xs font-medium text-slate-400">
                            {{ $output->date ? \Carbon\Carbon::parse($output->date)->format('Y') : '' }}
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900 mb-2 line-clamp-2">
                        {{ $output->title }}
                    </h3>

                    <p class="text-sm text-slate-500 mb-4 font-medium flex items-center">
                        <i class="fa-solid fa-building-columns mr-2 text-slate-400"></i> {{ $output->issuer ?? 'Penerbit Tidak Diketahui' }}
                    </p>

                    <p class="text-slate-600 text-sm mb-6 flex-grow line-clamp-3">
                        {{ $output->description }}
                    </p>

                    <div class="mt-auto pt-4 border-t border-slate-100">
                        <a href="{{ route('output.show', $output->slug) }}" class="text-[#800000] font-semibold text-sm hover:text-[#5a0000] transition inline-flex items-center">
                            Detail Luaran <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <h3 class="text-xl font-medium text-slate-600">Belum ada data luaran di kategori ini.</h3>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $outputs->withQueryString()->links() }}
        </div>
    </div>
@endsection
