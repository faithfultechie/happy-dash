<div class="bg-white">
    <h2 class="text-lg font-semibold font-display text-gray-700 tracking-tight mx-3 py-1.5">Delete company
    </h2>
    <div class="border-t border-gray-300 mt-1"></div>
    <div class="flex items-start px-5 py-5">
        <div class="mx-auto flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-red-100">
            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
        </div>
        <div class="text-center ml-4 sm:text-left">
            <p class="text-gray-500">This will permanently delete <span class="font-medium">{{ $company->name }}</span>
                and all related associations. This action cannot be undone.</p>
        </div>
    </div>
    <div class="border-t border-gray-300 mt-2"></div>
    <div class="bg-slate-100">
        <div class="px-4 py-4">
            <x-button sm wire:click="$dispatch('closeModal')" flat label="Cancel & Close" />
            <x-button sm wire:click="delete" class="ml-2 font-medium leading-6" red label="Delete" />
        </div>
    </div>
</div>
