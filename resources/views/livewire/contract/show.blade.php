<div>
    <div>
        <x-page-heading pageHeading="Contract Information" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-md mt-5">
        <div>
            <div class="border-b border-gray-200 bg-white">
                <div class="flex flex-wrap items-center justify-between sm:flex-nowrap mb-5">
                    <div>
                        <h3 class="text-base font-semibold leading-7 text-gray-800 uppercase">{{ $contract->title }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Contract details and lifecycle</p>
                    </div>
                    <div class="ml-4 mt-4 flex-shrink-0">
                        <a class="relative inline-flex items-center rounded-md bg-blue-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-blue-500 focus-visible:outline"
                            href="{{ route('contract.edit', $contract->id) }}">Edit
                        </a>
                        <a class="ml-4 relative inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-gray-500 hover:text-gray-800"
                            href="{{ route('contract.index') }}">Back to contracts
                        </a>
                    </div>
                </div>
            </div>

            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex items-center justify-between gap-x-6 py-5">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <p class="text-sm font-semibold leading-6 text-gray-900">Contract Status</p>
                            <p
                                class="rounded-md whitespace-nowrap mt-0.5 px-2 py-0.5 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                {{ $contract->status }}</p>
                        </div>
                        <div class="mt-2 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                            <p class="whitespace-nowrap">Starts on <span
                                    class="text-sm underline">{{ date('', strtotime($contract->start_date)) }}</span>
                            </p>
                            <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="truncate">Expires on <span
                                    class="text-sm underline">{{ date('d M Y', strtotime($contract->expiry_date)) }}</span>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="bg-gray-50 px-4 py-6 grid grid-cols-3 sm:gap-2 sm:px-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Company name</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-1 sm:mt-0">
                            {{ $contract->company->name }}</dd>
                    </div>
                    <div class="bg-white px-4 py-6 grid grid-cols-3 sm:gap-4 sm:px-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Category</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $contract->category->name }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-6 grid grid-cols-3 sm:gap-4 sm:px-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Department</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $contract->department->name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-6 grid grid-cols-3 sm:gap-4 sm:px-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Contact person</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $contract->contact_person }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-6 grid grid-cols-3 sm:gap-4 sm:px-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Scope</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $contract->scope }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Attachments</dt>
                        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @if (isset($contract->contract_filepath))
                                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                        <div class="flex w-0 flex-1 items-center">
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                <span
                                                    class="truncate font-medium">{{ $contract->contract_filename }}</span>
                                                <span
                                                    class="flex-shrink-0 text-gray-400">{{ number_format($contract->contract_filesize / 1048576, 2) }}
                                                    mb</span>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="{{ asset('app/public/' . $contract->contract_filepath) }}"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <p class="text-red-400">No file present</p>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

</div>
