<div class="relative" x-data="{ open: false }">
    <button @click="open = ! open"> <span class="flex items-center lg:flex lg:items-center mt-1.5">
            <span class="sr-only">Open user menu</span>
            <img class="h-7 w-7 rounded-full bg-gray-50"
                src="https://api.dicebear.com/7.x/initials/svg?seed={{ Auth::user()->name ?? '' }}" alt="Avatar">
            <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </span>
    </button>
    <div x-show="open" @click.outside="open = false"
        class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-md ring-1 ring-gray-800/5 focus:outline-none">
        <a href="{{ route('user.account') }}#personal-information"
            class="divide-y divide-gray-200 block px-3 py-1 text-sm leading-6 text-gray-800" role="menuitem"
            tabindex="-1" id="user-menu-item-0">Your profile</a>
        <div class="w-11/12 m-auto border-t border-gray-100"></div>
        <a href="{{ route('user.account') }}#change-password"
            class="divide-y divide-gray-100 block px-3 py-1 text-sm leading-6 text-gray-800" role="menuitem"
            tabindex="-1" id="user-menu-item-0">Your password</a>
        <div class="w-11/12 m-auto border-t border-gray-100"></div>
        <a href="{{ route('profile.security') }}" class="block px-3 py-1 text-sm leading-6 text-gray-800"
            role="menuitem" tabindex="-1" id="user-menu-item-0">Security</a>
        <div class="w-11/12 m-auto border-t border-gray-100"></div>
        <a href="{{ route('ticket.create') }}" class="block px-3 py-1 text-sm leading-6 text-gray-800" role="menuitem"
            tabindex="-1" id="user-menu-item-0">Help</a>
        <div class="w-11/12 m-auto border-t border-gray-100"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="block px-3 py-1 text-sm leading-6 text-red-600" type="submit">Logout</button>
        </form>
    </div>
</div>
