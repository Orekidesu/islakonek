<div>
    <form action="{{ route('contacts.search') }}" method="GET" class="mb-4">
        {{-- <form action="{{ route('contacts.search') }}" method="POST" class="mb-4"> --}}
        <div class="relative flex items-center">
            <input type="text" name="query" class="form-control rounded-md" placeholder="Search Contacts...">
            <div>
                <button type="submit" class="pt-1 absolute inset-y-1 end-0 px-3">
                    <span class="material-symbols-outlined">search</span>
                </button>
            </div>
        </div>
    </form>
</div>
