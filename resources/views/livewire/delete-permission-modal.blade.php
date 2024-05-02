<x-modal-dialogue
 modalTitle="Delete permission"
 modalBtnAction="delete"
 modalBtnColor="red"
 modalBtnLabel="Delete">
 <p class="text-sm text-secondary-600 rounded-b-xl grow dark:text-secondary-400">
    This will permanently delete <span class="font-medium">{{ $permission->name }}</span>
    and all related associations. This action cannot be undone.
</p>
</x-modal-dialogue>

