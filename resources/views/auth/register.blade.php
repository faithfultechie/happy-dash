@extends('components.layouts.section')

@section('content')
    <div class="flex flex-col justify-center">
        <div class="sm:mx-auto w-96">
            <div class="bg-white px-6 py-6 shadow-sm sm:rounded-lg">
                <h2 class="text-center text-2xl font-semibold leading-9 tracking-tight text-gray-900">Create account
                </h2>
                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <x-input type="text" name="name" label="Name" value="{{ old('name') }}" required />
                    </div>
                    <div>
                        <x-input type="email" name="email" label="Email" value="{{ old('email') }}" required />
                    </div>
                    <div>
                        <x-inputs.password type="password" name="password" label="Password" required />
                    </div>
                    <div>
                        <x-inputs.password type="password" name="password_confirmation" label="Confirm password" required />
                    </div>
                    <div class="py-4">
                        <x-button md class="w-full font-semibold leading-6" type="submit" blue label="Register" />
                    </div>
                </form>
            </div>

            <p class="my-5 text-center text-sm text-gray-500">
                Not a member?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-blue-600 hover:text-blue-500">Login</a>
            </p>
        </div>
    </div>
@endsection
