<div class="flex flex-row items-center gap-3">
    <div class="relative flex items-center">
        <input type="text" wire:model.live='searchContact' class="form-control rounded-md"
            placeholder="Search Contacts...">
        <div>
            <button type="submit" class="pt-1 absolute inset-y-1 end-0 px-3">
                <span class="material-symbols-outlined">search</span>
            </button>
        </div>
    </div>

    <div x-data="{ open: false }">
        <button @click="open = !open" class="text-gray-500">
            <img src="{{ asset('vendor/bladewind/images/filter.svg') }}" alt="filter icon">
        </button>

        <div x-show="open" @click.away="open = false"
            class="origin-top-right absolute right-1 mt-5 w-30 mr-12 rounded-md shadow-lg z-10 bg-gray-600 text-gray-100"
            style="display: none;">
            <div class="p-2">
                <ul>
                    <li class="p-2 hover:bg-gray-200 hover:text-gray-700 transition duration-300 cursor-pointer"
                        wire:click="$set('selectedIsland', '')">Select Island</li>
                    @foreach ($islands as $island)
                        <li @click.away="open = false"
                            class="p-2 hover:bg-gray-200 hover:text-gray-700 transition duration-300 cursor-pointer"
                            wire:click="$set('selectedIsland', '{{ $island->id }}')">
                            {{ $island->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
