@extends('Admin.Layouts.master')
@section('pagetitle', 'Aggiungi Nuovo Gioco')

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

    <form action="{{ route('games.store') }}" method='POST' enctype="multipart/form-data" class="flex flex-col p-5 gap-5">
        @csrf

        {{-- Titolo --}}
        <div class="w-full flex flex-col">
            <label for="title">Titolo del gioco</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        {{-- Fine Titolo --}}

        {{-- Descrizione --}}
        <div class="w-full flex flex-col">
            <label for="description">Descrizione del gioco</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        </div>
        {{-- Fine Descrizione --}}

        {{-- Genere --}}
        <div class="flex flex-col gap-3 w-full">
            <label for="genre_id">Scegli il genere del gioco</label>
            <select name="genre_id" id="genre_id" required>
                <option value="">-- Seleziona un genere --</option>
                @foreach ($allGenres as $currentGenre)
                    <option value="{{ $currentGenre->id }}" {{ old('genre_id') == $currentGenre->id ? 'selected' : '' }}>
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
                        <input type="checkbox" 
                               id='console_{{ $currentConsole->id }}' 
                               name='consoles[]'
                               value="{{ $currentConsole->id }}"
                               {{ in_array($currentConsole->id, old('consoles', [])) ? 'checked' : '' }}>
                        <label for="console_{{ $currentConsole->id }}">{{ $currentConsole->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Fine Console --}}

        {{-- Upload File --}}
        <div class="flex flex-col gap-3 w-full">
            <h3>Carica Immagine</h3>
            <div class="w-full flex flex-col">
                <input type="file" name="image" id="image" accept="image/*">
            </div>
        </div>
        {{-- Fine Upload File --}}

        {{-- Bottoni Azione --}}
        <div class="flex gap-3">
            <button type='submit' class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                Crea Gioco
            </button>
            <a href="{{ route('games.index') }}" class="bg-gray-200 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                Annulla
            </a>
        </div>
        {{-- Fine Bottoni Azione --}}
    </form>
@endsection

