<div class="mt-5" wire:ignore x-data x-init="FilePond.registerPlugin(
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
    @if($attachment)
    files: [{
        source: '{{ asset('uploads/' . $attachment) }}',
        options: {
            type: 'local'
        },
    }],
    server: {
        load: (uniqueFileId, load) => {
            fetch(uniqueFileId)
                .then(res => res.blob())
                .then(load);
        }
    }
    @endif
});">
    <x-input label="{{ $label }}" hidden type="file" x-ref="input"/>
    <small class="text-xs text-gray-400">{{ $supportedFilesLabel }}</small>
</div>
