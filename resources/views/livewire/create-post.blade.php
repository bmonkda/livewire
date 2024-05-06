<div>
    {{-- <h1>{{ $name }}</h1> --}}

    <div>
        {{-- 
            wire:model se actualiza la propiedad al ejecutar el método
            wire:model.live se actualiza la propiedad tan pronto se escriba (tiempo real)
        --}}
        <x-input type="text" wire:model.live='name' />

        <x-button wire:click='save'>Save</x-button>
    </div>
    <div>
        {{ $name }}
    </div>

</div>