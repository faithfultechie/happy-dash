<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
</head>

<body x-data="{ open: false }" x-cloak class="bg-gray-50">

    <x-notifications />

    <x-alerts />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div x-data="{ open: false }" @keydown.window.escape="open = false">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div x-show="open" class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-900/80"></div>
            <div class="fixed inset-0 flex">

                <div class="relative mr-16 flex w-full max-w-xs flex-1">

                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button type="button" @click="open = false" class="-m-2.5 p-2.5">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <x-mobile-sidebar></x-mobile-sidebar>

                </div>
            </div>
        </div>

        <x-desktop-sidebar></x-desktop-sidebar>

        <div class="lg:pl-72 bg-gray-50">
            <div class="sticky top-0 z-40 lg:px-8 bg-white border-b border-gray-200">
                <div class="flex h-16 items-center gap-x-4 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-0 lg:shadow-none">
                    <button type="button" @click="open = ! open" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    <!-- Separator -->
                    <div class="h-6 w-px bg-gray-200 lg:hidden" aria-hidden="true"></div>

                    <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">

                        <x-search-button></x-search-button>

                        <div class="flex items-center gap-x-4 lg:gap-x-6">

                            <x-notification-button></x-notification-button>

                            <!-- Separator -->
                            <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200" aria-hidden="true"></div>

                            <x-profile></x-profile>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-auto px-8 py-4">
                {{ $slot }}
            </div>
        </div>
    </div>

    @livewireScripts
    @livewire('wire-elements-modal')

    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

</body>

</html>
