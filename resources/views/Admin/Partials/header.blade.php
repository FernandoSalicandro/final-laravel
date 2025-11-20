<header class="header sticky z-50 h-[80px] border-b border-gray-300 bg-white">
    <nav class="w-full h-full px-5 flex items-center justify-between">
        <div class="flex items-center gap-3">
            {{-- Logo mobile (visibile solo quando sidebar è nascosta) --}}
            <div class="hidden max-sm:flex items-center gap-2">
                <x-ui.icon.gamepad class="stroke-blue-500 flex-shrink-0" />
                <span class="font-semibold text-base">Gameverse</span>
            </div>
            {{-- Titolo normale --}}
            <h2 class="font-medium text-gray-700 max-sm:hidden">Gestione VideoGiochi</h2>
        </div>
        
        <div class="flex items-center gap-4">
            {{-- Link mobile Aggiungi (visibile solo quando sidebar è nascosta) --}}
            <a href="{{route('games.create')}}" class="hidden  max-sm:flex items-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                <x-ui.icon.add class="size-5" />
                <span class="max-[370px]:hidden text-sm font-medium">Aggiungi</span>
            </a>

            {{-- User Dropdown --}}
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-900 hover:border-gray-400 focus:outline-none transition ease-in-out duration-150">
                        <div class="max-sm:hidden">{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    {{-- Authentication --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </nav>
</header>
