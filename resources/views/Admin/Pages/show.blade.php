@extends('Admin.Layouts.master')
@section('pagetitle', 'Dettagli del gioco')

@section('content')

<div class="w-full flex justify-between items-center mb-5">
<x-ui.utils.back-url />

    <div class="flex gap-3 items-center">
        
        <x-ui.utils.edit-btn :currentGame='$game' />
        <x-ui.utils.delete-button :currentGame="$game" />
    </div>

    
        <x-modals.delete-alert title='Sicuro di voler eliminare il gioco?' sub='Una volta eliminato i dati andranno persi' textBtnSuccess='Si' textBtnDanger='No' />
    
</div>

<div class="flex flex-col w-full">
      {{-- Immagine --}}
      <figure class="w-full grid">
        <img src="{{asset('storage/'. $game->image_url)}}" alt="{{$game->title}}" >
      </figure>
   {{-- Fine Immagine --}}

   {{-- Titolo --}}
       <h1 class="my-5 text-4xl font-semibold p-3">{{$game->title}}</h1>
   {{--Fine titolo --}}
   {{-- Descrizione --}}
   <div class="bg-gray-200 flex flex-col p-3 rounded-lg">
    <h3 class="text-lg font-semibold">Descrizione</h3>
    <p>{{$game->description}}</p>
   </div>
   {{-- Fine Descrizione --}}

   {{-- Genere --}}
   <div class="w-full flex flex-col gap-2 mt-5 p-3">
    <h3 class="text-lg font-semibold">Genere</h3>
    
        <span class="w-fit px-4 py-2 rounded-lg" style="background-color: {{$game->genre->color}}">{{$game->genre->name}}</span>
   </div>
   {{-- Fine Genere --}}

   {{-- Piattaforma --}}
   <div class="w-full flex flex-col mt-5 p-3">
    <h3 class="text-lg font-semibold">Piattaforme</h3>
    <div class="w-full grid grid-cols-2 lg:grid-cols-8 gap-2 mt-2">
        @foreach($game->consoles as $currentConsole)
            <span class="bg-indigo-300 rounded-lg py-2 text-center">{{$currentConsole->name}}</span>
        @endforeach
    </div>
   </div>
   {{-- Fine Piattaforma --}}



   
</div>
 
@endsection 