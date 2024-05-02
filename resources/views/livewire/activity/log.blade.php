<div>
    <div>
        <x-page-heading pageHeading="Activity" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-md mt-5">
        <div class="text-right">
            <button type="button"
                class="ml-5 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                <svg class="-ml-0.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <a href="{{ route('settings') }}" class="text-xs">Back to settings</a>
            </button>
        </div>
        <div class="text-sm mt-5">
            @livewire('AuditTable')
        </div>
    </div>

</div>
