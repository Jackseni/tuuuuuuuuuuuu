<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Process;
use App\Models\Risk;
use App\ViewModels\RiskViewModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $risks = new RiskViewModel(Risk::with('process','card')->get(),Process::all(),Card::with('risks')->get());
        return view('home',$risks);
    }
}
