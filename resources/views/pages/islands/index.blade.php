<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Islands') }}
        </h2>
    </x-slot>
    <div class="container px-4 w-full overflow-hidden">
        {{-- Rendering all contacts --}}
        @livewire('island.island-table')
    </div>

    @include('components.session')




</x-app-layout>
