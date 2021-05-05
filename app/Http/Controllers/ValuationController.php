<?php

namespace App\Http\Controllers;

use App\Models\Valuation;
use Illuminate\Http\Request;
use App\Models\Make;
use App\Models\Modal;
use App\Models\Body;
use App\Models\Year;

class ValuationController extends Controller
{
    
    public function index()
    {   
        $make=Make::all();
        $year=Year::all();

        return view('backend.value',compact('make','year'));
    }

    public function store(Request $request)
    {
        //modelid=1&makeid=1&bodyid=1&yearid=1&valuation=200
        $valuation=new Valuation;
        $valuation->value=$request->valuation;
        $valuation->make_id=$request->makeid;
        $valuation->modal_id=$request->modelid;
        $valuation->body_id=$request->bodyid;
        $valuation->year_id=$request->yearid;
        $success=$valuation->save();
        if ($success) {
           return 1;
        }

    }

    
}
