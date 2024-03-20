@section('title', 'Account Management')

<x-default>

    <div>
        <x-page-heading pageHeading="Account Management" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <h2 class="text-xl font-semibold text-slate-700">Personal Information</h2>
        <p class="text-slate-500 text-sm mt-2">This information will be displayed publicly</p>
        <div class="w-full md:w-7/12" id="#personal-information">
            <form action="{{ route('user-profile-information.update', Auth::user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="grid gap-5 grid-cols-1 md:grid-cols-1 mt-10 mb-2">
                    <div>
                        <x-input label="Name" name="name" value="{{ Auth::user()->name }}" required />
                    </div>
                    <div>
                        <x-input label="Email" name="email" value="{{ Auth::user()->email }}" required />
                    </div>
                </div>
                <x-button md type="submit" class="mt-6 font-medium leading-6" blue label="Update profile" />
            </form>
            <div class="border-t border-secondary-200 mt-10"></div>
        </div>

        <div class="w-full md:w-7/12" id="change-password">
            <h2 class="text-xl font-semibold text-slate-700 mt-10">Change Password</h2>
            <p class="text-slate-500 text-sm mt-2">Please ensure your password is 8 characters with a mix of letters, numbers
                and symbols</p>
            <form action="{{ route('user-password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-5 grid-cols-1 md:grid-cols-1 mt-8 mb-2">
                    <div>
                        <x-inputs.password type="password" name="current_password" label="Current password" required />
                    </div>
                    <div>
                        <x-inputs.password type="password" name="password" label="New password" required />
                    </div>
                    <div>
                        <x-inputs.password type="password" name="password_confirmation" label="Confirm password"
                            required />
                    </div>
                </div>
                <x-button md type="submit" class="mt-6 font-medium leading-6" blue label="Save change" />
            </form>
        </div>
    </div>
</x-default>
