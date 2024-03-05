<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\County;
use App\Models\SubCounty;

class LivewireTest extends Component
{
    //public $counties;
    //public $selectedCounty = null;
    //public $county = null;
    //public $subcounties = [];
    //public $subcounty;
    public $selectedCounty = null;
    public $subcounties = null;

    public function render()
    {
    //     $all_subcounties = SubCounty::where('county_id', $this->county)->get();
    //    //dd($this->county);
    //     if(!empty($this->county)) {
    //         $this->subcounties = $all_subcounties;
    //     }
        return view('livewire.livewire-test', [
            'counties'=>County::all(),
        ]);
    }
}
