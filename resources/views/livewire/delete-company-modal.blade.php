<x-modal-dialogue
 modalTitle="Delete company"
 modalBtnAction="delete"
 modalBtnColor="red"
 modalBtnLabel="Delete">
    <form wire:submit="save">
        <p class="text-sm text-secondary-600 rounded-b-xl grow dark:text-secondary-400">
            This will permanently delete <span class="font-medium">{{ $company->name }}</span>
            and all related associations. This action cannot be undone.
        </p>
    </form>
</x-modal-dialogue>
