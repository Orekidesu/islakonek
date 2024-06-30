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
    public $selectedIsland = '';
    public function mount()
    {

        $this->regions = Region::all();
        $this->islands = Island::all();
    }

    // public function render()
    // {

    //     $contacts = Contact::join('islands', 'contacts.island_id', '=', 'islands.id')
    //         ->when($this->selectedIsland, function ($query) {
    //             $query->where('contacts.island_id', $this->selectedIsland);
    //         })
    //         ->where(function ($query) {
    //             $query->where('contacts.name', 'like', '%' . $this->searchContact . '%')
    //                 ->orWhere('contacts.email', 'like', '%' . $this->searchContact . '%')
    //                 ->orWhere('contacts.phone', 'like', '%' . $this->searchContact . '%')
    //                 ->orWhere('islands.name', 'like', '%' . $this->searchContact . '%');
    //         })
    //         ->select('contacts.*')
    //         ->distinct()
    //         ->paginate(5);

    //     return view('livewire.contact.contact-table', compact('contacts'));
    // }

    public function render()
    {
        $contacts = $this->queryContacts()->paginate(5);

        return view('livewire.contact.contact-table', compact('contacts'));
    }

    protected function queryContacts()
    {
        $query = Contact::join('islands', 'contacts.island_id', '=', 'islands.id')
            ->select('contacts.*')
            ->distinct();

        $query = $this->applyIslandFilter($query);
        $query = $this->applySearch($query);

        return $query;
    }

    protected function applyIslandFilter($query)
    {
        if ($this->selectedIsland) {
            $query->where('contacts.island_id', $this->selectedIsland);
        }

        return $query;
    }

    protected function applySearch($query)
    {
        if ($this->searchContact) {
            $query->where(function ($query) {
                $query->where('contacts.name', 'like', '%' . $this->searchContact . '%')
                    ->orWhere('contacts.email', 'like', '%' . $this->searchContact . '%')
                    ->orWhere('contacts.phone', 'like', '%' . $this->searchContact . '%')
                    ->orWhere('islands.name', 'like', '%' . $this->searchContact . '%');
            });
        }

        return $query;
    }

    public function updating($key): void
    {
        if ($key === 'searchContact' || $key === 'selectedIsland') {
            $this->resetPage();
        }
    }
}
