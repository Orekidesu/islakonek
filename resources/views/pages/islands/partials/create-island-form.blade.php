<div>
    <x-bladewind::modal backdrop_can_close="false" name="createIsland" ok_button_action="createIsland()"
        ok_button_label="create" close_after_action="false" size="large">

        <form method="post" action="{{ route('islands.store') }}" class="create-island-form" enctype="multipart/form-data">
            @csrf
            <b class="mt-0">Create New Island</b>
            <div class="flex gap-2 flex-col">
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <x-bladewind::input required="true" name="name" error_message="Island Name is required"
                        label="Island Name" class="rounded-lg" />

                    {{-- regions --}}
                    <div>
                        <select name="region_id" class="bw-raw-select" id="region_id" required>
                            <option value="">Select a Region</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="grid grid-cols-2 grid-2 gap-4">
                    <div>
                        <x-bladewind::input numeric="true" name="population" error_message="Minimum value is 1"
                            min="1" label="Population" class="rounded-lg" />
                    </div>
                    <div>
                        <x-bladewind::input numeric="true" name="area_sq_km" label="Area per square meter"
                            class="rounded-lg" />
                    </div>
                </div>



                <div class="h-100 w-full">
                    {{-- input type should be a text area --}}
                    <x-bladewind::textarea label="Description" name="description" />
                </div>
                <div>
                    <label for="image">Upload image</label>
                    {{-- input type upload image --}}
                    <x-bladewind::input type="file" name="image" required="true" />
                    <x-input-error for="image" :messages="$errors->get('image')" />
                </div>

            </div>

        </form>

    </x-bladewind::modal>
</div>
