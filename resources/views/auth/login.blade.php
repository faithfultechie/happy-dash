@extends('components.layouts.section')

@section('content')
    <div class="flex flex-col justify-center">
        <div class="sm:mx-auto w-96">
            <div class="bg-white px-6 py-6 shadow-sm sm:rounded-lg">
                <h2 class="text-center text-2xl font-semibold leading-9 tracking-tight text-gray-900">Login
                </h2>
                <p class="text-center text-sm text-gray-400">to access your dashboard</p>
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <x-input type="email" name="email" label="Email" required />
                    </div>
                    <div>
                        <x-inputs.password type="password" name="password" label="Password" required />
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
                            <label for="remember" class="ml-3 block text-sm leading-6 text-gray-900">Remember me</label>
                        </div>

                        <div class="text-sm leading-6">
                            <a href="{{ url('forgot-password') }}"
                                class="font-semibold text-blue-600 hover:text-blue-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="py-4">
                        <x-button md class="w-full font-semibold leading-6" type="submit" blue label="Sign in" />
                    </div>
                </form>
            </div>

            {{-- <p class="my-5 text-center text-sm text-gray-500">
                Not a member?
                <a href="{{ route('register') }}"
                    class="font-semibold leading-6 text-blue-600 hover:text-blue-500">Register</a>
            </p> --}}
        </div>
    </div>
@endsection
