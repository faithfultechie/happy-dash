<div class="bg-white">
    <h2 class="text-lg font-semibold font-display text-gray-700 tracking-tight mx-3 py-1.5">Add user
    </h2>
    <div class="border-t border-gray-300 mt-1"></div>
    <form wire:submit="save">
        <div class="mt-2">
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
            </div>
            <div class="bg-slate-100">
                <div class="px-4 py-4">
                    <x-button sm wire:click="$dispatch('closeModal')" flat label="Cancel & Close" />
                    <x-button sm wire:click="save" class="ml-2 font-medium leading-6" blue label="Save" />
                </div>
            </div>
        </div>
    </form>
</div>
