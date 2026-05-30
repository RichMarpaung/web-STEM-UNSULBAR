@extends('layouts.admin')

@section('title', 'Kelola Data Luaran | Admin STEM')
@section('header', 'Data Luaran & Publikasi')

@section('content')
    <div class="mb-6 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-base text-slate-500">Kelola publikasi jurnal, Hak Kekayaan Intelektual (HKI), dan penghargaan.</p>
        </div>

        <a href="{{ route('admin.output.create') }}" class="group relative inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white transition-all duration-200 bg-[#800000] border border-transparent rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000] hover:shadow-xl hover:shadow-red-900/40 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#800000]">
            <i class="fa-solid fa-plus mr-2 transform group-hover:rotate-90 transition duration-300"></i>
            Tambah Luaran
        </a>
    </div>

    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('admin.output.index') }}" class="px-4 py-2 rounded-full text-sm font-medium transition {{ !request()->has('type') ? 'bg-slate-800 text-white shadow-md' : 'bg-white text-slate-500 hover:bg-slate-100 border border-slate-200' }}">Semua Data</a>

        <a href="{{ route('admin.output.index', ['type' => 'jurnal']) }}" class="px-4 py-2 rounded-full text-sm font-medium transition {{ request('type') == 'jurnal' ? 'bg-indigo-600 text-white shadow-md' : 'bg-white text-slate-500 hover:bg-slate-100 border border-slate-200' }}">Jurnal Ilmiah</a>

        <a href="{{ route('admin.output.index', ['type' => 'hki']) }}" class="px-4 py-2 rounded-full text-sm font-medium transition {{ request('type') == 'hki' ? 'bg-amber-500 text-white shadow-md' : 'bg-white text-slate-500 hover:bg-slate-100 border border-slate-200' }}">HKI / Paten</a>

        <a href="{{ route('admin.output.index', ['type' => 'penghargaan']) }}" class="px-4 py-2 rounded-full text-sm font-medium transition {{ request('type') == 'penghargaan' ? 'bg-emerald-500 text-white shadow-md' : 'bg-white text-slate-500 hover:bg-slate-100 border border-slate-200' }}">Penghargaan</a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="p-6">Informasi Luaran</th>
                        <th class="p-6">Penerbit / Penyelenggara</th>
                        <th class="p-6 text-center">Jenis</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 text-sm">
                    @forelse($outputs as $output)
                        <tr class="hover:bg-slate-50/50 transition duration-200 group">
                            <td class="p-6">
                                <span class="block font-bold text-slate-800 text-base mb-1 line-clamp-2 group-hover:text-[#800000] transition">{{ $output->title }}</span>
                                <div class="flex items-center text-xs text-slate-400 font-medium mt-1">
                                    <i class="fa-regular fa-calendar mr-1.5"></i>
                                    {{ $output->date ? \Carbon\Carbon::parse($output->date)->translatedFormat('F Y') : 'Waktu tidak ditentukan' }}
                                </div>
                            </td>

                            <td class="p-6 text-slate-600 font-medium">
                                {{ $output->issuer ?: '-' }}
                            </td>

                            <td class="p-6 text-center">
                                @if($output->type == 'jurnal')
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-indigo-50 text-indigo-600 border border-indigo-200/50">
                                        <i class="fa-solid fa-book-open mr-1.5"></i> Jurnal
                                    </span>
                                @elseif($output->type == 'hki')
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-600 border border-amber-200/50">
                                        <i class="fa-solid fa-lightbulb mr-1.5"></i> HKI
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-600 border border-emerald-200/50">
                                        <i class="fa-solid fa-trophy mr-1.5"></i> Award
                                    </span>
                                @endif
                            </td>

                            <td class="p-6 text-center">
                                <div class="flex items-center justify-center space-x-2 opacity-70 group-hover:opacity-100 transition duration-300">
                                    <a href="{{ route('output.show', $output->slug) }}" target="_blank" class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200" title="Lihat Publik">
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </a>

                                    <a href="{{ route('admin.output.edit', $output->slug) }}" class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white hover:shadow-lg hover:shadow-amber-500/30 transition-all duration-200" title="Edit">
                                        <i class="fa-solid fa-pen text-sm"></i>
                                    </a>

                                    <form action="{{ route('admin.output.destroy', $output->slug) }}" method="POST" class="inline-block" onsubmit="confirmDelete(event, this)">    @csrf
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
                                    <i class="fa-solid fa-file-export text-5xl mb-4 text-slate-300"></i>
                                    <p class="text-base font-medium text-slate-500">Belum ada data luaran/publikasi</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100 bg-slate-50/30">
            {{ $outputs->withQueryString()->links() }}
        </div>
    </div>
@endsection
