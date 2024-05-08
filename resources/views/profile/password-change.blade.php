<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <x-font></x-font>

    <title>{{ $title ?? 'Page Title' }}</title>
    @wireUiScripts
    @livewireStyles
</head>

<body x-data="{ open: false }" x-cloak class="bg-gray-50">
    <x-notifications />

    @if (session()->has('success'))
        <script>
            Wireui.hook('notifications:load', () => {
                window.$wireui.notify({
                    title: 'Success Notification',
                    description: '{{ session('success') }}',
                    icon: 'success'
                })
            })
        </script>
    @endif

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div>
        <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto w-96">
                <div class="bg-white px-6 py-6 shadow-sm sm:rounded-lg">
                    <h2 class="text-center text-2xl font-semibold leading-9 tracking-tight text-gray-900">Change password
                    </h2>
                    <p class="text-gray-500 mt-2 text-sm">Please change your password before
                        logging in
                    </p>
                    <form class="space-y-6" action="{{ route('password-change.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-inputs.password type="password" name="password" label="Password" required />
                        </div>
                        <div>
                            <x-inputs.password type="password" name="password_confirmation" label="Confirm password" required />
                        </div>
                        <div class="py-4">
                            <x-button md class="w-full font-medium leading-6" type="submit" blue
                                label="Confirm password" />
                        </div>
                    </form>
                </div>
            </div>
            <p class="mt-10 text-center text-sm text-gray-500">
                Go back to
                <a href="{{ route('dashboard') }}"
                    class="font-medium leading-6 text-blue-600 hover:text-blue-500">dashboard</a>
            </p>
        </div>
    </div>

    @livewireScripts
</body>

</html>
