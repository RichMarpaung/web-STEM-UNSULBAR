@extends('layouts.admin')

@section('title', 'Kelola Program Kerja | Admin STEM')
@section('header', 'Data Program Kerja')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-base text-slate-500">Kelola daftar agenda dan program kerja Pusat Studi STEM.</p>
        </div>
        <a href="{{ route('admin.work_program.create') }}" class="group inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white transition-all bg-[#800000] rounded-full shadow-lg hover:bg-[#6a0000]">
            <i class="fa-solid fa-plus mr-2 transform group-hover:rotate-90 transition duration-300"></i> Tambah Program
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="p-6">Nama Kegiatan</th>
                        <th class="p-6">Lokasi</th>
                        <th class="p-6">Anggota Terlibat</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 text-sm">
                    @forelse($programs as $program)
                        <tr class="hover:bg-slate-50/50 transition duration-200 group">
                            <td class="p-6">
                                <span class="block font-bold text-slate-800 text-base mb-1 line-clamp-1 group-hover:text-[#800000] transition">{{ $program->name }}</span>
                                <div class="flex items-center text-xs text-slate-400 font-medium">
                                    <i class="fa-regular fa-calendar mr-1.5"></i>
                                    {{ \Carbon\Carbon::parse($program->date)->translatedFormat('d M Y') }}
                                </div>
                            </td>

                            <td class="p-6 text-slate-600 font-semibold">
                                <i class="fa-solid fa-location-dot text-[#800000] mr-1.5"></i> {{ $program->location }}
                            </td>

                            <td class="p-6">
                                @if($program->teams->count() > 0)
                                    <div class="flex -space-x-2 overflow-hidden">
                                        @foreach($program->teams->take(3) as $team)
                                            @if($team->image)
                                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="{{ asset('storage/' . $team->image) }}" title="{{ $team->name }}">
                                            @else
                                                <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-white bg-slate-200 text-slate-600 items-center justify-center text-[10px] font-bold shadow-sm" title="{{ $team->name }}">
                                                    {{ strtoupper(substr($team->name, 0, 2)) }}
                                                </div>
                                            @endif
                                        @endforeach
                                        @if($program->teams->count() > 3)
                                            <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-white bg-red-50 text-[#800000] items-center justify-center text-[10px] font-bold shadow-sm">+{{ $program->teams->count() - 3 }}</div>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-xs text-slate-400 italic bg-slate-50 px-2 py-1 rounded-md border border-slate-100">Belum diatur</span>
                                @endif
                            </td>

                            <td class="p-6 text-center">
                                <div class="flex items-center justify-center space-x-2 opacity-70 group-hover:opacity-100 transition duration-300">
                                    <button type="button" onclick="openProgramModal({{ $program->id }})" class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition duration-200"><i class="fa-solid fa-eye text-sm"></i></button>
                                    <a href="{{ route('admin.work_program.edit', $program->id) }}" class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white flex items-center justify-center transition duration-200"><i class="fa-solid fa-pen text-sm"></i></a>
                                    <form action="{{ route('admin.work_program.destroy', $program->id) }}" method="POST" class="inline-block" onsubmit="confirmDelete(event, this)">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-9 h-9 rounded-full bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition duration-200"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div id="program-modal-{{ $program->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity bg-slate-900/60 backdrop-blur-sm" onclick="closeProgramModal({{ $program->id }})"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                                <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-slate-100">
                                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                                        <h3 class="font-bold text-slate-700 uppercase tracking-wider text-xs"><i class="fa-solid fa-briefcase text-[#800000] mr-2"></i> Rincian Program</h3>
                                        <button type="button" class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 hover:text-slate-600 flex items-center justify-center" onclick="closeProgramModal({{ $program->id }})"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                    <div class="p-8 space-y-6 max-h-[70vh] overflow-y-auto">
                                        @if($program->image)
                                            <div class="w-full h-56 rounded-2xl overflow-hidden shadow-inner border border-slate-100 bg-slate-50 mb-4">
                                                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->name }}" class="w-full h-full object-cover">
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Nama Kegiatan</h4>
                                            <h3 class="text-xl font-extrabold text-slate-900 leading-tight">{{ $program->name }}</h3>
                                        </div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                            <div>
                                                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Lokasi</h4>
                                                <p class="text-sm font-bold text-slate-800 mt-1"><i class="fa-solid fa-location-dot text-[#800000] mr-2"></i> {{ $program->location }}</p>
                                            </div>
                                            <div>
                                                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Waktu Pelaksanaan</h4>
                                                <p class="text-sm font-bold text-slate-600 mt-1"><i class="fa-regular fa-calendar-days text-[#800000] mr-2"></i> {{ \Carbon\Carbon::parse($program->date)->translatedFormat('d F Y') }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Deskripsi Kegiatan</h4>
                                            <p class="text-sm text-slate-600 leading-relaxed font-light whitespace-pre-line bg-slate-50/30 p-5 rounded-2xl border border-slate-100/50">{{ $program->description ?? 'Deskripsi belum diinput.' }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Anggota Terlibat</h4>
                                            @if($program->teams->count() > 0)
                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                    @foreach($program->teams as $t)
                                                        <div class="flex items-center p-3 bg-slate-50 border border-slate-100 rounded-xl shadow-sm">
                                                            @if($t->image)
                                                                <img src="{{ asset('storage/' . $t->image) }}" class="w-10 h-10 rounded-full object-cover mr-3 flex-shrink-0">
                                                            @else
                                                                <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center font-bold text-xs mr-3 flex-shrink-0">{{ strtoupper(substr($t->name, 0, 2)) }}</div>
                                                            @endif
                                                            <div class="min-w-0">
                                                                <p class="text-sm font-bold text-slate-800 truncate">{{ $t->name }}</p>
                                                                <p class="text-[11px] text-slate-400 truncate">{{ $t->role }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <i class="fa-regular fa-folder-open text-4xl mb-4"></i>
                                    <p class="font-bold">Belum ada Program Kerja</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-6 border-t border-slate-100 bg-slate-50/30">{{ $programs->links() }}</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openProgramModal(id) { document.getElementById('program-modal-' + id).classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
        function closeProgramModal(id) { document.getElementById('program-modal-' + id).classList.add('hidden'); document.body.style.overflow = 'auto'; }
        function confirmDelete(event, form) {
            event.preventDefault();
            Swal.fire({
                title: 'Hapus Program Kerja?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#800000', cancelButtonColor: '#94a3b8', confirmButtonText: 'Ya, Hapus!'
            }).then((result) => { if (result.isConfirmed) form.submit(); })
        }
    </script>
@endsection
