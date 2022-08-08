<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);

        $process = new Process();
        $process->name = $request->name;
        $process->description = $request->description;
        $process->save();

        return redirect()->back()->withSuccess(__('Proceso guardado con éxito'));

    }
}
