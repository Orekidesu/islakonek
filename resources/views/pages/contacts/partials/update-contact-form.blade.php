<div>
    <x-bladewind::modal size="large" title="Edit Contact" name="edit-contact-modal" backdrop_can_close="false"
        ok_button_action="document.querySelector('.update-contact-form').submit()" ok_button_label="Update"
        close_after_action="false">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <form action="{{ route('contacts.update', ['contact' => $contact]) }}" method="POST" class="update-contact-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="contact_id" id="contact_id">

            <div class="flex flex-col gap-2">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="edit-name" value=""
                        class="mt-1 focus:ring-gray-800 focus:border-gray-600 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="island_id" class="block text-sm font-medium text-gray-700">Island</label>
                    <select id="edit-island_id" name="island_id"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-gray-800 focus:border-gray-600 sm:text-sm rounded-md">
                        <option value="">Select an Island</option>
                        @foreach ($islands as $island)
                            <option value="{{ $island->id }}">{{ $island->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="edit-phone" value=""
                        class="mt-1 focus:ring-gray-800 focus:border-gray-600 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email" id="edit-email" value=""
                        class="mt-1 focus:ring-gray-800 focus:border-gray-600 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
        </form>
    </x-bladewind::modal>
    <x-bladewind::modal type="success" title="Contact Updated" name="success" cancel_button_label="">
        {{ session('success') }}
    </x-bladewind::modal>
</div>
