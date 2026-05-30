<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Output;
use Illuminate\Support\Str;

class OutputSeeder extends Seeder
{
    public function run(): void
    {
        $outputs = [
            // Data Jurnal
            [
                'type' => 'jurnal',
                'title' => 'Penerapan Internet of Things pada Pemantauan Kualitas Udara',
                'slug' => Str::slug('Penerapan Internet of Things pada Pemantauan Kualitas Udara'),
                'description' => 'Jurnal ini membahas arsitektur sensor murah berbasis mikrokontroler untuk mengukur PM2.5 di area perkotaan.',
                'issuer' => 'Jurnal Ilmiah Teknologi STEM (Sinta 2)',
                'date' => '2025-05-12',
                'url_link' => 'https://ojs.universitas.ac.id/stem',
            ],
            // Data HKI
            [
                'type' => 'hki',
                'title' => 'Paten: Sistem Otomatisasi Filter Air Limbah Rumah Tangga',
                'slug' => Str::slug('Paten Sistem Otomatisasi Filter Air Limbah Rumah Tangga'),
                'description' => 'Sertifikat paten sederhana untuk invensi alat penyaring air berlapis yang dapat dipantau melalui aplikasi *smartphone*.',
                'issuer' => 'DJKI Kementerian Hukum dan HAM RI',
                'date' => '2025-08-20',
                'url_link' => 'https://pdki-indonesia.dgip.go.id/',
            ],
            // Data Penghargaan
            [
                'type' => 'penghargaan',
                'title' => 'Juara 1 Inovasi Teknologi Tepat Guna Nasional',
                'slug' => Str::slug('Juara 1 Inovasi Teknologi Tepat Guna Nasional'),
                'description' => 'Penghargaan bergengsi tingkat nasional atas dedikasi Pusat Studi STEM dalam menciptakan alat pendeteksi longsor dini.',
                'issuer' => 'Kementerian Desa dan PDTT',
                'date' => '2024-11-10',
                'url_link' => '#',
            ]
        ];

        foreach ($outputs as $output) {
            Output::create($output);
        }
    }
}
