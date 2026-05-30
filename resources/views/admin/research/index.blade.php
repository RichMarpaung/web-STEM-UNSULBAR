@extends('layouts.admin')

@section('title', 'Kelola Data Penelitian | Admin STEM')
@section('header', 'Data Penelitian')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-base text-slate-500">Kelola semua data penelitian dan inovasi Pusat Studi STEM.</p>
        </div>

        <a href="{{ route('admin.research.create') }}" class="group relative inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white transition-all duration-200 bg-[#800000] border border-transparent rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000] hover:shadow-xl hover:shadow-red-900/40 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#800000]">
            <i class="fa-solid fa-plus mr-2 transform group-hover:rotate-90 transition duration-300"></i>
            Tambah Penelitian
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="p-6">Informasi Penelitian</th>
                        <th class="p-6">Ketua Peneliti</th>
                        <th class="p-6 text-center">Status</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 text-sm">
                    @forelse($researches as $research)
                        <tr class="hover:bg-slate-50/50 transition duration-200 group">
                            <td class="p-6">
                                <span class="block font-bold text-slate-800 text-base mb-1 line-clamp-1 group-hover:text-[#800000] transition">{{ $research->title }}</span>
                                <div class="flex items-center text-xs text-slate-400 font-medium">
                                    <i class="fa-regular fa-calendar mr-1.5"></i>
                                    {{ \Carbon\Carbon::parse($research->start_date)->translatedFormat('d M Y') }}
                                </div>
                            </td>

                            <td class="p-6">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center mr-3 font-bold text-xs">
                                        {{ substr($research->leader_name, 0, 1) }}
                                    </div>
                                    <span class="text-slate-700 font-semibold">{{ $research->leader_name }}</span>
                                </div>
                            </td>

                            <td class="p-6 text-center">
                                @if($research->status == 'ongoing')
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-600 border border-amber-200/50">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-2 animate-pulse"></span> Berjalan
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-600 border border-emerald-200/50">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2"></span> Selesai
                                    </span>
                                @endif
                            </td>

                            <td class="p-6 text-center">
                                <div class="flex items-center justify-center space-x-2 opacity-70 group-hover:opacity-100 transition duration-300">
                                    <a href="{{ route('research.show', $research->slug) }}" target="_blank" class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200" title="Lihat Publik">
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </a>

                                    <a href="{{ route('admin.research.edit', $research->slug) }}" class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white hover:shadow-lg hover:shadow-amber-500/30 transition-all duration-200" title="Edit">
                                        <i class="fa-solid fa-pen text-sm"></i>
                                    </a>

                                    <form action="{{ route('admin.research.destroy', $research->slug) }}" method="POST" class="inline-block" onsubmit="confirmDelete(event, this)">    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-9 h-9 rounded-full bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white hover:shadow-lg hover:shadow-red-500/30 transition-all duration-200" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <i class="fa-regular fa-folder-open text-5xl mb-4 text-slate-300"></i>
                                    <p class="text-base font-medium text-slate-500">Belum ada data penelitian</p>
                                    <p class="text-sm mt-1">Data yang Anda tambahkan akan muncul di sini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100 bg-slate-50/30">
            {{ $researches->links() }}
        </div>
    </div>
@endsection
