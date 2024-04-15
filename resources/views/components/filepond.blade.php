<div class="mt-5" wire:ignore x-data x-init="
FilePond.registerPlugin(FilePondPluginFileValidateType);
FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.registerPlugin(FilePondPluginImageValidateSize);
FilePond.registerPlugin(FilePondPluginFileValidateSize);
FilePond.setOptions({
    server: {
        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
            @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
        },
        revert: (filename, load) => {
            @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
        }
    },
    acceptedFileTypes: {{ json_encode($acceptedFileTypes) }},
    labelIdle: `Drag & Drop your picture or <span class='filepond--label-action'>Browse</span>`,
    labelFileTypeNotAllowed: 'File unsupported',
    maxFileSize: '2MB',
});
FilePond.create($refs.input);">
    <x-input label="{{ $label }}" hidden type="file" x-ref="input" multiple="{{ $multipleFiles }}" />
    <small class="text-xs text-gray-400">{{ $supportedFilesLabel }}</small>
</div>
