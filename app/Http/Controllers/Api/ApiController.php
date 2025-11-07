<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //index
    public function index()
    {

        $allGames = Game::with(['genre'])->get();
        

        return response()->json([
                'success' => true,
                'games' => $allGames
            ]
        );
    }


    //show
    public function show(string $id){

        $currentGame = Game::with(['genre', 'consoles'])->find($id);

        return response()->json([
            'success' => true,
            'currentGame' => $currentGame
        ]);
    }
}
