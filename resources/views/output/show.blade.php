@extends('layouts.app')

@section('title', $output->title . ' | Pusat Studi STEM')

@section('content')
    <div class="bg-slate-100 py-4 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('output.index') }}" class="text-sm font-semibold text-[#800000] hover:text-[#5a0000] transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Luaran
            </a>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 sm:p-12">

            <span class="inline-block px-4 py-1 mb-6 rounded-full text-sm font-bold bg-red-50 text-[#800000] uppercase tracking-wider">
                Dokumen {{ $output->type }}
            </span>

            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-8">
                {{ $output->title }}
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10 p-6 bg-slate-50 rounded-xl">
                <div>
                    <span class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Penerbit / Penyelenggara</span>
                    <span class="text-slate-800 font-medium">{{ $output->issuer ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-1">Tanggal Rilis / Disahkan</span>
                    <span class="text-slate-800 font-medium">
                        {{ $output->date ? \Carbon\Carbon::parse($output->date)->translatedFormat('d F Y') : '-' }}
                    </span>
                </div>
            </div>

            <h2 class="text-xl font-bold text-slate-900 mb-4 border-b border-slate-100 pb-2">Deskripsi Abstrak</h2>
            <p class="text-slate-700 leading-relaxed mb-10 whitespace-pre-line">
                {{ $output->description ?? 'Deskripsi tidak tersedia.' }}
            </p>

            @if($output->url_link)
                <div class="border-t border-slate-100 pt-8 text-center">
                    <a href="{{ $output->url_link }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-[#800000] rounded-lg shadow-lg hover:bg-[#5a0000] transition transform hover:-translate-y-1">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-3"></i> Kunjungi Tautan Sumber Asli
                    </a>
                    <p class="text-xs text-slate-400 mt-3">Tautan ini akan membuka tab baru ke situs eksternal.</p>
                </div>
            @endif

        </div>
    </div>
@endsection
