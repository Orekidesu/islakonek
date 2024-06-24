<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset



        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

    </div>
</body>

</html>
<script>
    // the script called by the Update button
    createProfile = () => {
        if (validateForm('.create-contact-form')) {
            domEl('.create-contact-form').submit();
        } else {
            return false;
        }
    }
    updateProfile = () => {
        if (validateForm('.update-contact-form')) {
            domEl('.update-contact-form').submit();
        } else {
            return false;
        }
    }


    function showEditModal(contactId) {
        fetch(`/contacts/${contactId}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('contact_id').value = data.contact.id;
                document.getElementById('edit-name').value = data.contact.name;
                document.getElementById('edit-phone').value = data.contact.phone;
                document.getElementById('edit-email').value = data.contact.email;
                document.getElementById('edit-island_id').value = data.contact.island_id;
                showModal('edit-contact-modal');
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            showModal('success');
        @endif
    });

    function showConfirmDeleteModal(contactId) {
        document.getElementById('delete-form').action = `/contacts/${contactId}`;
        showModal('confirm-delete');
    }

    function submitDeleteForm() {
        document.getElementById('delete-form').submit();
    }
</script>