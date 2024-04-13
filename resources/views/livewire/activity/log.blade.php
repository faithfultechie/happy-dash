<div>
    <div>
        <x-page-heading pageHeading="Activity" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="text-right">
            <button type="button" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <a href="{{ route('settings') }}">Back to settings</a>
            </button>
        </div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <p class="text-sm text-gray-500">The system logs record events and activities, capturing actions
                    taken by users, administrators, or the system itself. </p>
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
                                    Name & email</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">IP
                                    &
                                    browser</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Event & time
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Auditable type
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($audits as $audit)
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="https://api.dicebear.com/7.x/initials/svg?seed={{ $audit->name }}"
                                                    alt="Avatar">
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">
                                                    {{ $audit->name }}</div>
                                                <div class="mt-1 text-gray-500">{{ $audit->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ $audit->ip_address }}</div>
                                        <div class="mt-1 text-gray-500">{{ $agent->browser() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ ucfirst($audit->event) }}
                                        </div>
                                        <div class="mt-1 text-gray-500">
                                            {{ Carbon\Carbon::parse($audit->created_at)->diffForHumans() }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                        {{ $audit->auditable_type }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="my-5">
                        {{ $audits->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
