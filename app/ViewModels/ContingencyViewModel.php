<?php

namespace App\ViewModels;

use App\Models\Risk;
use Spatie\ViewModels\ViewModel;

class ContingencyViewModel extends ViewModel
{
    public $risks;

    public function __construct($risks)
    {
        $this->risks = $risks;
    }

    public function risks()  {

        return collect($this->risks)->map(function($risk) {
            return collect($risk)->merge([
                'decision_actions' => $this->getAction($risk['card']['color'])
            ]);
        })->dump();
    }

    private function getActionLabel($action) {
        return Risk::ACTION[$action - 1]['name'];
    }

    //<div><strong>Decisión: </strong><span class="badge badge-{{ App\Models\Risk::ACTION[$risk['action'] - 1]['color'] }} text-sm">{{ App\Models\Risk::ACTION[$risk['action'] - 1]['name'] }}</span></div>

    private function getAction($color){
        return match($color){
            Risk::GREEN => [['color' => 'success','name' => 'Aceptar']],
            Risk::BLUE => [['color' => 'success','name' => 'Aceptar'],['color' => 'primary','name' => 'transferir']],
            Risk::YELLOW, Risk::RED => [['color' => 'info','name' => 'Evitar o eliminar'],['color' => 'danger','name' => 'Mitigar']]
        };
    }


}
