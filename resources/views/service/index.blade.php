@extends('layouts.app')

@section('title', 'Pengabdian Masyarakat | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-900 py-16 border-b-4 border-[#800000]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-white mb-4">Pengabdian Masyarakat</h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">
                Hilirisasi teknologi dan keilmuan STEM untuk memberikan dampak langsung dan solusi nyata bagi masyarakat.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-slate-100 overflow-hidden flex flex-col">

                    <div class="h-48 bg-slate-200 relative">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400 bg-red-50">
                                <i class="fa-solid fa-people-carry-box text-5xl opacity-40 text-[#800000]"></i>
                            </div>
                        @endif
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2" title="{{ $service->title }}">
                            {{ $service->title }}
                        </h3>

                        <div class="mb-4 space-y-1">
                            <p class="text-xs text-slate-500 font-medium flex items-center">
                                <i class="fa-solid fa-location-dot w-4 text-[#800000]"></i> {{ $service->location }}
                            </p>
                            <p class="text-xs text-slate-500 font-medium flex items-center">
                                <i class="fa-solid fa-calendar-day w-4 text-[#800000]"></i>
                                {{ $service->date ? \Carbon\Carbon::parse($service->date)->translatedFormat('d F Y') : 'Waktu Belum Ditentukan' }}
                            </p>
                        </div>

                        <p class="text-slate-600 text-sm mb-6 flex-grow line-clamp-3">
                            {{ $service->description ?? 'Belum ada deskripsi.' }}
                        </p>

                        <div class="mt-auto pt-4 border-t border-slate-100">
                            <a href="{{ route('service.show', $service->slug) }}" class="text-[#800000] font-semibold text-sm hover:text-[#5a0000] transition inline-flex items-center">
                                Dokumentasi Kegiatan <i class="fa-solid fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 bg-white rounded-xl border border-dashed border-slate-300">
                    <h3 class="text-xl font-medium text-slate-600">Belum ada data pengabdian</h3>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $services->links() }}
        </div>
    </div>
@endsection
