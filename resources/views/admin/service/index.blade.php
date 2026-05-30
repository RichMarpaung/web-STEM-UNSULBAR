@extends('layouts.admin')

@section('title', 'Kelola Data Pengabdian | Admin STEM')
@section('header', 'Data Pengabdian Masyarakat')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <p class="text-base text-slate-500">Kelola berkas pelaksanaan hilirisasi riset dan pengabdian masyarakat.</p>
        </div>
        <a href="{{ route('admin.service.create') }}" class="group inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white transition-all bg-[#800000] rounded-full shadow-lg shadow-red-900/30 hover:bg-[#6a0000]">
            <i class="fa-solid fa-plus mr-2 transform group-hover:rotate-90 transition duration-300"></i> Tambah Pengabdian
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                        <th class="p-6">Informasi Kegiatan</th>
                        <th class="p-6">Lokasi</th>
                        <th class="p-6">Tim Pelaksana</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 text-sm">
                    @forelse($services as $service)
                        <tr class="hover:bg-slate-50/50 transition duration-200 group">
                            <td class="p-6">
                                <span class="block font-bold text-slate-800 text-base mb-1 line-clamp-1 group-hover:text-[#800000] transition">{{ $service->title }}</span>
                                <div class="flex items-center text-xs text-slate-400 font-medium">
                                    <i class="fa-regular fa-calendar mr-1.5"></i>
                                    {{ $service->date ? \Carbon\Carbon::parse($service->date)->translatedFormat('d M Y') : '-' }}
                                </div>
                            </td>

                            <td class="p-6 text-slate-600 font-semibold">
                                <i class="fa-solid fa-location-dot text-[#800000] mr-1.5"></i> {{ $service->location }}
                            </td>

                            <td class="p-6">
                                @if($service->teams->count() > 0)
                                    <div class="flex -space-x-2 overflow-hidden" title="Total {{ $service->teams->count() }} Personil">
                                        @foreach($service->teams->take(3) as $team)
                                            @if($team->image)
                                                <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="{{ asset('storage/' . $team->image) }}" title="{{ $team->name }}">
                                            @else
                                                <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-white bg-slate-200 text-slate-600 items-center justify-center text-[10px] font-bold shadow-sm" title="{{ $team->name }}">
                                                    {{ strtoupper(substr($team->name, 0, 2)) }}
                                                </div>
                                            @endif
                                        @endforeach
                                        @if($service->teams->count() > 3)
                                            <div class="inline-flex h-8 w-8 rounded-full ring-2 ring-white bg-red-50 text-[#800000] items-center justify-center text-[10px] font-bold shadow-sm">+{{ $service->teams->count() - 3 }}</div>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-xs text-slate-400 italic bg-slate-50 px-2 py-1 rounded-md border border-slate-100">Belum diatur</span>
                                @endif
                            </td>

                            <td class="p-6 text-center">
                                <div class="flex items-center justify-center space-x-2 opacity-70 group-hover:opacity-100 transition duration-300">
                                    <button type="button" onclick="openServiceModal({{ $service->id }})" class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition duration-200"><i class="fa-solid fa-eye text-sm"></i></button>
                                    <a href="{{ route('admin.service.edit', $service->slug) }}" class="w-9 h-9 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white transition duration-200"><i class="fa-solid fa-pen text-sm"></i></a>
                                    <form action="{{ route('admin.service.destroy', $service->slug) }}" method="POST" class="inline-block" onsubmit="confirmDelete(event, this)">@csrf @method('DELETE')
                                        <button type="submit" class="w-9 h-9 rounded-full bg-red-50 text-red-600 flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-200"><i class="fa-solid fa-trash-can text-sm"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <div id="service-modal-{{ $service->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto">
                            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                <div class="fixed inset-0 transition-opacity bg-slate-900/60 backdrop-blur-sm" onclick="closeServiceModal({{ $service->id }})"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                                <div class="inline-block align-bottom bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-slate-100">
                                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                                        <h3 class="font-bold text-slate-700 uppercase tracking-wider text-xs flex items-center"><i class="fa-solid fa-handshake-angle text-[#800000] mr-2"></i> Rincian Pengabdian</h3>
                                        <button type="button" class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 hover:text-slate-600 flex items-center justify-center" onclick="closeServiceModal({{ $service->id }})"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                    <div class="p-8 space-y-6 max-h-[70vh] overflow-y-auto">
                                        @if($service->image)
                                            <div class="w-full h-56 rounded-2xl overflow-hidden shadow-inner border border-slate-100 bg-slate-50 mb-4">
                                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Nama Kegiatan</h4>
                                            <h3 class="text-xl font-extrabold text-slate-900 leading-tight">{{ $service->title }}</h3>
                                        </div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                            <div>
                                                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Lokasi Lapangan</h4>
                                                <p class="text-sm font-bold text-slate-800 flex items-center mt-1"><i class="fa-solid fa-location-dot text-[#800000] mr-2"></i> {{ $service->location }}</p>
                                            </div>
                                            <div>
                                                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Waktu Kegiatan</h4>
                                                <p class="text-sm font-bold text-slate-600 flex items-center mt-1"><i class="fa-regular fa-calendar-days text-[#800000] mr-2"></i> {{ $service->date ? \Carbon\Carbon::parse($service->date)->translatedFormat('d F Y') : '-' }}</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Deskripsi Pelaksanaan</h4>
                                            <p class="text-sm text-slate-600 leading-relaxed font-light whitespace-pre-line bg-slate-50/30 p-5 rounded-2xl border border-slate-100/50">{{ $service->description ?? 'Deskripsi belum diinput.' }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Seluruh Tim Lapangan Terlibat</h4>
                                            @if($service->teams->count() > 0)
                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                    @foreach($service->teams as $t)
                                                        <div class="flex items-center p-3 bg-slate-50 border border-slate-100 rounded-xl shadow-sm">
                                                            @if($t->image)
                                                                <img src="{{ asset('storage/' . $t->image) }}" alt="{{ $t->name }}" class="w-10 h-10 rounded-full object-cover mr-3 flex-shrink-0">
                                                            @else
                                                                <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center font-bold text-xs mr-3 flex-shrink-0 shadow-inner">{{ strtoupper(substr($t->name, 0, 2)) }}</div>
                                                            @endif
                                                            <div class="min-w-0">
                                                                <p class="text-sm font-bold text-slate-800 truncate leading-tight">{{ $t->name }}</p>
                                                                <p class="text-[11px] text-slate-400 truncate mt-0.5 font-medium">{{ $t->role }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <span class="text-xs text-slate-400 italic bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-100 inline-block">Belum ada tim terdaftar.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="p-6 border-t border-slate-100 bg-slate-50/50 flex justify-end">
                                        <button type="button" class="px-6 py-2.5 bg-slate-200 text-slate-700 font-bold text-sm rounded-full hover:bg-slate-300 transition-colors shadow-sm" onclick="closeServiceModal({{ $service->id }})">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
  @empty
        <tr>
            <td colspan="4" class="p-6 text-center text-slate-500">
                Data pengabdian belum tersedia.
            </td>
        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-6 border-t border-slate-100 bg-slate-50/30">{{ $services->links() }}</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openServiceModal(id) { document.getElementById('service-modal-' + id).classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
        function closeServiceModal(id) { document.getElementById('service-modal-' + id).classList.add('hidden'); document.body.style.overflow = 'auto'; }
        function confirmDelete(event, form) {
            event.preventDefault();
            Swal.fire({
                title: 'Hapus Agenda Pengabdian?',
                text: "Berkas dokumentasi dan catatan keterlibatan tim akan dibersihkan permanen!",
                icon: 'warning', showCancelButton: true, confirmButtonColor: '#800000', cancelButtonColor: '#94a3b8', confirmButtonText: 'Ya, Hapus!', cancelButtonText: 'Batal',
                customClass: { popup: 'rounded-3xl border border-slate-100' }
            }).then((result) => { if (result.isConfirmed) { form.submit(); } })
        }
    </script>
@endsection
