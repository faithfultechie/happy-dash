<div>
    <div>
        <x-page-heading pageHeading="Dashboard" />
    </div>

    <div class="bg-white rounded-lg shadow-sm mt-5">
        <div class="px-4 py-8 md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <div class="flex items-center">
                    <img class="hidden h-16 w-16 rounded-full sm:block"
                        src="https://api.dicebear.com/8.x/thumbs/svg?seed={{ Auth::user()->name }}" alt="Avatar">
                    <div>
                        <div class="flex items-center">
                            <img class="h-16 w-16 rounded-full sm:hidden"
                                src="https://api.dicebear.com/8.x/thumbs/svg?seed={{ Auth::user()->name }}"
                                alt="Avatar">
                            <h1 class="ml-3 text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:leading-9">
                                {{ $greetingMessage }}, {{ Auth::user()->name }}</h1>
                        </div>
                        <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                            <dt class="sr-only">Company</dt>
                            <dd class="flex items-center text-sm font-medium capitalize text-gray-400 sm:mr-6">
                                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M4 16.5v-13h-.25a.75.75 0 010-1.5h12.5a.75.75 0 010 1.5H16v13h.25a.75.75 0 010 1.5h-3.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 00-.75-.75h-2.5a.75.75 0 00-.75.75v2.5a.75.75 0 01-.75.75h-3.5a.75.75 0 010-1.5H4zm3-11a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM7.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM11 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zm.5 3.5a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Ghana Maritime Authority
                            </dd>
                            <dt class="sr-only">Account status</dt>
                            <dd
                                class="mt-3 flex items-center text-sm font-medium capitalize text-gray-400 sm:mr-6 sm:mt-0">
                                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-green-400" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                        clip-rule="evenodd" />
                                </svg>
                                Verified account
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 py-8">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Active</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-600">1.2M</dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Archived</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-600">200M</dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Draft</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-600">9.9K</dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Expired</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-600">166.7K</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-4">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">In negotiating</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-600">1.6M</dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Pending</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-600"> 50K</dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Superseeded</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-600">4.9K</dd>
                </dl>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Terminated</dt>
                    <dd class="mt-1 text-3xl leading-9 font-semibold text-blue-600">566.7K</dd>
                </dl>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow my-8">
        <div class="space-y-16 py-5 xl:space-y-10">
            <div>
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h2 class="mx-auto max-w-2xl text-xl font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">
                        Recent activity</h2>
                </div>
                <div class="mt-6 overflow-hidden border-t border-gray-100">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                            <table class="w-full text-left">
                                <thead class="sr-only">
                                    <tr>
                                        <th>Amount</th>
                                        <th class="hidden sm:table-cell">Client</th>
                                        <th>More details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-sm leading-6 text-gray-900">
                                        <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                                            <time datetime="2023-03-22">Today</time>
                                            <div
                                                class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50">
                                            </div>
                                            <div
                                                class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50">
                                            </div>
                                        </th>
                                    </tr>
                                    @forelse ($contracts as $contract)
                                        <tr>
                                            <td class="relative py-5 pr-6">
                                                <div class="flex gap-x-6">
                                                    <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                    </svg>
                                                    <div class="flex-auto">
                                                        <div class="flex items-start gap-x-3">
                                                            <div
                                                                class="text-sm font-medium leading-6 text-gray-900 break-words">
                                                                {{ $contract->title }}</div>

                                                            <div
                                                                class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                                {{ $contract->status }}</div>
                                                        </div>
                                                        <div class="text-sm leading-5 text-gray-500">
                                                            <div class="text-xs leading-6 text-gray-500">
                                                                {{ $contract->created_at->diffForHumans() }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100">
                                                </div>
                                                <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                                            </td>
                                            <td class="hidden py-5 pr-6 sm:table-cell">
                                                <div
                                                    class="flex items-center justify-end gap-x-2 sm:justify-start text-xs">
                                                    <div
                                                        class="flex-none rounded-full p-1 text-green-400 bg-green-400/10">
                                                        <div class="h-1.5 w-1.5 rounded-full bg-current"></div>
                                                    </div>
                                                    <span class="text-gray-600">
                                                        {{ date('d M Y', strtotime($contract->start_date)) }}</span>
                                                </div>
                                                <div
                                                    class="flex items-center justify-end gap-x-2 sm:justify-start mt-1 text-xs">
                                                    <div class="flex-none rounded-full p-1 text-red-400 bg-red-400/10">
                                                        <div class="h-1.5 w-1.5 rounded-full bg-current"></div>
                                                    </div>
                                                    <span class="text-gray-600">
                                                        {{ date('d M Y', strtotime($contract->expiry_date)) }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <p> No records </p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>