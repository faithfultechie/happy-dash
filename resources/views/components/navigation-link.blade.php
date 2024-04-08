<li class="{{ Request::routeIs($route) ? 'active' : '' }}">
    <a wire:navigate href="{{ route($route) }}"
        class="text-gray-600 cursor-pointer hover:text-orange-600 hover:bg-gray-50 group flex rounded-md p-2 text-sm leading-6 font-semibold">
        {{ $slot }}
    </a>
</li>
