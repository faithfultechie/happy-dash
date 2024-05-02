<x-modal-dialogue
 modalTitle="Edit company"
 modalBtnAction="saveCompany"
 modalBtnColor="blue"
 modalBtnLabel="Save">
    <form wire:submit="save">
        <div class="grid gap-5 grid-cols-1 md:grid-cols-1">
            <div>
                <x-input label="Name" wire:model="name" />
            </div>
        </div>
        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
            <div>
                <x-input label="Contact" wire:model="contact" />
            </div>
            <div>
                <x-input label="Email" type="email" wire:model="email" />
            </div>
        </div>
        <div class="grid gap-5 grid-cols-1 md:grid-cols-1 mt-5">
            <div>
                <x-input label="Address" wire:model="address" />
            </div>
        </div>
    </form>
</x-modal-dialogue>
