@extends('Admin.Layouts.master')
@section('pagetitle', 'Modifica Dati del Gioco')

@section('content')
    {{-- Messaggio di successo --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Errori di validazione --}}
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-ui.utils.back-url />
    <form action="{{ route('games.update', $game->id) }}" method='POST' enctype="multipart/form-data" class="flex flex-col p-5 gap-5">
        @csrf
        @method('PUT')

        {{-- Titolo --}}
        <div class="w-full flex flex-col">
            <label for="title">Titolo del gioco</label>
            <input type="text" id="title" name="title" value="{{ $game->title }}">
        </div>
        {{-- Fine Titolo --}}

        {{-- Descrizione --}}
        <div class="w-full flex flex-col">
            <label for="description">Descrizione del gioco</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $game->description }}</textarea>
        </div>
        {{-- Fine Descrizione --}}

        {{-- Genere --}}
        <div class="flex flex-col gap-3 w-full">
            <label for="genre">Scegli il genere del gioco</label>
            <select name="genre_id" id="genre_id">
                @foreach ($allGenres as $currentGenre)
                    <option value="{{ $currentGenre->id }}" {{ $currentGenre->id === $game->genre->id ? 'selected' : '' }}>
                        {{ $currentGenre->name }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- Fine Genere --}}

        {{-- Console --}}
        <div class="flex flex-col gap-3 w-full">
            <h3>Scegli le console su cui è disponibile il gioco</h3>
            <div class="w-full grid grid-cols-2">

                @foreach ($allConsoles as $currentConsole)
                    <div class="flex w-full items-center gap-2">
                        <input type="checkbox" id='console_{{ $currentConsole->id }}' name='consoles[]'
                            value={{ $currentConsole->id }}
                            {{ $game->consoles->contains($currentConsole->id) ? 'checked' : '' }}>
                        <label for="console_{{ $currentConsole->id }}">{{ $currentConsole->name }}</label>
                    </div>
                @endforeach
            </div>

        </div>
        {{-- Fine Console --}}

        {{-- Upload File --}}
        <div class="flex flex-col gap-3 w-full">
            <h3>Aggiorna Immagine</h3>
            <div class="w-full flex flex-col">
                <input type="file" name="image" id="image">
                <figure class="mt-3">
                    <img src="{{asset('storage/' . $game->image_url)}}" alt="{{$game->title}}" class="w-1/2">
                </figure>
            </div>


        </div>
        {{-- Fine Upload File --}}

        {{-- Salva Modifiche --}}
       
            <button type='submit' class="bg-green-300 px-4 py-2 rounded-lg max-md:w-full w-1/3 hover:shadow-md">
                Salva Modifiche
            </button>
        
        {{-- Fine Salva Modifiche --}}


    </form>
@endsection
