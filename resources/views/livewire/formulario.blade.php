<div>
    <div class="bg-white shadow rounded-lg p-6 mb-8">

        <form wire:submit='save'>
            <div class="mb-4">
                <x-label for="">Nombre</x-label>
                <x-input class="w-full" wire:model='title' required>
                </x-input>
            </div>

            <div class="mb-4">
                <x-label for="">Contenido</x-label>
                <x-textarea class="w-full" wire:model='content' required>
                </x-textarea>
            </div>


            <div class="mb-4">
                <x-label for="">Categoría</x-label>
                <x-select class="w-full" wire:model='category_id'>

                    <option value="" disabled>
                        Seleccione una categoría
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>


            <div class="mb-4">
                <x-label for="">Etiquetas</x-label>

                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model='selectedTags' value="{{ $tag->id }}" />
                                {{ $tag->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div class="flex justify-end">
                <x-button>Crear</x-button>
            </div>

        </form>

    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <ul class="list-disc list-inside space-y-2">
            @foreach ($posts as $post)
                <li class="flex justify-between">
                    {{ $post->title }}

                    <div>
                        <x-button>
                            Editar
                        </x-button>

                        <x-danger-button>
                            Eliminar
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
