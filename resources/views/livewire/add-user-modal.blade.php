<div class="bg-white">
    <h2 class="text-lg font-semibold font-display text-gray-700 tracking-tight mx-3 py-1.5">Add user
    </h2>
    <div class="border-t border-gray-300 mt-1"></div>
    <div x-data="{ current: 1 }">
        <div class="flex overflow-hidden border-b border-gray-200">
            <button class="w-full" x-on:click="current = 1"
                x-bind:class="{ 'text-white bg-gray-300': current === 1 }">Information</button>
            <button class="px-4 py-2 w-full" x-on:click="current = 2"
                x-bind:class="{ 'text-white bg-gray-300': current === 2 }">Permissions</button>
        </div>
        <form wire:submit="save">
            <div x-show.transition="current === 1" class="mt-2">
                <div class="bg-blue-50 px-2 py-4 mx-2 my-4 rounded-md text-xs flex items-center max-w-lg">
                    <svg viewBox="0 0 24 24" class="text-blue-600 w-4 h-4 sm:w-4 sm:h-4 mr-3">
                        <path fill="currentColor"
                            d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
                        </path>
                    </svg>
                    <span class="text-blue-700">Upon account creation, user will be prompted to change their
                        password on initial login for added security.</span>
                </div>
                <div class="mx-2 py-4">
                    <div class="grid gap-5 grid-cols-1 md:grid-cols-2 px-2">
                        <div>
                            <x-input label="Full name" type="text" wire:model="name" />
                        </div>
                        <div>
                            <x-input label="Email" type="email" wire:model="email" />
                        </div>
                    </div>
                    <div class="grid gap-5 grid-cols-1 md:grid-cols-2 px-2 mt-5">
                        <div>
                            <x-inputs.password label="Password" wire:model="password" />
                        </div>
                        <div>
                            <x-inputs.password label="Confirm password" wire:model="password_confirmation" />
                        </div>
                    </div>
                    <p class="mt-4 font-medium text-gray-500 px-2">Role</p>
                    <div class="border-t border-gray-300 mx-2 my-1"></div>
                    <div class="flex flex-wrap">
                        @foreach ($roles as $role)
                            <div class="m-2">
                                <x-radio id="{{ $role->id }}" wire:model="role" label="{{ $role->name }}"
                                    value="{{ $role->name }}" blue sm />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-slate-100">
                    <div class="px-4 py-4">
                        <x-button sm wire:click="$dispatch('closeModal')" flat label="Cancel & Close" />
                        <x-button sm wire:click="save" class="ml-2 font-medium leading-6" blue label="Save" />
                    </div>
                </div>
            </div>

            <div x-show.transition="current === 2" class="mt-2">
                <div class="mx-2 pb-4">
                    <div class="flex flex-wrap">
                        @foreach ($permissions as $permission)
                            <div class="m-2">
                                <x-checkbox id="{{ $permission->id }}" wire:model="selectedPermissions"
                                    label="{{ $permission->description }}" primary value="{{ $permission->name }}" xl />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
