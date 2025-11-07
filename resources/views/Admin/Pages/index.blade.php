@extends('Admin.Layouts.master')
@section('pagetitle', 'Overview Giochi')

@section('content')
    {{-- Messaggio di successo --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col">
        {{-- Intestazione --}}
        <div class="flex justify-between items-center  mb-10">
            <h1 class="text-lg text-black/80 font-bold">Lista Videogiochi</h1>
            <small class="text-gray-500">Totale Giochi: {{ $totalGames }}</small>
        </div>
        {{-- Fine Intestazione --}}

        {{-- Tabella Giochi --}}

        <table class="w-full">
            <thead class="border-b border-b-gray-300">
                <th class="text-left">Nome</th>
                <th class="text-left">Descrizione</th>
                <th class="text-right">Azioni</th>
            </thead>

            <tbody>
                @foreach ($allGames as $currentGame)
                    <tr class="border-b border-b-gray-300">
                        <td class="text-left">{{ $currentGame->title }}</td>
                        <td class="text-left">{{ Str::limit($currentGame->description, 30) }}</td>
                        <td class="flex gap-2 justify-end">
                          <x-ui.utils.showBtn :currentGame="$currentGame" />
                            <x-ui.utils.delete-button :currentGame="$currentGame" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Fine Tabella Giochi --}}

    </div>

    {{-- Modale di sicurezza --}}
    <x-modals.delete-alert title="Sei sicuro di voler eliminare questo gioco?"
        sub="Una volta eliminato perderai tutti i dati" textBtnSuccess='Si' textBtnDanger='No' />
    {{-- Fine Modale di sicurezza --}}

@endsection
