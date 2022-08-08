<?php

namespace App\Http\Livewire;

use App\Models\Risk;
use Livewire\Component;

class RiskTableComponent extends Component
{


    protected $listeners = [
        'ownerSelected',
        'costSelected',
        'preventionSelected',
        'actionSelected'
    ];


    private function getRiskLabel($color){

        return match($color){
            Risk::GREEN => 'Bajo',
            Risk::BLUE => 'Moderado',
            Risk::YELLOW => 'Alto',
            Risk::RED => 'Extremo'
        };

    }

    public function render()
    {
        return view('livewire.risk-table-component',[

            'risks' => Risk::with(['process','card'])->get()->map(function ($risk){
                return collect($risk)->merge([
                    'frequency_label' => Risk::FREQUENCY[$risk['frecuency'] - 1 ]['name'],
                    'impact_label' => Risk::IMPACT[$risk['impact'] - 1 ]['name'],
                    'risk_label' => $this->getRiskLabel($risk['card']['color']),
                    'risk_color' => $risk['card']['color']
                ]);
            })
        ]);
    }

    public function ownerSelected($value,Risk $risk){
        $risk->update(['owner' => $value]);
        session()->flash('success','Riesgo actualizado exitosamente');
    }

    public function costSelected($value,Risk $risk){
        $risk->update(['cost' => $value]);
        session()->flash('success','Riesgo actualizado exitosamente');
    }

    public function preventionSelected($value,Risk $risk){
        $risk->update(['prevention' => $value]);
        session()->flash('success','Riesgo actualizado exitosamente');
    }

    public function actionSelected($value,Risk $risk){
        $risk->update(['action' => $value]);
        session()->flash('success','Riesgo actualizado exitosamente');
    }

}
