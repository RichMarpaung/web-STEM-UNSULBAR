@extends('layouts.app')

@section('title', 'Penelitian | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-900 py-16 border-b-4 border-[#800000]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white mb-4">Katalog Penelitian</h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">
                Eksplorasi berbagai inovasi dan riset interdisipliner yang dikembangkan oleh tim peneliti Pusat Studi STEM.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($researches as $research)
                <div
                    class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100 overflow-hidden flex flex-col">

                    <div class="h-48 bg-slate-200 relative">
                        @if ($research->image)
                            <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400">
                                <i class="fa-solid fa-flask text-5xl opacity-50"></i>
                            </div>
                        @endif

                        <div class="absolute top-4 right-4">
                            @if ($research->status == 'ongoing')
                                <span
                                    class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                    Sedang Berjalan
                                </span>
                            @else
                                <span
                                    class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                    Selesai
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-slate-900 mb-2 line-clamp-2" title="{{ $research->title }}">
                            {{ $research->title }}
                        </h3>
                        <p class="text-sm text-slate-500 mb-4 font-medium">
                            <i class="fa-solid fa-user-tie mr-1"></i> Ketua: {{ $research->leader_name }}
                        </p>
                        <p class="text-slate-600 text-sm mb-6 flex-grow line-clamp-3">
                            {{ $research->abstract ?? 'Belum ada deskripsi untuk penelitian ini.' }}
                        </p>

                        <div class="mt-auto pt-4 border-t border-slate-100">
                            <a href="{{ route('research.show', $research->slug) }}" class="text-[#800000] font-semibold text-sm hover:text-[#5a0000] transition inline-flex items-center">
    Baca Selengkapnya <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
</a>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-xl border border-dashed border-slate-300">
                    <i class="fa-solid fa-folder-open text-5xl text-slate-300 mb-4"></i>
                    <h3 class="text-xl font-medium text-slate-600">Belum ada data penelitian</h3>
                    <p class="text-slate-400 mt-2">Data penelitian akan muncul di sini setelah ditambahkan ke sistem.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $researches->links() }}
        </div>
    </div>
@endsection
