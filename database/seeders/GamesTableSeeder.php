<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $newGame = new Game();
        $newGame->title = 'Far Cry III';
        $newGame->description = 'Sparatutto in prima persona in mondo aperto ambientato in un arcipelago tropicale, dove il protagonista, Jason Brody, deve salvare i suoi amici da pirati e criminali';
        $newGame->image_url = 'games/farcry3.jpg'; 
        $newGame->genre_id = 6;
        $newGame->save();
    }
}
