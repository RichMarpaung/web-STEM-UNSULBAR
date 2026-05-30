<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;
use Illuminate\Support\Str;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'type' => 'mitra',
                'name' => 'PT Teknologi Masa Depan',
                'slug' => Str::slug('PT Teknologi Masa Depan'),
                'description' => 'Mitra industri strategis penyedia perangkat keras IoT untuk riset agrikultur cerdas.',
                'website' => 'https://example.com',
                'start_date' => '2023-01-15',
            ],
            [
                'type' => 'kolaborasi',
                'name' => 'Universitas Sains Global',
                'slug' => Str::slug('Universitas Sains Global'),
                'description' => 'MoU pertukaran peneliti dan penggunaan laboratorium bersama untuk riset material nano.',
                'website' => 'https://univ-example.edu',
                'start_date' => '2024-05-10',
                'end_date' => '2029-05-10',
            ],
            [
                'type' => 'mitra',
                'name' => 'Dinas Lingkungan Hidup Provinsi',
                'slug' => Str::slug('Dinas Lingkungan Hidup Provinsi'),
                'description' => 'Kerja sama penerapan teknologi pengolahan limbah hasil riset STEM ke masyarakat binaan pemerintah daerah.',
                'website' => 'https://dlh.go.id',
                'start_date' => '2025-02-20',
            ]
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
