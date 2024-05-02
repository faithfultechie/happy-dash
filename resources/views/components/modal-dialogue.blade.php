<div class="w-full shadow-md rounded-lg bg-white dark:bg-secondary-800">
    <h2
        class="border-b dark:border-0 px-4 py-2.5 font-medium whitespace-normal text-md text-secondary-700 dark:text-secondary-400">
        {{ $modalTitle }}
    </h2>
    <div class="mx-auto px-5 py-5">
        <p class="text-sm text-secondary-600 rounded-b-xl grow dark:text-secondary-400">
            {{ $slot }}
        </p>
    </div>
    <div
        class="px-4 py-4 sm:px-6 bg-secondary-50 rounded-t-none border-t dark:bg-secondary-800 dark:border-secondary-600 rounded-lg ">
        <x-button wire:click="$dispatch('closeModal')" flat label="Cancel" />
        <x-button wire:click="{{ $modalDeleteAction }}" red label="Delete" />
    </div>
</div>
