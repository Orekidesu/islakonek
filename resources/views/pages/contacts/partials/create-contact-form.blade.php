<div>
    <x-bladewind::modal size="large" title="Create Contact" name="create-modal" backdrop_can_close="false"
        ok_button_action="createProfile()" ok_button_label="Create" close_after_action="false">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form wire:submit.prevent='store' class="create-contact-form">
            @csrf

            <div class="flex flex-col gap-2">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" wire:model.defer="name" id="name"
                        class="mt-1 focus:ring-gray-800 focus:border-gray-600 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="island" class="block text-sm font-medium text-gray-700">Island</label>
                    <select id="island_id" wire:model.defer="island_id"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-gray-800 focus:border-gray-600 sm:text-sm rounded-md">
                        <option value="">Select an Island</option>
                        @foreach ($islands as $island)
                            <option value="{{ $island->id }}">{{ $island->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" wire:model.defer="phone" id="phone"
                        class="mt-1 focus:ring-gray-800 focus:border-gray-600 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" wire:model.defer="email" id="email"
                        class="mt-1 focus:ring-gray-800 focus:border-gray-600 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Create Contact</button>
        </form>

    </x-bladewind::modal>


</div>
