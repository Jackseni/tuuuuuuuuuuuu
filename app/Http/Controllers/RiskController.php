<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Risk;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => ['required'],
            'process_id' => ['required'],
            'frecuency' => ['required'],
            'impact' => ['required']
        ]);

        $weight = $request->frecuency.$request->impact; //Calculamos el peso en base a la frecuency y el impacto
        $card = Card::where('weight',$weight)->first();

        $risk = new Risk();
        $risk->name = $request->name;
        $risk->process_id = $request->process_id;
        $risk->card_id = $card->id;
        $risk->frecuency = $request->frecuency;
        $risk->impact = $request->impact;
        $risk->save();

        return redirect()->back()->withSuccess('Riesgo añadido correctamente');

    }

    public function destroy(Risk $risk){
        $risk->delete();
        return redirect()->back()->withSuccess('Riesgo borrado correctamente');
    }
}
