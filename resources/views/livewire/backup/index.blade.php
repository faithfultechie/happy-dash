<div>
    <div>
        <x-page-heading pageHeading="Backups" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-md mt-5">
        <div class="text-right">
            <button type="button"
                class="ml-5 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <a href="{{ route('settings') }}">Back to settings</a>
            </button>
        </div>

        <div>
            @if (!$isBackupRunning)
                <x-button sm wire:click="runBackup" class="mt-6" blue label="Run backup" />
            @else
                <div class="rounded-md bg-green-50 p-4 my-2">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Backup successfully completed.</h3>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" wire:click="closeAlert"
                                    class="inline-flex rounded-md bg-green-50 p-1.5 text-green-600 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                                    <span class="sr-only">Dismiss</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        @foreach ($backupInfo as $destination)
            <div>
                <dl
                    class="mt-5 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow md:grid-cols-4 md:divide-x md:divide-y-0">
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">Total backups</dt>
                        <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                {{ $destination['count'] }}
                            </div>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">Used storage</dt>
                        <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                {{ $destination['storageSpace'] }}
                            </div>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">Destination</dt>
                        <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                {{ $destination['disk'] }}
                            </div>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dt class="text-base font-normal text-gray-900">Healthy</dt>
                        <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                            <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                                {{ $destination['healthy'] ? 'Yes' : 'No' }}
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">

                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            Filename</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date
                                            created</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Size</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @if ($destination['backups'])
                                        @foreach ($destination['backups'] as $backup)
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    {{ $backup['path'] }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $backup['date'] }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $backup['size'] }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <x-button.circle xs light title="Delete" negative rounded
                                                        icon="trash" x-on:click="$openModal('simpleModal')" />
                                                    <x-modal name="simpleModal">
                                                        <x-card title="Delete backup">
                                                            <p class="text-gray-600 text-wrap">This will permanently delete the
                                                                backup file <span class="font-medium">{{ $backup['path'] }}.</span> This action cannot be undone.</p>
                                                            <x-slot name="footer" class="flex justify-end gap-x-4">
                                                                <x-button flat label="Cancel" x-on:click="close" />
                                                                <x-button
                                                                    wire:click="deleteBackup('{{ $backup['path'] }}')"
                                                                    red label="Delete" />
                                                            </x-slot>
                                                        </x-card>
                                                    </x-modal>
                                                    <x-button.circle xs light title="Download" secondary rounded
                                                        icon="arrow-down"
                                                        wire:click="downloadBackup('{{ $backup['path'] }}')" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center text-sm p-2 text-gray-600">Caution: No backups, no
                                                mercy. Prepare for data mayhem!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
