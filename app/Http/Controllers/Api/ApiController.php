<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //index
    public function index(Request $request)
    {
        //  query base con eager loading
        $query = Game::with(['genre']);
        
        //  filtro 1 per titolo se presente
        if($request->has('title')){
            $value = trim(($request->query('title')));
            //ricerca parziale con like
            $query->where('title', 'LIKE', '%' . $value . '%');
        }

        // filtro 2 per categoria se presente
        if($request->has('genre_id') && $request->genre_id !== null){

            $value = $request->query('genre_id');
            $query->where('genre_id',$value);

        }

       
        $allGames = $query->get();

        return response()->json([
            'success' => true,
            'games' => $allGames
        ]);
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
