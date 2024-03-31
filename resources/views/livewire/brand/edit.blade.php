@push('filepondCss')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

<div>
    <div>
        <x-page-heading pageHeading="Personalisation" />
    </div>
    <div class="bg-white mx-auto p-6 rounded-xl border border-gray-100 shadow-sm mt-5">
        <div class="text-right">
            <button type="button" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                <svg class="-ml-0.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <a href="{{ route('settings') }}">Back to settings</a>
            </button>
        </div>
        <div class="text-sm">
            <form wire:submit="save" method="POST">
                <div class="grid gap-5 grid-cols-1 md:grid-cols-2">
                    <div>
                        <x-input label="Site name" wire:model="app_name" />
                    </div>
                </div>

                <div class="grid gap-5 grid-cols-1 md:grid-cols-2 mt-5">
                    <div>
                        <x-textarea label="Footer links" wire:model="footer_links" />
                    </div>
                </div>
                <div class="mt-5">
                    <div class="w-1/5" wire:ignore x-data x-init="FilePond.registerPlugin(FilePondPluginFileValidateType);
                    FilePond.registerPlugin(FilePondPluginImagePreview);
                    FilePond.registerPlugin(FilePondPluginImageValidateSize);
                    FilePond.setOptions({
                        server: {
                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                @this.upload('logo', file, load, error, progress)
                            },
                            revert: (filename, load) => {
                                @this.removeUpload('logo', filename, load)
                            }
                        },
                        acceptedFileTypes: ['image/png', 'image/gif', 'image/jpeg'],
                        labelIdle: `Drag & Drop your picture or <span class='filepond--label-action'>Browse</span>`,

                    });
                    FilePond.create($refs.input, {
                        @if($brand->logo)
                        files: [{
                            source: '{{ asset('uploads/' . $brand->logo) }}',
                            options: {
                                type: 'local'
                            },
                        }],
                        server: {
                            load: (uniqueFileId, load) => {
                                fetch(uniqueFileId)
                                    .then(res => res.blob())
                                    .then(load);
                            },
                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                @this.upload('logo', file, load, error, progress)
                            },
                            revert: (filename, load) => {
                                @this.removeUpload('logo', filename, load)
                            }
                        },
                        @endif
                    });" FilePond.create($refs.input);">
                        <x-input label="Logo" hidden type="file" wire:model="logo" x-ref="input" />
                        <small class="text-xs text-gray-400">Supported files: JPG, PNG</small>
                    </div>
                </div>
                @error('logo')
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
