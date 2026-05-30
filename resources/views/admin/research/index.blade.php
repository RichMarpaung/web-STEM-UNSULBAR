@extends('layouts.admin')

@section('title', 'Kelola Data Penelitian | Admin STEM')
@section('header', 'Data Penelitian')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

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
                        <th class="p-6">Anggota Tim</th>
                        <th class="p-6 text-center">Status</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 text-sm">
                    @forelse($researches as $research)
                        <tr class="hover:bg-slate-50/50 transition duration-200 group">

                            <td class="p-6">
                                <span class="block font-bold text-slate-800 text-base mb-1 line-clamp-1 group-hover:text-[#800000] transition" title="{{ $research->title }}">{{ $research->title }}</span>
                                <div class="flex items-center text-xs text-slate-400 font-medium">
                                    <i class="fa-regular fa-calendar mr-1.5"></i>
                                    {{ $research->start_date ? \Carbon\Carbon::parse($research->start_date)->translatedFormat('d M Y') : 'Waktu belum diatur' }}
                                </div>
                            </td>

                            <td class="p-6">
                                <div class="flex items-center">
                                    @php
                                        // Trik mencari data anggota tim yang namanya sama dengan leader_name
                                        $leaderData = \App\Models\Team::where('name', $research->leader_name)->first();
                                    @endphp

                                    @if($leaderData && $leaderData->image)
                                        <img src="{{ asset('storage/' . $leaderData->image) }}" alt="{{ $research->leader_name }}" class="w-8 h-8 rounded-full object-cover border border-slate-200 shadow-sm mr-3">
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-red-50 border border-red-100 text-[#800000] flex items-center justify-center mr-3 font-bold text-xs shadow-sm">
                                            {{ strtoupper(substr($research->leader_name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <span class="text-slate-700 font-semibold">{{ $research->leader_name }}</span>
                                </div>
                            </td>

                            <td class="p-6">
                                @if($research->teams->count() > 0)
                                    <div class="flex -space-x-2 overflow-hidden" title="Total {{ $research->teams->count() }} Anggota">
                                        @foreach($research->teams->take(3) as $team)
                                            @if($team->image)
                                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover cursor-help" src="{{ asset('storage/' . $team->image) }}" title="{{ $team->name }} ({{ $team->role }})">
                                            @else
                                                <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-white bg-slate-200 text-slate-600 items-center justify-center text-[10px] font-bold shadow-sm cursor-help" title="{{ $team->name }} ({{ $team->role }})">
                                                    {{ strtoupper(substr($team->name, 0, 2)) }}
                                                </div>
                                            @endif
                                        @endforeach

                                        @if($research->teams->count() > 3)
                                            <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-white bg-red-50 text-[#800000] items-center justify-center text-[10px] font-bold shadow-sm">
                                                +{{ $research->teams->count() - 3 }}
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-xs text-slate-400 italic bg-slate-50 px-2 py-1 rounded-md border border-slate-100">Hanya Ketua</span>
                                @endif
                            </td>

                            <td class="p-6 text-center">
                                @if($research->status == 'ongoing')
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-600 border border-amber-200/50 shadow-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-2 animate-pulse"></span> Berjalan
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-600 border border-emerald-200/50 shadow-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2"></span> Selesai
                                    </span>
                                @endif
                            </td>

                            <td class="p-6 text-center">
                                <div class="flex items-center justify-center space-x-2 opacity-70 group-hover:opacity-100 transition duration-300">
                                    <button type="button" onclick="openResearchModal({{ $research->id }})" class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-200" title="Lihat Detail">
                                        <i class="fa-solid fa-eye text-sm"></i>
                                    </button>

                                    <a href="{{ route('admin.research.edit', $research->slug) }}" class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white hover:shadow-lg hover:shadow-amber-500/30 transition-all duration-200" title="Edit">
                                        <i class="fa-solid fa-pen text-sm"></i>
                                    </a>

                                    <form action="{{ route('admin.research.destroy', $research->slug) }}" method="POST" class="inline-block" onsubmit="confirmDelete(event, this)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-9 h-9 rounded-full bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white hover:shadow-lg hover:shadow-red-500/30 transition-all duration-200" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div id="research-modal-{{ $research->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity bg-slate-900/60 backdrop-blur-sm" onclick="closeResearchModal({{ $research->id }})"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-slate-100">

                                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                                        <span class="text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider {{ $research->status == 'ongoing' ? 'bg-amber-50 text-amber-600 border border-amber-200/50' : 'bg-emerald-50 text-emerald-600 border border-emerald-200/50' }}">
                                            {{ $research->status == 'ongoing' ? 'Berjalan' : 'Selesai' }}
                                        </span>
                                        <button type="button" class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 hover:text-slate-600 transition flex items-center justify-center" onclick="closeResearchModal({{ $research->id }})">
                                            <i class="fa-solid fa-xmark text-base"></i>
                                        </button>
                                    </div>

                                    <div class="p-8 space-y-6 max-h-[70vh] overflow-y-auto">
                                        @if($research->image)
                                            <div class="w-full h-56 rounded-2xl overflow-hidden shadow-inner border border-slate-100 bg-slate-50 mb-4">
                                                <img src="{{ asset('storage/' . $research->image) }}" alt="{{ $research->title }}" class="w-full h-full object-cover">
                                            </div>
                                        @endif

                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Judul Penelitian</h4>
                                            <h3 class="text-xl font-extrabold text-slate-900 leading-tight">{{ $research->title }}</h3>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                            <div>
                                                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Ketua Peneliti</h4>
                                                <div class="flex items-center mt-1">
                                                    @if($leaderData && $leaderData->image)
                                                        <img src="{{ asset('storage/' . $leaderData->image) }}" alt="{{ $research->leader_name }}" class="w-10 h-10 rounded-full object-cover border border-slate-200 shadow-sm mr-3 flex-shrink-0">
                                                    @else
                                                        <div class="w-10 h-10 rounded-full bg-red-100 border border-red-200 text-[#800000] flex items-center justify-center mr-3 font-bold text-sm shadow-sm flex-shrink-0">
                                                            {{ strtoupper(substr($research->leader_name, 0, 1)) }}
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <p class="text-sm font-bold text-slate-800 leading-tight">{{ $research->leader_name }}</p>
                                                        <p class="text-[11px] text-slate-400 mt-0.5 font-medium">Penanggung Jawab Utama</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Waktu Pelaksanaan</h4>
                                                <p class="text-xs font-bold text-slate-600 flex items-center mt-2.5">
                                                    <i class="fa-regular fa-calendar-days text-[#800000] mr-2.5 text-base"></i>
                                                    {{ $research->start_date ? \Carbon\Carbon::parse($research->start_date)->translatedFormat('d M Y') : '-' }}
                                                    <span class="mx-1 font-normal text-slate-400">s/d</span>
                                                    {{ $research->end_date ? \Carbon\Carbon::parse($research->end_date)->translatedFormat('d M Y') : 'Sekarang' }}
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Abstrak / Deskripsi Singkat</h4>
                                            <p class="text-sm text-slate-600 leading-relaxed font-light whitespace-pre-line bg-slate-50/30 p-5 rounded-2xl border border-slate-100/50">
                                                {{ $research->abstract ?? 'Abstrak atau deskripsi penelitian belum ditambahkan ke dalam sistem.' }}
                                            </p>
                                        </div>

                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Seluruh Anggota Tim Terlibat</h4>
                                            @if($research->teams->count() > 0)
                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                    @foreach($research->teams as $t)
                                                        <div class="flex items-center p-3 bg-slate-50 border border-slate-100 rounded-xl shadow-sm">
                                                            @if($t->image)
                                                                <img src="{{ asset('storage/' . $t->image) }}" alt="{{ $t->name }}" class="w-10 h-10 rounded-full object-cover border border-slate-200 flex-shrink-0 mr-3">
                                                            @else
                                                                <div class="w-10 h-10 rounded-full bg-slate-200 border border-slate-300 text-slate-600 flex items-center justify-center font-bold text-xs flex-shrink-0 mr-3 shadow-inner">
                                                                    {{ strtoupper(substr($t->name, 0, 2)) }}
                                                                </div>
                                                            @endif
                                                            <div class="min-w-0">
                                                                <p class="text-sm font-bold text-slate-800 truncate leading-tight">{{ $t->name }}</p>
                                                                <p class="text-[11px] text-slate-400 truncate mt-0.5 font-medium">{{ $t->role }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-xs text-slate-400 italic bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-100 inline-block">Hanya dijalankan oleh Ketua Penelitian</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="p-6 border-t border-slate-100 bg-slate-50/50 flex justify-end">
                                        <button type="button" class="px-6 py-2.5 bg-slate-200 text-slate-700 font-bold text-sm rounded-full hover:bg-slate-300 transition-colors shadow-sm" onclick="closeResearchModal({{ $research->id }})">
                                            Tutup Rincian
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4 border border-slate-100">
                                        <i class="fa-regular fa-folder-open text-4xl text-slate-300"></i>
                                    </div>
                                    <p class="text-base font-bold text-slate-600">Belum ada data penelitian</p>
                                    <p class="text-sm mt-1">Data yang Anda tambahkan akan otomatis muncul di sini.</p>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openResearchModal(id) {
            document.getElementById('research-modal-' + id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeResearchModal(id) {
            document.getElementById('research-modal-' + id).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function confirmDelete(event, form) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data penelitian yang dihapus tidak dapat dikembalikan beserta gambar dan relasinya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#800000',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-3xl shadow-xl border border-slate-100',
                    title: 'text-xl font-bold text-slate-800',
                    content: 'text-sm text-slate-500',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
@endsection
