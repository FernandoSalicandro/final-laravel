   @props(['currentGame'])
   <a href="{{ route('games.show', $currentGame->id) }}"
       class="flex gap-2 items-center border px-4 py-2 rounded-lg bg-gray-100 hover:bg-indigo-300 hover:text-white">
       <x-ui.icon.eye class="size-5" />
       <span class="max-sm:hidden">Dettagli</span>
   </a>
