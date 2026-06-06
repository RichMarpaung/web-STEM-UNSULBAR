@extends('layouts.app')

@section('title', 'Katalog Program Kerja | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-900 py-16 sm:py-20 border-b-[6px] border-[#800000] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-white/10 text-amber-400 text-xs font-bold tracking-widest border border-white/20 mb-4 uppercase">
                Agenda Pusat Studi
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white mb-4 tracking-tight">
                Katalog Program Kerja
            </h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Jelajahi berbagai agenda, kegiatan rutin, dan program kerja strategis yang diselenggarakan oleh Pusat Studi STEM.
            </p>
        </div>
    </div>

    <div class="bg-slate-50 py-12 sm:py-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programs as $program)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 group flex flex-col h-full transform hover:-translate-y-1">

                        <a href="{{ route('work_program.show', $program->slug) }}" class="block relative h-56 overflow-hidden bg-slate-100">
                            @if($program->image)
                                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-briefcase text-5xl opacity-50"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                <span class="bg-white/90 backdrop-blur text-[#800000] text-[10px] font-black px-3 py-1.5 rounded-full shadow-sm uppercase tracking-wider flex items-center">
                                    <i class="fa-regular fa-calendar mr-1.5"></i> {{ \Carbon\Carbon::parse($program->date)->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </a>

                        <div class="p-6 flex flex-col flex-grow">
                            <h2 class="text-xl font-bold text-slate-900 leading-snug mb-3 group-hover:text-[#800000] transition-colors line-clamp-2">
                                <a href="{{ route('work_program.show', $program->slug) }}">
                                    {{ $program->name }}
                                </a>
                            </h2>

                            <p class="text-sm text-slate-500 mb-4 flex items-start font-medium">
                                <i class="fa-solid fa-location-dot mt-1 text-[#800000] mr-2"></i>
                                <span class="line-clamp-1">{{ $program->location }}</span>
                            </p>

                            <p class="text-sm text-slate-600 line-clamp-3 mb-6 flex-grow font-light">
                                {{ $program->description ?? 'Deskripsi kegiatan belum tersedia.' }}
                            </p>

                            <a href="{{ route('work_program.show', $program->slug) }}" class="inline-flex items-center text-sm font-bold text-[#800000] hover:text-[#5a0000] transition-colors mt-auto group/btn">
                                Rincian Program <i class="fa-solid fa-arrow-right-long ml-2 transform group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-slate-100 text-slate-300 mb-6">
                            <i class="fa-solid fa-folder-open text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-700 mb-2">Belum Ada Program Kerja</h3>
                        <p class="text-slate-500 max-w-md mx-auto">Data program kerja saat ini masih kosong. Silakan periksa kembali nanti untuk melihat pembaruan agenda kami.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $programs->links() }}
            </div>
        </div>
    </div>
@endsection
