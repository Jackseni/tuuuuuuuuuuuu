<?php

namespace App\Http\Controllers;

use App\Models\Contingency;
use App\Models\Risk;
use App\ViewModels\ContingencyViewModel;
use Illuminate\Http\Request;

class ContingencyController extends Controller
{
    public function index()
    {
        return view('contingency');
    }

    public function store(Request $request)
    {
        $contingency = $request->validate([
            'description' => 'required',
        ],[
            'description.required' => 'El campo descripcion del plan de contingencia es requerido',
        ]);

        Contingency::create($contingency);

        return redirect()->route('contingency.index')->with('success', 'Plan de Contingencia creado con éxito.');
    }

}
