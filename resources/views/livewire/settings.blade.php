<div>
    <div>
        <x-page-heading pageHeading="Settings" />
    </div>

    <div class="bg-white mx-auto rounded-xl border border-gray-100 shadow-sm mt-5">
        <div
            class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-gray-200 sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
            <div
                class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <div>
                    <span class="inline-flex rounded-lg p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">
                        <a href="{{ route('activity.log') }}" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Activity
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et
                        dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                </div>
                <span class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                    aria-hidden="true">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                </span>
            </div>
            <div
                class="sm:rounded-tr-lg group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <div>
                    <span class="inline-flex rounded-lg p-3 bg-purple-50 text-purple-700 ring-4 ring-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">
                        <a href="{{ $brand ? route('branding.edit', $brand->id) : route('branding.index') }}"
                            class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Personalisation
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et
                        dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                </div>
                <span class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                    aria-hidden="true">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                </span>
            </div>
            <div
                class="group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <div>
                    <span class="inline-flex rounded-lg p-3 bg-sky-50 text-sky-700 ring-4 ring-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">
                        <a href="{{ route('user.index') }}" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Users
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et
                        dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                </div>
                <span class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                    aria-hidden="true">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                </span>
            </div>
            <div
                class="group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <div>
                    <span class="inline-flex rounded-lg p-3 bg-yellow-50 text-yellow-700 ring-4 ring-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>
                    </span>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">
                        <a href="#" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Backup
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et
                        dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                </div>
                <span class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                    aria-hidden="true">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                </span>
            </div>
            <div
                class="sm:rounded-bl-lg group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <div>
                    <span class="inline-flex rounded-lg p-3 bg-rose-50 text-rose-700 ring-4 ring-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">
                        <a href="{{ route('authentication.log') }}" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Authentication Log
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et
                        dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                </div>
                <span class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                    aria-hidden="true">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                </span>
            </div>
            <div
                class="rounded-bl-lg rounded-br-lg sm:rounded-bl-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                <div>
                    <span class="inline-flex rounded-lg p-3 bg-indigo-50 text-indigo-700 ring-4 ring-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900">
                        <a href="#" class="focus:outline-none">
                            <!-- Extend touch target to entire panel -->
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            Help and Support
                        </a>
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et
                        dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                </div>
                <span class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                    aria-hidden="true">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                    </svg>
                </span>
            </div>
        </div>

    </div>

</div>
