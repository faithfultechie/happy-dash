<div>
    <div>
        <x-page-heading pageHeading="Account Management" />
    </div>
    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow mt-5">
        <h2 class="text-xl font-semibold text-slate-700">Change Password</h2>
        <p class="text-slate-500 text-sm mt-2">Please ensure your password is 8 characters with a mix of letters,
            numbers and symbols</p>
        <div class="w-full md:w-5/12" id="change-password">
            <form>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-1 mt-8 mb-2">
                    <div>
                        <x-inputs.password type="password" wire:model="current_password" label="Current password"
                            required />
                    </div>
                    <div>
                        <x-inputs.password type="password" wire:model="password" label="New password" required />
                    </div>
                    <div>
                        <x-inputs.password type="password" wire:model="password_confirmation" label="Confirm password"
                            required />
                    </div>
                </div>
                <x-button md wire:click="updatePassword" class="mt-6 font-medium" blue label="Save change" />
            </form>
        </div>
    </div>
</div>
