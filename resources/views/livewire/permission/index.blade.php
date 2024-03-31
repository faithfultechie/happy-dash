<div>
    <div>
        <x-page-heading pageHeading="Permissions & Roles" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="text-right">
            <button type="button" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <a href="{{ route('settings') }}">Back to settings</a>
            </button>
        </div>
        <div class="w-full md:w-9/12">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-slate-700">Permission management</h3>
                    <p class="text-sm text-gray-500">All permissions that can be assigned to all users</p>
                </div>
                <div> <x-button sm wire:click="$dispatch('openModal', {component: 'add-permission-modal'})"
                        class="mt-6" blue label="Add permission" /></div>
            </div>
            <div class="border-t border-gray-200 my-4"></div>
            @foreach ($permissions as $permission)
                <span
                    class="inline-flex items-center gap-x-1 m-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                    {{ $permission->name }}
                    <button type="button"
                        wire:click="$dispatch('openModal', {component: 'delete-permission-modal',arguments: { permission: {{ $permission->id }} }})"
                        class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-blue-600/20">
                        <span class="sr-only">Remove</span>
                        <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-blue-600/50 group-hover:stroke-blue-600/75">
                            <path d="M4 4l6 6m0-6l-6 6" />
                        </svg>
                        <span class="absolute -inset-1"></span>
                    </button>
                </span>
            @endforeach
        </div>
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-8">
        <div class="w-full md:w-9/12">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-slate-700">Role management</h3>
                    <p class="text-sm text-gray-500">All roles that can be assigned to all users</p>
                </div>
                <div> <x-button sm wire:click="$dispatch('openModal', {component: 'add-role-modal'})" class="mt-6"
                        blue label="Add role" /></div>
            </div>
            <div class="border-t border-gray-200 my-4"></div>
            @foreach ($roles as $role)
                <span
                    class="inline-flex items-center gap-x-1 m-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                    {{ $role->name }}
                    <button type="button"
                        wire:click="$dispatch('openModal', {component: 'delete-role-modal',arguments: { role: {{ $role->id }} }})"
                        class="group relative -mr-1 h-3.5 w-3.5 rounded-sm hover:bg-blue-600/20">
                        <span class="sr-only">Remove</span>
                        <svg viewBox="0 0 14 14" class="h-3.5 w-3.5 stroke-blue-600/50 group-hover:stroke-blue-600/75">
                            <path d="M4 4l6 6m0-6l-6 6" />
                        </svg>
                        <span class="absolute -inset-1"></span>
                    </button>
                </span>
            @endforeach
        </div>
    </div>
</div>
