<?php

namespace App\Http\Livewire;

use App\Models\Contingency;
use App\Models\Risk;
use Livewire\Component;

class ContingencyTable extends Component
{
    public $risk;

    protected $listeners = [
        'contingencySelected'
    ];

    public function render()
    {
        return view('livewire.contingency-table',[
            'risks' => Risk::with('contingencies')->get(),
            'contingencies' => Contingency::all()
        ]);
    }

    public function contingencySelected($value,Risk $risk){

        $risk->contingencies()->attach($value);

        session()->flash('success','Contingency selected successfully');

    }

}
