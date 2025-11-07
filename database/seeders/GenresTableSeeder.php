<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creo l'array di generi e colori (per i tag)

        $genres = [
            ['name' => 'Action',    'color' => '#FF5733'],
            ['name' => 'Adventure', 'color' => '#FFC300'],
            ['name' => 'RPG',       'color' => '#8E44AD'],
            ['name' => 'Simulation', 'color' => '#1ABC9C'],
            ['name' => 'Strategy',  'color' => '#2ECC71'],
            ['name' => 'Shooter',   'color' => '#E74C3C'],
            ['name' => 'Puzzle',    'color' => '#F39C12'],
            ['name' => 'Sports',    'color' => '#3498DB'],
            ['name' => 'Racing',    'color' => '#D35400'],
            ['name' => 'Horror',    'color' => '#2C3E50'],

        ];


        foreach($genres as $currentGenre) {

            $newGenre = new Genre();

            $newGenre->name = $currentGenre['name'];
            $newGenre->color = $currentGenre['color'];

            $newGenre->save();

        }
    }
}
