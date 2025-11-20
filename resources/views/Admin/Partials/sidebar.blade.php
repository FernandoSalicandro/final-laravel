<aside class="sidebar text-black border-b border-r border-gray-300">
    {{-- Intestazione sidebar --}}
    <div class="topSide w-full h-[80px] p-5 border-b border-b-gray-300 flex justify-center items-center gap-3">
        <x-ui.icon.gamepad class="stroke-blue-500 flex-shrink-0" />
        <h1 class="font-semibold text-[14px] max-md:hidden">Gameverse Admin</h1>
    </div>
    {{-- Fine intestazione sidebar --}}

    {{-- side-nav --}}
    <div class="bottomSide w-full p-5 max-md:p-2 flex flex-col">
        <div class="w-full max-md:hidden">
            <small class="text-gray-500 font-semibold">Menu</small>
        </div>
        <nav class="w-full mt-4 max-md:mt-2 flex flex-col gap-2">
            {{-- Link Aggiungi Gioco --}}
          <x-sidebar.sidelink route='games.create' text='Aggiungi Gioco' >
            <x-ui.icon.add class="size-5 flex-shrink-0" />
          </x-sidebar.sidelink>
          {{--Fine Link Aggiungi Gioco --}}

          {{-- Index Dei giochi --}}
          <x-sidebar.sidelink route="games.index" text="Giochi" >
              <x-ui.icon.gamepad class="size-5 flex-shrink-0" />
          </x-sidebar.sidelink>
          {{-- Fine Index Dei giochi --}}
        </nav>
    </div>
    {{-- Fine side-nav --}}
</aside>
