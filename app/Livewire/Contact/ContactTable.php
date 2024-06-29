<?php

namespace App\Livewire\Contact;

use Livewire\Component;

// use pagination
use Livewire\WithPagination;
use App\Models\Contact;
use App\Models\Island;
use App\Models\Region;

class ContactTable extends Component
{
    use WithPagination;


    public $islands;
    public $searchContact = '';
    public $regions;

    public function mount()
    {

        $this->regions = Region::all();
        $this->islands = Island::all();
    }

    public function render()
    {
        $contacts = Contact::join('islands', 'contacts.island_id', '=', 'islands.id')
            ->where('contacts.name', 'like', '%' . $this->searchContact . '%')
            ->orWhere('contacts.email', 'like', '%' . $this->searchContact . '%')
            ->orWhere('contacts.phone', 'like', '%' . $this->searchContact . '%')
            ->orWhere('islands.name', 'like', '%' . $this->searchContact . '%')
            ->select('contacts.*') // Select only the contacts columns to avoid column name conflicts
            ->distinct() // Ensure each contact is only returned once
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
