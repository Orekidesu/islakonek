<?php

namespace App\Livewire\Island;

use Livewire\Component;

use App\Models\Island;
use App\Models\Region;



class IslandTable extends Component
{
    public $regions;
    public $islands;


    public function mount()
    {

        $this->regions = Region::all();
        // $this->regions = Region::all()->map(function ($region) {
        //     return [
        //         'label' => $region->name, 
        //         'value' => $region->code  
        //     ];
        // });


        $this->islands = Island::all();
    }
    public function render()
    {
        $islands = Island::join('regions', 'islands.region_id', '=', 'regions.id')
            ->select('islands.*')
            ->distinct()
            ->get();

        return view('livewire.island.island-table', compact('islands'));
    }
}
