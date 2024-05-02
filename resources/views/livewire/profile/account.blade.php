@push('filepondCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

<div>
    <div>
        <x-page-heading pageHeading="Account Management" />
    </div>
    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow mt-5">
        <h2 class="text-xl font-semibold text-slate-700">Personal Information</h2>
        <p class="text-slate-500 text-sm mt-2">This information will be displayed publicly</p>
        <div class="w-full md:w-7/12" id="#personal-information">
            <form>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-1 mt-10 mb-2">
                    <div>
                        <x-input label="Name" wire:model="name" />
                    </div>
                    <div>
                        <x-input label="Email" type="email" wire:model="email" />
                    </div>
                    <div>
                        <x-input label="Username" wire:model="username" />
                    </div>
                    <div class="w-2/5">
                        <x-filepond-single-preview label="Profile photo" :acceptedFileTypes="['image/png', 'image/jpeg']"
                            supportedFilesLabel="Supported format: JPG, PNG" wire:model="profile_photo"
                            :attachment="$user->profile_photo" />
                    </div>
                </div>
                <x-button md wire:click="updateProfile" class="mt-6 font-medium" blue
                    label="Update profile" />
            </form>
            <div class="border-t border-secondary-200 mt-10"></div>
        </div>

        <div class="w-full md:w-7/12" id="change-password">
            <h2 class="text-xl font-semibold text-slate-700 mt-10">Change Password</h2>
            <p class="text-slate-500 text-sm mt-2">Please ensure your password is 8 characters with a mix of letters,
                numbers
                and symbols</p>
            <form>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-1 mt-8 mb-2">
                    <div>
                        <x-inputs.password type="password" wire:model="current_password" label="Current password" required />
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

@push('filepondJs')
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@endpush
