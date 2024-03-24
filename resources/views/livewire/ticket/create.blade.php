<div>
    <div>
        <x-page-heading pageHeading="Create Ticket" />
    </div>

    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="w-full md:w-9/12">
            <div class="text-right">
                <button type="button"
                    class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                    <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    <a href="{{ route('contract.index') }}">Back to tickets</a>
                </button>
            </div>
            <form wire:submit="save" method="POST">
                <div class="rounded-full h-6 w-6 bg-gray-400 flex items-center justify-center">
                    <span class="text-white text-sm font-medium">1</span>
                </div>
                <p class="mt-1 max-w-2xl text-md leading-6 text-gray-500">Contract details</p>
                <div class="w-full border-t border-gray-300 my-4"></div>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-1">
                    <div>
                        <x-input label="Title" wire:model="title" />
                    </div>
                </div>

                <div class="mt-10 rounded-full h-6 w-6 bg-gray-400 flex items-center justify-center">
                    <span class="text-white text-sm font-medium">2</span>
                </div>
                <p class="mt-1 max-w-2xl text-md leading-6 text-gray-500">Contract lifecycle</p>
                <div class="w-full border-t border-gray-300 my-4"></div>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-3 mt-5">
                    <div>
                        <x-input label="Start date" type="date" wire:model="start_date" />
                    </div>
                    <div>
                        <x-input label="Expiry date" type="date" wire:model="expiry_date" />
                    </div>
                    <div>
                        <x-select label="Select Status" placeholder="Select one status" :options="[
                            'Active',
                            'Archived',
                            'Draft',
                            'Expired',
                            'In-negotiating',
                            'Pending',
                            'Superseeded',
                            'Terminated',
                        ]"
                            wire:model="status" />
                    </div>
                    <div>
                        <x-input label="Contact person" wire:model="contact_person" />
                    </div>
                    <div>
                        <x-input label="Scope" wire:model="scope" />
                    </div>
                </div>

                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <div>
                        <x-textarea label="Comment" wire:model="comment" />
                    </div>
                </div>

                <div class="mt-10 rounded-full h-6 w-6 bg-gray-400 flex items-center justify-center">
                    <span class="text-white text-sm font-medium">3</span>
                </div>
                <p class="mt-1 max-w-2xl text-md leading-6 text-gray-500">Attachments</p>
                <div class="w-full border-t border-gray-300 my-4"></div>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2">
                    <div wire:ignore x-data x-init="FilePond.registerPlugin(FilePondPluginFileValidateType);
                    FilePond.registerPlugin(FilePondPluginImagePreview);
                    FilePond.registerPlugin(FilePondPluginImageValidateSize);
                    FilePond.setOptions({
                        server: {
                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                @this.upload('contract_filepath', file, load, error, progress)
                            },
                            revert: (filename, load) => {
                                @this.removeUpload('contract_filepath', filename, load)
                            }
                        },
                        acceptedFileTypes: ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
                    });
                    FilePond.create($refs.input);">
                        <x-input label="" type="file" wire:model="contract_filepath"
                            x-ref="input" />
                        <small class="text-xs text-gray-400">Supported files: jpg, png</small>
                    </div>
                </div>
                @error('contract_filepath')
                    <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
                @enderror
                <x-button md wire:click="save" class="mt-6" blue label="Save changes" />
            </form>
        </div>
    </div>

</div>
