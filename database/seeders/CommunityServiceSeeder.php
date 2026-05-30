<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommunityService;
use Illuminate\Support\Str;

class CommunityServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Pelatihan Pemrograman Dasar Berbasis STEM untuk Guru SMP',
                'slug' => Str::slug('Pelatihan Pemrograman Dasar Berbasis STEM untuk Guru SMP'),
                'description' => 'Kegiatan pengabdian ini bertujuan untuk meningkatkan literasi digital dan kemampuan *computational thinking* guru-guru SMP di daerah tertinggal melalui pelatihan bahasa pemrograman Python dan Scratch.',
                'location' => 'SMPN 1 Atap, Kabupaten Maju Jaya',
                'date' => '2025-08-15',
            ],
            [
                'title' => 'Instalasi Pompa Air Tenaga Surya untuk Pertanian Desa',
                'slug' => Str::slug('Instalasi Pompa Air Tenaga Surya untuk Pertanian Desa'),
                'description' => 'Penerapan teknologi panel surya (Engineering & Science) untuk menghidupkan pompa air secara mandiri, membantu kelompok tani mengatasi kekeringan saat musim kemarau.',
                'location' => 'Desa Makmur Sentosa',
                'date' => '2024-10-20',
            ],
            [
                'title' => 'Edukasi Pengolahan Limbah Plastik Menjadi Paving Block',
                'slug' => Str::slug('Edukasi Pengolahan Limbah Plastik Menjadi Paving Block'),
                'description' => 'Memberikan penyuluhan dan praktik langsung kepada masyarakat desa tentang cara mengolah sampah plastik rumah tangga menjadi paving block menggunakan teknik peleburan sederhana.',
                'location' => 'Balai Desa Karangrejo',
                'date' => '2026-02-10',
            ]
        ];

        foreach ($services as $service) {
            CommunityService::create($service);
        }
    }
}
