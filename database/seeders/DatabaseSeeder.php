<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\CommunityServiceSeeder;
use Database\Seeders\OutputSeeder;
use Database\Seeders\PartnerSeeder;
use Database\Seeders\ResearchSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
User::create([
            'name' => 'Administrator STEM',
            'email' => 'admin@stem.com',
            'password' => Hash::make('password'), // Password Anda
        ]);
        // $this->call([
        //     ResearchSeeder::class,
        //     CommunityServiceSeeder::class,
        //     OutputSeeder::class,
        //     PartnerSeeder::class,
        //     TeamSeeder::class,
        // ]);
    }
}
