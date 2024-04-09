<div x-data="{ showMenu: false }" x-on:click.away="showMenu = false" class="space-y-1 mb-0.5">
    <a class="text-gray-600 cursor-pointer hover:text-orange-600 hover:bg-gray-50 group flex rounded-md p-2 text-sm leading-6 font-semibold"
        x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1" @click="showMenu = !showMenu"
        aria-expanded="false" x-bind:aria-expanded="showMenu.toString()"
        x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900&quot;">
        {!! $svg !!}
        <span class="flex-1">{{ $title }}</span>
        <svg class="ml-8 h-4 w-4 flex-shrink-0 transform transition-colors duration-150 ease-in-out group-hover:text-gray-400 text-gray-300"
            viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true"
            :class="{ 'text-gray-400 rotate-90': showMenu, 'text-gray-300': !showMenu }" fill="gray">
            <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
        </svg>
    </a>
    <div x-description="Expandable link section, show/hide based on state." class="space-y-1" id="sub-menu-1"
        x-show="showMenu" style="display: none;">
        {{ $slot }}
    </div>
</div>
