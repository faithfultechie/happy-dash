<li class="{{ Request::routeIs($route) ? 'active' : '' }}">
    <a wire:navigate href="{{ route($route) }}"
        class="group flex w-full items-center rounded-md mb-2 pl-11 pr-2 text-sm font-medium text-gray-600 hover:text-orange-600">
        {{ $slot }}
    </a>
</li>
