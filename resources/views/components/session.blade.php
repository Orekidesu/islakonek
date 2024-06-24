    @php
        $title = 'Operation Successful'; // Default title
        $message = session('success');

        if (strpos($message, 'created') !== false) {
            $title = 'Contact Created';
        } elseif (strpos($message, 'updated') !== false) {
            $title = 'Contact Updated';
        } elseif (strpos($message, 'deleted') !== false) {
            $title = 'Contact Deleted';
        }
    @endphp

    <x-bladewind::modal type="success" title="{{ $title }}" name="success" cancel_button_label="">
        {{ $message }}
    </x-bladewind::modal>
