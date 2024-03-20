@extends('components.layouts.section')

@section('content')
    <div class="flex flex-col justify-center">
        <div class="sm:mx-auto w-96">
            <div class="bg-white px-6 py-6 shadow-sm sm:rounded-lg">
                <h2 class="text-center text-2xl font-semibold leading-9 tracking-tight text-gray-900">Two Factor
                    Challenge
                </h2>
                <p class="text-gray-500 mt-2 text-sm">
                    Please enter the authentication code provided by your authenticator application
                </p>
                <form action="{{ url('two-factor-challenge') }}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <x-input type="text" name="code" label="Code" required />
                    </div>
                    <div class="py-6">
                        <x-button md class="w-full font-medium leading-6" type="submit" blue
                            label="Confirm authentication code" />
                    </div>
                </form>
                <div class="relative my-5">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm font-medium leading-6">
                        <span class="bg-white px-6 text-gray-900">Or continue with recovery code</span>
                    </div>
                </div>
                <p class="text-gray-500 mt-2 text-sm">
                    Please enter one of your emergency recovery
                    codes provided
                </p>
                <form action="{{ url('two-factor-challenge') }}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <x-input type="text" name="recovery_code" label="Code" required />
                    </div>
                    <div class="py-6">
                        <x-button md class="w-full font-medium leading-6" type="submit" blue
                            label="Confirm recovery code" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
