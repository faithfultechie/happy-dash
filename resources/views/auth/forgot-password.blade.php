@extends('components.layouts.section')

@section('content')
    <div class="flex flex-col justify-center">
        <div class="sm:mx-auto w-96">
            <div class="bg-white px-6 py-6 shadow-sm sm:rounded-lg">
                <h2 class="text-center text-2xl font-semibold leading-9 tracking-tight text-gray-900">Forgot password
                </h2>
                <p class="text-gray-500 mt-2 text-sm">Please enter your email and we’ll send you a recovery link to reset
                    your password
                </p>
                <form class="space-y-6" action="{{ route('password.request') }}" method="POST">
                    @csrf
                    <div>
                        <x-input type="email" name="email" label="Email" required />
                    </div>
                    <div class="py-4">
                        <x-button md class="w-full font-semibold leading-6" type="submit" blue label="Send email link" />
                    </div>
                </form>
            </div>

            <p class="mt-10 text-center text-sm text-gray-500">
                Not a member?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-blue-600 hover:text-blue-500">Login</a>
            </p>
        </div>
    </div>
@endsection
