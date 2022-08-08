<?php

namespace App\ViewModels;

use App\Models\Risk;
use Spatie\ViewModels\ViewModel;

class RiskViewModel extends ViewModel
{
    public $risks = [];
    public $processes = [];
    public $cards = [];

    public function __construct($risks,$processes,$cards)
    {
        $this->risks = $risks;
        $this->processes = $processes;
        $this->cards = $cards;
    }

    public function risks(){
        return collect($this->risks)->map(function($risk){
            return collect($risk)->merge([
                'frequency_label' => Risk::FREQUENCY[$risk['frecuency'] - 1 ]['name'],
                'impact_label' => Risk::IMPACT[$risk['impact'] - 1 ]['name'],
                'risk_label' => $this->getRiskLabel($risk['card']['color']),
                'risk_color' => $risk['card']['color'],
                'risk_actions' => $this->getAction($risk['card']['color'])
            ]);
        });
    }

    public function cards(){
        return $this->cards;
    }

    public function processes(){
        return $this->processes;
    }

    private function getRiskLabel($color){

        return match($color){
            Risk::GREEN => 'Bajo',
            Risk::BLUE => 'Moderado',
            Risk::YELLOW => 'Alto',
            Risk::RED => 'Extremo'
        };

    }



    private function getAction($color){
        return match($color){
            Risk::GREEN => [['color' => 'success','name' => 'Aceptar']],
            Risk::BLUE => [['color' => 'success','name' => 'Aceptar'],['color' => 'primary','name' => 'transferir']],
            Risk::YELLOW, Risk::RED => [['color' => 'info','name' => 'Evitar o eliminar'],['color' => 'danger','name' => 'Mitigar']]
        };
    }

}
