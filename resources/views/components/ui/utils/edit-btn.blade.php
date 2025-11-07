@props(['currentGame'])
<a href="{{route('games.edit', $currentGame->id)}}" class="hover:bg-blue-400 px-4 py-2 rounded-lg flex gap-2 hover:text-white">
    <x-ui.icon.edit class="size-5" />
    Modifica
</a>