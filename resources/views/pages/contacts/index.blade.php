<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="container px-4 mx-auto w-full overflow-hidden">
        {{-- Rendering all contacts --}}
        <div class="flex flex-col mt-6">
            <div class="flex justify-end pb-2">


                <x-bladewind::button onclick="showModal('create-modal')">
                    <div class="items-center flex">
                        <span class="material-symbols-outlined">
                            add
                        </span>

                        <span class="ml-2">
                            Add Contact
                        </span>

                    </div>

                </x-bladewind::button>

                @include('pages.contacts.partials.create-contact-form')


            </div>
            <div class="mx-0 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 rounded-md  md:rounded-lg">
                        <div
                            class="bg-gray-800 border border-b-gray-700 border-t-0 border-l-0 border-r-0 divide-gray-200 flex justify-end p-2 ">

                            {{-- input search --}}
                            <div>
                                <input type="search" name="" id="" placeholder="search here"
                                    class="rounded-md">

                            </div>
                            {{-- filter --}}


                        </div>
                        <div>
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-slate-50 dark:bg-gray-800 ">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-md   font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-x-3">

                                                <span>Name</span>
                                            </div>
                                        </th>

                                        <th scope="col"
                                            class="px-12 py-3.5 text-md  font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Phone
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-md   font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <button class="flex items-center gap-x-2">
                                                <span>Email</span>

                                            </button>
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-md   font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Island
                                        </th>


                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Edit & Delete</span>
                                        </th>

                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Delete</span>
                                        </th>




                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($contacts as $contact)
                                        <tr class="hover:bg-gray-600">
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center gap-x-3">

                                                    <div class="flex items-center gap-x-2">

                                                        <div>
                                                            <h2 class="font-medium text-gray-800 dark:text-white ">
                                                                <a
                                                                    href="{{ route('contacts.show', ['contact' => $contact]) }}">
                                                                    {{ $contact->name }}
                                                                </a>
                                                            </h2>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div
                                                    class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                    <h2 class="text-sm font-normal text-emerald-500">
                                                        {{ $contact->phone }}
                                                    </h2>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $contact->email }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $contact->island->name }}</td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">

                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-6">
                                                    {{-- 
                                                    <a href="{{ route('contacts.edit', ['contact' => $contact]) }}"
                                                        class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                        <span class="material-symbols-outlined">
                                                            edit_square
                                                        </span>
                                                    </a> --}}
                                                    {{-- <div class="h-12 w-20 flex items-center">
                                                        <x-bladewind::button onclick="showModal('large-modal')">
                                                            <span class="material-symbols-outlined">
                                                                edit_square
                                                            </span>
                                                        </x-bladewind::button>
                                                    </div> --}}
                                                    <x-bladewind::button onclick="showEditModal({{ $contact->id }})">
                                                        <div class="items-center flex">
                                                            <span class="material-symbols-outlined">edit_square</span>
                                                        </div>
                                                    </x-bladewind::button>
                                                    @include('pages.contacts.partials.update-contact-form')





                                                    <form
                                                        action="{{ route('contacts.destroy', ['contact' => $contact]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none"><span
                                                                class="material-symbols-outlined">
                                                                delete
                                                            </span></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pagination --}}

        <div class="flex items-center justify-center mt-6">


            <div class="flex items-center justify-center gap-x-3">
                {{ $contacts->links() }}
            </div>


        </div>
    </div>
</x-app-layout>
