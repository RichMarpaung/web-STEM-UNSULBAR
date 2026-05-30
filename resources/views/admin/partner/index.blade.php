@extends('layouts.admin')

@section('title', 'Kelola Data Kerja Sama | Admin STEM')
@section('header', 'Data Mitra Kerja Sama')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-base text-slate-500">Kelola daftar instansi, universitas, atau perusahaan yang menjadi mitra.</p>
        </div>
        
        <a href="{{ route('admin.partner.create') }}" class="group relative inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white transition-all duration-200 bg-[#800000] border border-transparent rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000] hover:shadow-xl hover:shadow-red-900/40">
            <i class="fa-solid fa-plus mr-2"></i> Tambah Mitra Baru
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="p-6 w-24 text-center">Logo</th>
                        <th class="p-6">Informasi Mitra</th>
                        <th class="p-6">Durasi MoU</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 text-sm">
                    @forelse($partners as $partner)
                        <tr class="hover:bg-slate-50/50 transition duration-200 group">
                            <td class="p-6 text-center">
                                <div class="w-16 h-16 rounded-xl bg-white border border-slate-100 shadow-sm flex items-center justify-center overflow-hidden mx-auto p-1.5">
                                    @if($partner->logo)
                                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="w-full h-full object-contain">
                                    @else
                                        <i class="fa-solid fa-building text-slate-300 text-2xl"></i>
                                    @endif
                                </div>
                            </td>

                            <td class="p-6">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="block font-bold text-slate-800 text-base group-hover:text-[#800000] transition">{{ $partner->name }}</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ $partner->type == 'mitra' ? 'bg-blue-50 text-blue-600 border border-blue-200' : 'bg-purple-50 text-purple-600 border border-purple-200' }}">
                                        {{ $partner->type }}
                                    </span>
                                </div>
                                @if($partner->website)
                                    <a href="{{ $partner->website }}" target="_blank" class="text-xs text-blue-500 hover:underline"><i class="fa-solid fa-link mr-1"></i> {{ $partner->website }}</a>
                                @endif
                            </td>
                            
                            <td class="p-6 text-slate-600">
                                @if($partner->start_date)
                                    {{ \Carbon\Carbon::parse($partner->start_date)->translatedFormat('M Y') }} 
                                    - 
                                    {{ $partner->end_date ? \Carbon\Carbon::parse($partner->end_date)->translatedFormat('M Y') : 'Sekarang' }}
                                @else
                                    <span class="text-slate-400 italic">Tidak ada data</span>
                                @endif
                            </td>
                            
                            <td class="p-6 text-center">
                                <div class="flex items-center justify-center space-x-2 opacity-70 group-hover:opacity-100 transition duration-300">
                                    <a href="{{ route('admin.partner.edit', $partner->slug) }}" class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white" title="Edit">
                                        <i class="fa-solid fa-pen text-sm"></i>
                                    </a>
                                    
                                   <form action="{{ route('admin.partner.destroy', $partner->slug) }}" method="POST" class="inline-block" onsubmit="confirmDelete(event, this)">     @csrf
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
                            <td colspan="4" class="p-12 text-center text-slate-500">Belum ada data mitra kerja sama.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection