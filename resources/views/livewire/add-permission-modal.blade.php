<x-modal-dialogue
 modalTitle="Add permission"
 modalBtnAction="savePermission"
 modalBtnColor="blue"
 modalBtnLabel="Save">
    <form wire:submit="save">
        <div class="grid gap-5 grid-cols-1 md:grid-cols-3">
            <div class="col-span-2">
                <x-input label="Name" wire:model="name" />
            </div>
        </div>
    </form>
</x-modal-dialogue>

