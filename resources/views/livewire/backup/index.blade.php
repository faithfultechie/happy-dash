<div>
    <button type="button" wire:click="$dispatch('openModal', {component: 'add-company-modal'})"
        class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-800">
        <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
        Add company
    </button>
    <div>
        <x-page-heading pageHeading="Backups" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="text-sm">

        </div>
    </div>

</div>
