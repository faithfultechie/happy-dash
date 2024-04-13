<div class="bg-white">
    <h2 class="text-lg font-semibold font-display text-gray-700 tracking-tight mx-3 py-1.5">Add company
    </h2>

    <div class="border-t border-gray-300 mt-1"></div>
    <form wire:submit="save" method="POST" class="mx-2 py-4">
        <div class="grid gap-5 grid-cols-1 md:grid-cols-1 px-2">
            <div>
                <x-input label="Name" wire:model="name" required />
            </div>
        </div>
        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 px-2 mt-5">
            <div>
                <x-input label="Contact" wire:model="contact" />
            </div>
            <div>
                <x-input label="Email" type="email" wire:model="email" />
            </div>
        </div>
        <div class="grid gap-5 grid-cols-1 md:grid-cols-1 px-2 mt-5">
            <div>
                <x-input label="Address" wire:model="address" />
            </div>
        </div>
    </form>

    <div class="border-t border-gray-300 mt-2"></div>
    <div class="bg-slate-100">
        <div class="px-4 py-4">
            <x-button sm wire:click="$dispatch('closeModal')" class="outline-none" flat label="Cancel & Close" />
            <x-button sm wire:click="saveCompany" class="ml-2 font-medium leading-6" blue label="Save" />
        </div>
    </div>
</div>
