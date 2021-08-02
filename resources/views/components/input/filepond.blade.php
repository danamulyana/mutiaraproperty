<div 
    wire:ignore
    x-data
    x-cloak
    x-init="
        FilePond.setOptions({
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                },
            },
        });
        
        FilePond.create($refs.input);

    "
>
    <input type="file" x-ref="input">
</div>
