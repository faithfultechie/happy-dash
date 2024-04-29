@push('filepondCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

<div>
    <div>
        <x-page-heading pageHeading="Create Ticket" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="w-full md:w-9/12">
            <div class="text-right">
                <button type="button"
                    class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                    <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    <a href="{{ route('ticket.index') }}">Back to tickets</a>
                </button>
            </div>
            <form wire:submit="save" method="POST">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-1 mt-5">
                    <div>
                        <x-input label="Title" wire:model="title" />
                    </div>
                </div>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <div class="mt-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Priority</label>
                        <fieldset class="mt-2">
                            <legend class="sr-only">Priority</legend>
                            <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                <div class="flex items-center">
                                    <x-radio id="low" label="Low" wire:model="priority" value="low" />
                                </div>
                                <div class="flex items-center">
                                    <x-radio id="medium" label="Medium" wire:model="priority" value="medium" />
                                </div>
                                <div class="flex items-center">
                                    <x-radio id="high" label="High" wire:model="priority" value="high" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Status</label>
                        <fieldset class="mt-2">
                            <legend class="sr-only">Status</legend>
                            <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                <div class="flex items-center">
                                    <x-radio id="open" label="Open" wire:model="status" value="open" />
                                </div>
                                <div class="flex items-center">
                                    <x-radio id="closed" label="Closed" wire:model="status" value="closed" />
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="border-t border-gray-200 my-6"></div>

                <div class="grid gap-5 grid-cols-1 md:grid-cols-1 mt-5">
                    <div>
                        <x-textarea label="Message" wire:model="message" />
                    </div>
                </div>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <x-filepond-upload label="Attachments" multipleFiles="true" :acceptedFileTypes="['image/png', 'image/jpeg']"
                        supportedFilesLabel="Supported image formats: JPG, PNG" wire:model="attachments" />
                    @error('attachments.*')
                        <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
                    @enderror
                </div>
                <x-button md wire:click="save" class="mt-6 font-medium leading-6" blue label="Save changes" />
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
