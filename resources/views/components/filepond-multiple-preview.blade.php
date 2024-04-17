<div class="mt-5" wire:ignore x-data x-init="
FilePond.registerPlugin(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginImageValidateSize,
    FilePondPluginFileValidateSize
);
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
    labelIdle: `Drag & Drop your file or <span class='filepond--label-action'>Browse</span>`,
    labelFileTypeNotAllowed: 'File unsupported',
    maxFileSize: '2MB',
});

FilePond.create($refs.input, {
    files: [
        @foreach($attachments as $attachment) {
            source: '{{ asset('uploads/' . $attachment) }}',
            options: {
                type: 'local'
            }
        },
        @endforeach
    ],
    server: {
        load: (uniqueFileId, load) => {
            fetch(uniqueFileId)
                .then(res => res.blob())
                .then(load);
        },
        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
            @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress);
        },
        revert: (filename, load) => {

            @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load);
        }
    }
});"
>
    <x-input label="{{ $label }}" hidden type="file" x-ref="input" multiple="{{ $multipleFiles }}" />
    <small class="text-xs text-gray-400">{{ $supportedFilesLabel }}</small>
</div>
