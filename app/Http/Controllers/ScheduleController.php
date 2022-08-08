<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Risk;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){

        $chart_data = Card::query()
            ->join('risks', 'cards.id', '=', 'risks.card_id')
            ->selectRaw('count(risks.id) as count, color')
            ->groupBy('color')
            ->get()
            ->map(function($element){
                return collect($element)->merge([

                    'label' => match ($element['color']){
                        Risk::GREEN => 'Bajo',
                        Risk::BLUE => 'Moderado',
                        Risk::YELLOW => 'Alto',
                        Risk::RED => 'Extremo'
                    },
                    'chart_colors' => match($element['color']){
                        Risk::GREEN => '#5cb85c',
                        Risk::BLUE => '#0275d8',
                        Risk::YELLOW => '#f0ad4e',
                        Risk::RED => '#d9534f'
                    },

                ]);
            });

       $data = $chart_data->pluck('count');
       $labels = $chart_data->pluck('label');
       $chart_colors = $chart_data->pluck('chart_colors');

        return view('schedule',compact('data','labels','chart_colors'));
    }
}
