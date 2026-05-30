@extends('layouts.admin')

@section('title', 'Kelola Data Tim | Admin STEM')
@section('header', 'Data Anggota Tim')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-base text-slate-500">Kelola profil dosen, peneliti, dan staf Pusat Studi STEM.</p>
        </div>

        <a href="{{ route('admin.team.create') }}"
            class="group relative inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white transition-all duration-200 bg-[#800000] border border-transparent rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000] hover:shadow-xl hover:shadow-red-900/40">
            <i class="fa-solid fa-plus mr-2 transform group-hover:rotate-90 transition duration-300"></i>
            Tambah Anggota
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr
                        class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="p-6 w-24 text-center">Foto</th>
                        <th class="p-6">Profil & Jabatan</th>
                        <th class="p-6">Kontak / Sosial</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 text-sm">
                    @forelse($teams as $member)
                        <tr class="hover:bg-slate-50/50 transition duration-200 group">
                            <td class="p-6 text-center">
                                <div
                                    class="w-14 h-14 rounded-full bg-slate-100 border-2 border-white shadow-sm flex items-center justify-center overflow-hidden mx-auto">
                                    @if ($member->image)
                                        <img src="{{ asset('storage/' . $member->image) }}" alt="Foto {{ $member->name }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <i class="fa-solid fa-user text-slate-300 text-xl"></i>
                                    @endif
                                </div>
                            </td>

                            <td class="p-6">
                                <span
                                    class="block font-bold text-slate-800 text-base group-hover:text-[#800000] transition">{{ $member->name }}</span>
                                <span
                                    class="inline-block mt-1 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-600 border border-amber-200/50">
                                    {{ $member->role }}
                                </span>
                            </td>

                            <td class="p-6 text-slate-500">
                                <div class="flex flex-col space-y-1.5 text-xs">
                                    @if ($member->email)
                                        <a href="mailto:{{ $member->email }}"
                                            class="flex items-center hover:text-[#800000] transition">
                                            <i class="fa-solid fa-envelope w-4"></i> {{ $member->email }}
                                        </a>
                                    @endif
                                    @if ($member->linkedin_url)
                                        <a href="{{ $member->linkedin_url }}" target="_blank"
                                            class="flex items-center hover:text-[#800000] transition">
                                            <i class="fa-brands fa-linkedin w-4"></i> Profil LinkedIn
                                        </a>
                                    @endif
                                    @if (!$member->email && !$member->linkedin_url)
                                        <span class="italic text-slate-400">Tidak ada kontak terlampir</span>
                                    @endif
                                </div>
                            </td>

                            <td class="p-6 text-center">
                                <div
                                    class="flex items-center justify-center space-x-2 opacity-70 group-hover:opacity-100 transition duration-300">
                                    <a href="{{ route('admin.team.edit', $member->id) }}"
                                        class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white"
                                        title="Edit">
                                        <i class="fa-solid fa-pen text-sm"></i>
                                    </a>

                                    <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST"
                                        class="inline-block" onsubmit="confirmDelete(event, this)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-9 h-9 rounded-full bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white"
                                            title="Hapus">
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
                                    <i class="fa-solid fa-users-slash text-5xl mb-4 text-slate-300"></i>
                                    <p class="text-base font-medium text-slate-500">Belum ada data anggota tim</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-slate-100 bg-slate-50/30">
            {{ $teams->links() }}
        </div>
    </div>
@endsection
