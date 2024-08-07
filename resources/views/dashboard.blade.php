<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div> --}}

            {{-- @livewire('create-post',[
            'title' => "Hola Mundo desde la vista",
            'user' => 1,
            ]) --}}

            @livewire('formulario')

            <div class="mt-8">
                @livewire('comments')
            </div>
            
        </div>
    </div>
</x-app-layout>
