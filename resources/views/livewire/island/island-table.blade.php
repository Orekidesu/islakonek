<div class="w-full">
    {{-- Stop trying to control. --}}

    <div class="w-full">
        <div class="flex justify-end">
            <x-bladewind::button onclick="showModal('createIsland')">
                Create Island
            </x-bladewind::button>
        </div>
        @include('pages.islands.partials.create-island-form')
    </div>
    <div class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto grid sm:grid-cols-2 md:grid-cols-3 grid-col-1 gap-2">
            @foreach ($islands as $island)
                <div class="max-w-2xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <div class="overflow-hidden">
                        <img src="{{ Storage::url('images/' . $island->image) }}" alt="island photo"
                            class="object-cover w-full h-64 transition-transform duration-500 transform hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div>
                            <div class="flex justify-between items-center ">
                                <p class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400">
                                    {{ $island->region->name }}</p>



                                <div x-data="{ open: false }">
                                    <button @click="open = !open" class="text-gray-500">
                                        <span class="material-symbols-outlined">
                                            more_vert
                                        </span>
                                    </button>
                                    @include('pages.islands.partials.custom-button')

                                </div>
                            </div>
                            <a href="#"
                                class="block mt-2 text-xl font-semibold text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline"
                                tabindex="0" role="link">{{ $island->name }}</a>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ Str::limit($island->description, 50) }}</p>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-between mt-4">
                                        <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline"
                                            tabindex="0" role="link">Read more</a>
                                    </div>

                                </div>
                                {{-- <span class="mx-1 text-xs text-gray-600 dark:text-gray-300">21 SEP 2015</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



</div>
