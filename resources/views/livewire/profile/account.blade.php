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
        <div class="w-full md:w-5/12" id="#personal-information">
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
                <x-button md wire:click="updateProfile" class="mt-6 font-medium" blue label="Update profile" />
            </form>
        </div>
        <div class="border-t border-secondary-200 mt-10"></div>
        <div class="w-full md:w-8/12" id="change-password">
            <h2 class="text-xl font-semibold text-red-700 mt-10">Delete Account</h2>
            <p class="text-slate-600 text-sm mt-2"> Are you sure you want to delete your account? This action is
                irreversible and will remove all your data associated with this account. If you proceed, you will lose
                access to your account and all related information.</p>
            <p class="text-slate-600 text-sm mt-2"> Please consider the following before proceeding: </p>
            <ul class="list-disc text-slate-600 text-sm mt-2 ml-5">
                <li> Once deleted, your account cannot be recovered.</li>
                <li>You will lose access to any saved preferences, settings, and content.</li>
                <li>
                    Any associated subscriptions, purchases, or memberships may also be affected.</li>
            </ul>
            <x-button outline negative class="mt-6 font-medium" icon="trash" label="Proceed to delete account"
                x-on:click="$openModal('simpleModal')" />
            <x-modal name="simpleModal">
                <x-card title="Delete account">
                    <p class="text-gray-600 text-wrap text-sm">To confirm account deletion, please enter your password
                    </p>
                    <div class="w-full md:w-5/12 mt-2">
                        <x-inputs.password type="password" wire:model.defer="password" />
                    </div>
                    <p class="text-gray-600 text-wrap text-sm mt-5">Alternatively, you can deactivate your account.
                    <ul class="list-disc text-slate-600 text-sm mt-2 ml-5">
                        <li>This will temporarily suspend your access to the platform. </li>
                        <li>Your profile and data will remain saved </li>
                        <li> You can reactivate your account later by sending an email to <a
                                href="mailto:hello@cooldash.com"><span class="text-underline font-medium">
                                    hello@cooldash.com</span></a></li>
                    </ul>
                    </p>
                    <x-slot name="footer" class="flex justify-end gap-x-4">
                        <x-button flat label="Cancel" x-on:click="close" />
                        <x-button outline blue label="Deactivate" wire:click="deactivateAccount" />
                        <x-button red label="Delete forever" wire:click="deleteAccount" />
                    </x-slot>
                </x-card>
            </x-modal>
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
