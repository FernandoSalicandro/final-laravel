  @props(['route', 'text'])
  <a href="{{route($route)}}"
      class="flex items-center max-md:justify-center  gap-2 p-2 cursor-pointer rounded-lg hover:bg-gray-200 transition-colors">
      {{ $slot }}
      <span class="text-sm max-md:hidden">{{ $text }}</span>
  </a>
