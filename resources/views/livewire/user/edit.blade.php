<div>
    <div>
        <x-page-heading pageHeading="Edit User - {{ $user->name }}" />
    </div>
    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="text-right">
            <button type="button"
                class="ml-5 inline-flex items-center text-xs font-medium text-gray-500 hover:text-gray-700">
                <svg class="-ml-0.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <a href="{{ route('user.index') }}">Back to users</a>
            </button>
        </div>
        <h2 class="text-xl my-5 font-semibold text-slate-700">Profile information</h2>
        <form>
            <div class="w-full md:w-9/12">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <div>
                        <x-input label="Full name" type="text" wire:model="name" />
                    </div>
                    <div>
                        <x-input label="Email" type="email" wire:model="email" />
                    </div>
                </div>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <div>
                        <x-inputs.password label="Password" wire:model="password" />
                        <div class="text-right mt-1">
                            <x-button.circle 2xs rounded secondary label="↻" title="Generate password"
                                wire:click="generatePassword" />
                        </div>
                    </div>
                    <div>
                        <x-inputs.password label="Confirm password" wire:model="password_confirmation" />
                    </div>
                </div>

                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <div class="flex flex-wrap mt-4">
                        <div>
                            <x-checkbox id="disable_login" label="Disable login" wire:model="disable_login" />
                        </div>
                        <div class="ml-6">
                            <x-checkbox id="force_password_change" wire:model="force_password_change"
                                label="Force password change" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <form>
            <div class="w-full md:w-9/12">
                <h2 class="text-xl font-semibold text-slate-700">Roles</h2>
                <div class="flex flex-wrap mt-3">
                    @forelse ($roles as $role)
                        <div class="m-1">
                            <x-radio id="{{ $role->id }}" wire:model="role" label="{{ $role->name }}"
                                value="{{ $role->name }}" primary sm />
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No records found</p>
                    @endforelse
                </div>
                <div class="border-t border-gray-200 my-6"></div>
                <h2 class="mt-5 text-xl font-semibold text-slate-700">Permissions</h2>
                <div class="flex flex-wrap mt-3">
                    @forelse ($permissions as $permission)
                        <div class="m-1.5">
                            <x-checkbox id="{{ $permission->id }}" wire:model="selectedPermissions" :checked="in_array($permission->id, $selectedPermissions)"
                                label="{{ $permission->name }}" value="{{ $permission->name }}" primary sm />
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No records found</p>
                    @endforelse
                </div>
                <div class="flex justify-between">
                    <div>
                        <x-button md wire:click="save" class="mt-12 font-medium leading-6" blue label="Save change" />
                    </div>
                    <div>
                        <x-button md x-on:click="$openModal('simpleModal')"
                            class="mt-12 text-right font-medium leading-6" icon="trash" outline red
                            label="Delete user" />
                        <x-modal name="simpleModal">
                            <x-card title="Delete account">
                                <p class="text-gray-600 text-wrap text-sm">Do you really want to delete <span
                                        class="font-medium">{{ $user->name }}</span>?
                                    This action will permanently erase the user, including any
                                    associated data. Remember, this action cannot be undone.
                                </p>
                                <x-slot name="footer" class="flex justify-end gap-x-4">
                                    <x-button flat label="Cancel" x-on:click="close" />
                                    <x-button red label="Delete" wire:click="deleteAccount" />
                                </x-slot>
                            </x-card>
                        </x-modal>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
