@push('filepondCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

<div>
    <div>
        <x-page-heading pageHeading="Add Document" />
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
                    <a href="{{ route('document.index') }}">Back to documents</a>
                </button>
            </div>
            <form wire:submit="save" method="POST">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <div>
                        <x-input label="Title" wire:model="title" />
                    </div>
                    <div>
                        <x-select label="Company" placeholder="Select option" :options="$this->company"
                            wire:model.defer="company_id" option-label="name" option-value="id" />
                        <div class="mt-1">
                            <button type="button" wire:click="$dispatch('openModal', {component: 'add-company-modal'})"
                                class="rounded-full bg-blue-800 p-1 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-3 mt-5">
                    <div>
                        <x-input label="Code" type="text" wire:model="code" />
                    </div>
                    <div>
                        <x-input label="Expiry date" type="date" wire:model="expiry_date" />
                    </div>
                    <div>
                        <x-select label="Status" placeholder="Select status" :options="['Active', 'Archived', 'Draft', 'Pending', 'Terminated']"
                            wire:model="status" />
                    </div>
                </div>
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <div wire:ignore x-data x-init="FilePond.registerPlugin(FilePondPluginFileValidateType);
                    FilePond.registerPlugin(FilePondPluginImagePreview);
                    FilePond.registerPlugin(FilePondPluginImageValidateSize);
                    FilePond.setOptions({
                        server: {
                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                @this.upload('document_filepath', file, load, error, progress)
                            },
                            revert: (filename, load) => {
                                @this.removeUpload('document_filepath', filename, load)
                            }
                        },
                        acceptedFileTypes: ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
                    });
                    FilePond.create($refs.input);">
                        <x-input label="Attachments" type="file" wire:model="document_filepath" x-ref="input" />
                        <small class="text-xs text-gray-400">Supported formats: PDF, WORD</small>
                    </div>
                </div>
                @error('document_filepath')
                    <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
                @enderror
                <x-button md wire:click="save" class="mt-6" blue label="Save changes" />
            </form>
        </div>
    </div>
</div>

@push('filepondJs')
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@endpush
