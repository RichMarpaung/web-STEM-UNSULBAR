@extends('layouts.admin')

@section('title', 'Kelola Slider Beranda | Admin STEM')
@section('header', 'Slider Beranda')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-base text-slate-500">Kelola gambar dan teks yang tampil bergantian di halaman utama.</p>
        </div>

        <a href="{{ route('admin.slider.create') }}" class="group relative inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white transition-all duration-200 bg-[#800000] border border-transparent rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000] hover:shadow-xl hover:shadow-red-900/40">
            <i class="fa-solid fa-plus mr-2 transform group-hover:rotate-90 transition duration-300"></i>
            Tambah Slider
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="p-6 w-48">Gambar</th>
                        <th class="p-6">Informasi Konten</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 text-sm">
                    @forelse($sliders as $slider)
                        <tr class="hover:bg-slate-50/50 transition duration-200 group">
                            <td class="p-6">
                                <div class="w-40 h-24 rounded-xl overflow-hidden shadow-sm border border-slate-100 relative">
                                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="p-6">
                                <span class="inline-block mb-2 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-600 border border-amber-200/50">
                                    {{ $slider->type }}
                                </span>
                                <span class="block font-bold text-slate-800 text-lg group-hover:text-[#800000] transition line-clamp-2">
                                    {{ $slider->title }}
                                </span>
                            </td>
                            <td class="p-6 text-center">
                                <div class="flex items-center justify-center space-x-2 opacity-70 group-hover:opacity-100 transition duration-300">
                                    <a href="{{ route('admin.slider.edit', $slider->id) }}" class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white" title="Edit">
                                        <i class="fa-solid fa-pen text-sm"></i>
                                    </a>
                                    <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" class="inline-block" onsubmit="confirmDelete(event, this)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-9 h-9 rounded-full bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-images text-5xl mb-4 text-slate-300"></i>
                                    <p class="text-base font-medium text-slate-500">Belum ada data slider</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-6 border-t border-slate-100 bg-slate-50/30">
            {{ $sliders->links() }}
        </div>
    </div>
@endsection
