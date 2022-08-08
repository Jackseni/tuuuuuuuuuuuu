<?php

namespace App\Http\Livewire;

use App\Models\Risk;
use Livewire\Component;

class RiskRow extends Component
{
    public $risk;
    public $owner_id = 1;
    public $cost = 1;
    public $prevention = 1;

    public function mount(Risk $risk)
    {
        $this->risk = collect($risk)->merge([
            'frequency_label' => Risk::FREQUENCY[$risk['frecuency'] - 1 ]['name'],
            'impact_label' => Risk::IMPACT[$risk['impact'] - 1 ]['name'],
            'risk_label' => $this->getRiskLabel($risk['card']['color']),
            'risk_color' => $risk['card']['color']
        ]);
    }


    public function render()
    {
        return view('livewire.risk-row');
    }

    public function test(){
        ray('asdasdas');
    }



}
