<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    @if (session()->has('success'))
        <div class="alert alert-success">
        </div>
    @endif

    {{-- <livewire:contact.contact-table> --}}
    @livewire('contact.contact-table')
    @include('components.session')




</x-app-layout>
