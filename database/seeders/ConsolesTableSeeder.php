<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $consoles = [
            'PlayStation',
            'PlayStation 2',
            'PlayStation 3',
            'PlayStation 4',
            'PlayStation 5',
            'Xbox',
            'Xbox 360',
            'Xbox One',
            'Xbox Series S',
            'Xbox Series X',
            'Nintendo Switch',
            'Nintendo Wii',
            'Nintendo Wii U',
            'Nintendo GameCube',
            'Nintendo 64',
            'Nintendo DS',
            'Nintendo 3DS',
            'Sega Dreamcast',
            'Sega Genesis (Mega Drive)',
        ];


        foreach($consoles as $currentConsole){
            $newConsole = new Console();

            $newConsole->name = $currentConsole;

            $newConsole->save();
        }
    }
}
