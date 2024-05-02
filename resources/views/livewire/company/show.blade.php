<div>
    <div>
        <x-page-heading pageHeading="Company" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="border-b border-gray-200 bg-white">
            <div class="flex flex-wrap items-center justify-between sm:flex-nowrap mb-5">
                <div>
                    <h3 class="text-base font-semibold leading-7 text-gray-900 uppercase">{{ $company->name }}
                    </h3>
                </div>
                <div class="ml-4 mt-4 flex-shrink-0">
                    <button type="button" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                        <svg class="-ml-0.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                        <a href="{{ route('company.index') }}" class="text-sm">Back to companies</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="bg-gray-50 px-4 py-6 grid grid-cols-3 sm:gap-2 sm:px-3">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Contact</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-1 sm:mt-0">
                        {{ $company->contact }}</dd>
                </div>
                <div class="bg-white px-4 py-6 grid grid-cols-3 sm:gap-4 sm:px-3">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $company->address }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-6 grid grid-cols-3 sm:gap-2 sm:px-3">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-1 sm:mt-0">
                        <a href="mailto:{{ $company->email }}" class="underline">{{ $company->email }}</a></dd>
                </div>
            </dl>
        </div>

        <div class="sm:flex sm:items-center mt-12">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Document history</h1>
                <p class="mt-2 text-sm text-gray-500">A recorded history of all documentations
                </p>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Title & category</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Start & expiry date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($contracts as $contract)
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $contract->title }}</div>
                                                <div class="mt-1 text-gray-500">{{ $contract->category->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="flex items-center justify-end gap-x-2 sm:justify-start">
                                            <div class="flex-none rounded-full p-1 text-green-400 bg-green-400/10">
                                                <div class="h-1.5 w-1.5 rounded-full bg-current"></div>
                                            </div>{{ date('d M Y', strtotime($contract->start_date)) }}
                                        </div>
                                        <div class="flex items-center justify-end gap-x-2 sm:justify-start mt-1">
                                            <div class="flex-none rounded-full p-1 text-red-400 bg-red-400/10">
                                                <div class="h-1.5 w-1.5 rounded-full bg-current"></div>
                                            </div> {{ date('d M Y', strtotime($contract->expiry_date)) }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $contract->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
