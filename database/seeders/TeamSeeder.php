<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengosongkan data tabel team terlebih dahulu agar tidak duplikat saat dijalankan ulang
        // Team::truncate();

        $members = [
            [
                'name'         => 'Dr. Hendra Saputra, M.T.',
                'role'         => 'Ketua Pusat Studi',
                'image'        => null, // Sengaja null agar nanti memunculkan ikon inisial default sebelum di-upload lewat admin
                'email'        => 'hendra.saputra@universitas.ac.id',
                'linkedin_url' => 'https://linkedin.com/in/hendra-saputra-stem',
            ],
            [
                'name'         => 'Prof. Rina Wijayanti, Ph.D.',
                'role'         => 'Kadiv. Penelitian',
                'image'        => null,
                'email'        => 'rina.wijayanti@universitas.ac.id',
                'linkedin_url' => 'https://linkedin.com/in/rina-wijayanti-ai',
            ],
            [
                'name'         => 'Ir. Budi Santoso, M.Eng.',
                'role'         => 'Kadiv. Pengabdian',
                'image'        => null,
                'email'        => 'budi.santoso@universitas.ac.id',
                'linkedin_url' => 'https://linkedin.com/in/budi-santoso-energy',
            ],
            [
                'name'         => 'Dr. Anita Rahmawati, M.Sc.',
                'role'         => 'Kadiv. Mitra & Luaran',
                'image'        => null,
                'email'        => 'anita.rahmawati@universitas.ac.id',
                'linkedin_url' => 'https://linkedin.com/in/anita-rahmawati-nanotech',
            ],
        ];

        foreach ($members ?? [] as $member) {
            Team::create($member);
        }
    }
}
