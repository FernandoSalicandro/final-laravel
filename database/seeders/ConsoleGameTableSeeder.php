<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Console;
use App\Models\Game;

class ConsoleGameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $farCry3 = Game::where('title', 'Far Cry III')->first();

        if($farCry3){
            $consoleNames = ['PC', 'PlayStation 3', 'PlayStation 4', 'Xbox 360', 'Xbox One'];

            $consoleIds = Console::whereIn('name', $consoleNames)->pluck('id');

            $farCry3->consoles()->attach($consoleIds);
        }
    }
}
