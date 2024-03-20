<div class="bg-white">
    <h2 class="text-lg font-semibold font-display text-gray-700 tracking-tight mx-3 py-1.5">Edit category
    </h2>

    <div class="border-t border-gray-300 mt-1"></div>
    <form wire:submit="save" method="POST" class="mx-2 py-4">
        <div class="grid gap-5 grid-cols-1 md:grid-cols-1 px-2">
            <div>
                <x-input label="Name" wire:model="name" />
            </div>
        </div>
    </form>

    <div class="border-t border-gray-300 mt-2"></div>
    <div class="bg-slate-100">
        <div class="px-4 py-4">
            <x-button sm wire:click="$dispatch('closeModal')" class="outline-none" flat label="Cancel & Close" />
            <x-button sm wire:click="saveCategory" class="ml-2" blue label="Save" />
        </div>
    </div>
</div>
