  @props(['currentGame'])
  <form action="{{ route('games.destroy', $currentGame->id) }}" method="POST"
      class="flex justify-center align-center border rounded-lg py-2 px-4 bg-red-300 hover:bg-red-400">
      @csrf
      @method('DELETE')
      <button type='submit' class="deleteBtn flex items-center gap-2">
          <x-ui.icon.trash class="size-5" />
          <span class="max-sm:hidden">Elimina</span>
      </button>
  </form>
