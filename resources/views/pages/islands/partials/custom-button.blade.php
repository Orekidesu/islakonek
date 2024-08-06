<div>
    <div x-show="open" @click.away="open = false"
        class="origin-top-right absolute  mt-2 w-30 mr-0 rounded-md shadow-lg z-10 bg-gray-600 text-gray-100"
        style="display: none;">
        <div class="p-2">
            <ul>
                <li class="p-2 hover:bg-gray-200 hover:text-gray-700 transition duration-300 cursor-pointer">Edit</li>
                <li class="p-2 hover:bg-gray-200 hover:text-gray-700 transition duration-300 cursor-pointer">Delete</li>
            </ul>
        </div>
    </div>
</div>
