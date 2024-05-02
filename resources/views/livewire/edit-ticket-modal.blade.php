<div>
    @if ($ticket->status == 'open')
        <div class="bg-white">
            <h2
                class="border-b dark:border-0 px-4 py-2.5 font-medium whitespace-normal text-md text-secondary-700 dark:text-secondary-400">
                Close ticket
            </h2>
            <div class="mx-auto px-5 py-5">
                <p class="text-sm text-secondary-600 rounded-b-xl grow dark:text-secondary-400">This will action
                    will close <span class="font-medium">{{ $ticket->title }}
                    </span>
                    by <span class="font-medium"> {{ $ticket->user->name }}</span>.</p>
            </div>
            <div
                class="px-4 py-4 sm:px-6 bg-secondary-50 rounded-t-none border-t dark:bg-secondary-800 dark:border-secondary-600 rounded-lg">
                <x-button sm wire:click="$dispatch('closeModal')" flat label="Cancel" />
                <x-button sm wire:click="closeTicket" class="ml-2 font-medium leading-6" red label="Close" />
            </div>
        </div>
    @else
        <div class="bg-white">
            <h2
                class="border-b dark:border-0 px-4 py-2.5 font-medium whitespace-normal text-md text-secondary-700 dark:text-secondary-400">
                Open ticket
            </h2>
            <div class="mx-auto px-5 py-5">
                <p class="text-sm text-secondary-600 rounded-b-xl grow dark:text-secondary-400">This will action will
                    reopen <span class="font-medium">{{ $ticket->title }}
                    </span>
                    by <span class="font-medium"> {{ $ticket->user->name }}</span>.</p>
            </div>
            <div
                class="px-4 py-4 sm:px-6 bg-secondary-50 rounded-t-none border-t dark:bg-secondary-800 dark:border-secondary-600 rounded-lg">
                <x-button sm wire:click="$dispatch('closeModal')" flat label="Cancel" />
                <x-button sm wire:click="openTicket" class="ml-2 font-medium leading-6" green label="Open" />
            </div>
        </div>
    @endif
</div>
