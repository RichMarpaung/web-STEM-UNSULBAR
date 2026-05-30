@extends('layouts.admin')

@section('title', 'Dashboard Utama | Admin STEM')
@section('header', 'Overview Sistem')

@section('content')
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}! 👋</h2>
        <p class="text-slate-500 mt-1">Berikut adalah ringkasan data pada Pusat Studi STEM saat ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-50 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
            <div class="absolute -right-6 -top-6 text-red-50 opacity-50 transform group-hover:scale-110 transition-transform duration-500">
                <i class="fa-solid fa-microscope text-9xl"></i>
            </div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Total Penelitian</p>
                    <h3 class="text-4xl font-extrabold text-slate-800">{{ $totalResearch }}</h3>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-red-50 text-[#800000] flex items-center justify-center text-2xl shadow-inner">
                    <i class="fa-solid fa-microscope"></i>
                </div>
            </div>
            <div class="relative z-10 mt-6">
                <a href="{{ route('admin.research.index') }}" class="text-sm text-[#800000] font-semibold hover:underline flex items-center">Lihat Detail <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-50 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
            <div class="absolute -right-6 -top-6 text-emerald-50 opacity-50 transform group-hover:scale-110 transition-transform duration-500">
                <i class="fa-solid fa-people-carry-box text-9xl"></i>
            </div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Total Pengabdian</p>
                    <h3 class="text-4xl font-extrabold text-slate-800">{{ $totalService }}</h3>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl shadow-inner">
                    <i class="fa-solid fa-people-carry-box"></i>
                </div>
            </div>
            <div class="relative z-10 mt-6">
                <a href="{{ route('admin.service.index') }}" class="text-sm text-emerald-600 font-semibold hover:underline flex items-center">Lihat Detail <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-50 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
            <div class="absolute -right-6 -top-6 text-indigo-50 opacity-50 transform group-hover:scale-110 transition-transform duration-500">
                <i class="fa-solid fa-file-export text-9xl"></i>
            </div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Total Luaran</p>
                    <h3 class="text-4xl font-extrabold text-slate-800">{{ $totalOutput }}</h3>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl shadow-inner">
                    <i class="fa-solid fa-file-export"></i>
                </div>
            </div>
            <div class="relative z-10 mt-6">
                <a href="{{ route('admin.output.index') }}" class="text-sm text-indigo-600 font-semibold hover:underline flex items-center">Lihat Detail <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-50 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
            <div class="absolute -right-6 -top-6 text-amber-50 opacity-50 transform group-hover:scale-110 transition-transform duration-500">
                <i class="fa-solid fa-handshake text-9xl"></i>
            </div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-1">Mitra / Kerja Sama</p>
                    <h3 class="text-4xl font-extrabold text-slate-800">{{ $totalPartner }}</h3>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center text-2xl shadow-inner">
                    <i class="fa-solid fa-handshake"></i>
                </div>
            </div>
            <div class="relative z-10 mt-6">
                <a href="{{ route('admin.partner.index') }}" class="text-sm text-amber-500 font-semibold hover:underline flex items-center">Lihat Detail <i class="fa-solid fa-arrow-right ml-2 text-xs"></i></a>
            </div>
        </div>
    </div>
@endsection