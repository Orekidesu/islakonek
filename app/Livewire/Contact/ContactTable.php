<?php

namespace App\Livewire\Contact;

use Livewire\Component;

// use pagination
use Livewire\WithPagination;
use App\Models\Contact;
use App\Models\Island;


class ContactTable extends Component
{
    use WithPagination;


    public $islands;
    public $contactId;
    public $name;
    public $email;
    public $phone;
    public $island_id;
    public $searchContact = '';

    public function mount()
    {
        $this->islands = Island::all();
    }

    public function render()
    {
        // Load contacts here and pass them to the view
        $contacts = Contact::where('name', 'like', '%' . $this->searchContact . '%')
            ->orWhere('email', 'like', '%' . $this->searchContact . '%')
            ->orWhere('phone', 'like', '%' . $this->searchContact . '%')
            ->orWhere('phone', 'like', '%' . $this->searchContact . '%')
            ->paginate(5);
        return view('livewire.contact.contact-table', compact('contacts'));
    }

    public function updating($key): void
    {
        if ($key === 'searchContact') {
            $this->resetPage();
        }
    }
}
