<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Research; // Pastikan Model Research di-import
use Illuminate\Support\Str;
class ResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $researches = [
            [
                'title' => 'Pengembangan Sistem Irigasi Cerdas Berbasis IoT Terintegrasi STEM',
                'slug' => Str::slug('Pengembangan Sistem Irigasi Cerdas Berbasis IoT Terintegrasi STEM'),
                'abstract' => 'Penelitian ini bertujuan mengimplementasikan sensor kelembapan tanah yang terhubung dengan mikrokontroler untuk menghemat penggunaan air pada lahan pertanian urban.',
                'leader_name' => 'Dr. Hendra Saputra',
                'start_date' => '2025-02-10',
                'end_date' => null,
                'status' => 'ongoing',
            ],
            [
                'title' => 'Analisis Algoritma Machine Learning untuk Prediksi Cuaca Ekstrem',
                'slug' => Str::slug('Analisis Algoritma Machine Learning untuk Prediksi Cuaca Ekstrem'),
                'abstract' => 'Studi komparatif beberapa model machine learning dalam memprediksi anomali cuaca berbasis data satelit BMKG guna memitigasi bencana hidrometeorologi.',
                'leader_name' => 'Prof. Rina Wijayanti',
                'start_date' => '2024-01-15',
                'end_date' => '2024-11-20',
                'status' => 'completed',
            ],
            [
                'title' => 'Rancang Bangun Lengan Robot Edukasi untuk Siswa Sekolah Menengah',
                'slug' => Str::slug('Rancang Bangun Lengan Robot Edukasi untuk Siswa Sekolah Menengah'),
                'abstract' => 'Pembuatan prototipe lengan robotik menggunakan 3D printing dan Arduino sebagai media pembelajaran interaktif untuk konsep fisika dan pemrograman (STEM).',
                'leader_name' => 'Ir. Budi Santoso, M.T.',
                'start_date' => '2026-01-05',
                'end_date' => null,
                'status' => 'ongoing',
            ],
            [
                'title' => 'Sintesis Material Nano-Karbon dari Limbah Organik',
                'slug' => Str::slug('Sintesis Material Nano-Karbon dari Limbah Organik'),
                'abstract' => 'Penelitian mengenai pemanfaatan limbah kulit singkong menjadi material nano-karbon sebagai komponen penyimpan energi (superkapasitor) ramah lingkungan.',
                'leader_name' => 'Dr. Anita Rahmawati',
                'start_date' => '2023-06-10',
                'end_date' => '2024-06-10',
                'status' => 'completed',
            ]
        ];

        // Looping data array dan masukkan ke dalam database
        foreach ($researches as $research) {
            Research::create($research);
        }
    }
}
