<x-modal-dialogue
 modalTitle="Add user"
 modalBtnAction="save"
 modalBtnColor="blue"
 modalBtnLabel="Save">
    <form wire:submit="save">
        <div class="grid gap-5 grid-cols-1 md:grid-cols-2">
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
            </div>
            <div>
                <x-inputs.password label="Confirm password" wire:model="password_confirmation" />
            </div>
        </div>
    </form>
</x-modal-dialogue>
