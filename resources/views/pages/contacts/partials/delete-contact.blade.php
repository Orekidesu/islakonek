<div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-bladewind::modal type="danger" title="Confirm Delete" name="confirm-delete" show_action_buttons="false">
        <form id="delete-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <p>Are you sure you want to delete this contact?</p>
            <div class="flex items-center justify-between pt-8">
                <x-bladewind::button onclick="hideModal('confirm-delete')">Cancel</x-bladewind::button>
                <x-bladewind::button type="button" color="red"
                    onclick="submitDeleteForm()">Delete</x-bladewind::button>

            </div>
        </form>
    </x-bladewind::modal>

</div>
