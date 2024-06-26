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
    public $contactId;
    public $name;
    public $email;
    public $phone;
    public $island_id;

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

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'required',
            'island_id' => 'required|exists:islands,id',
        ]);

        Contact::create($validatedData);
        session()->flash('success', 'Contact created successfully.');


        return $this->redirect(route('contacts.index'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required',
            'island_id' => 'required',
        ]);

        $contact->update($request->all());
        // return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }
}
