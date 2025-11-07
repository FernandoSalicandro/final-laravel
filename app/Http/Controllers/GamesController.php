<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Prendo tutti i giochi con relazioni (Eager loading --> approfondire)
        // Li ordino per titolo tramite funzione orderBy() ,Aggiungo paginazione tramite funzione paginate() per performance
        $allGames = Game::with(['genre', 'consoles'])
            ->orderBy('title', 'asc')
            ->paginate(20);
        $totalGames = Game::count();

        return view('Admin.Pages.index', compact('allGames', 'totalGames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allGenres = Genre::all();
        $allConsoles = Console::all();

        return view('Admin.Pages.create', compact('allGenres', 'allConsoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre_id' => 'required|exists:genres,id',
            'consoles' => 'nullable|array',
            'consoles.*' => 'exists:consoles,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Crea il gioco (senza immagine per ora)
        $game = Game::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'genre_id' => $data['genre_id'],
        ]);

        // Gestisci upload immagine
        if (array_key_exists('image', $data)) {
            $img_url = Storage::putFile("games", $data['image']);
            $game->image_url = $img_url;
            $game->save();
        }

        // Sincronizza le console
        if (isset($data['consoles'])) {
            $game->consoles()->sync($data['consoles']);
        }

        return redirect()->route('games.show', $game->id)->with('success', 'Gioco creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $game = Game::with(['genre', 'consoles'])->find($id);





        return view('Admin.Pages.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $allGenres = Genre::all();
        $allConsoles = Console::all();
        $game = Game::with(['genre', 'consoles'])->find($id);

        return view('Admin.Pages.edit', compact('game', 'allGenres', 'allConsoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validazione
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre_id' => 'required|exists:genres,id',
            'consoles' => 'nullable|array',
            'consoles.*' => 'exists:consoles,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Carico il gioco
        $game = Game::findOrFail($id);

        // Modifico le informazioni del gioco
        $game->title = $data['title'];
        $game->description = $data['description'];
        $game->genre_id = $data['genre_id'];

        // Gestione upload immagine
        if (array_key_exists('image', $data)) {
            // Elimina la vecchia immagine
            Storage::delete($game->image_url);
            
            // Carica la nuova
            $img_url = Storage::putFile("games", $data['image']);
            $game->image_url = $img_url;
        }

        // Salvo le modifiche
        $game->save();

        // Sincronizza le console
        $game->consoles()->sync($data['consoles'] ?? []);

        return redirect()->route('games.show', $game->id)->with('success', 'Gioco aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $game = Game::findOrFail($id);
        
        // Elimina l'immagine
        Storage::delete($game->image_url);
        
        // Elimina PRIMA le relazioni nella tabella pivot
        $game->consoles()->detach();
        
        // Ora puoi eliminare il gioco
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Gioco eliminato con successo!');
    }
}
