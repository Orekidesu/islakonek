<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Island;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class ContactTable extends Component
{
    use WithPagination;

    public $islands;

    public function mount()
    {
        $this->islands = Island::all();
    }

    public function render()
    {
        // Load contacts here and pass them to the view
        $contacts = Contact::paginate(5);
        return view('livewire.contact.contact-table', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'required',
            'island_id' => 'required|exists:islands,id',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'island_id' => $request->input('island_id'),
        ]);

        // No need to update $contacts here since it's loaded in render()
    }
}
