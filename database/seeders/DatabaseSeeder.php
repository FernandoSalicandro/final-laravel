<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chiamata ai seeders nell'ordine corretto
        $this->call([
            GenresTableSeeder::class,
            ConsolesTableSeeder::class,
            GamesTableSeeder::class,
            ConsoleGameTableSeeder::class, // Seeder per la tabella pivot
        ]);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
