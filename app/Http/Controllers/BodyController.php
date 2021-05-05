<?php

namespace App\Http\Controllers;
use App\Models\Valuation;
use App\Models\Body;
use App\Models\Modal;
use App\Models\Make;
use Illuminate\Http\Request;

class BodyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $make=Make::all();
        return view('backend.body',compact('make'));
    }
     


    
    public function getmodal(Request $request)
    {
        $modals=Modal::where('make_id',$request->makeid)->get();
        return $modals;
    }

    public function getbody(Request $request)
    {
        $body=Body::where('modal_id',$request->modelid)->get();
        return $body;
    }
     
     public function getmake(Request $request)
    {
        $make=Make::where('company_id',$request->companyid)->get();
        return $make;
    }

    public function getyearvalue(Request $request)
    {
        $valuation=Valuation::where('body_id',$request->bodyid)->first();
        return $valuation;
    }

    
    public function store(Request $request)
    {   
        $body=new Body;
        $body->name=$request->bodyname;
        $body->make_id=$request->makeid;
        $body->modal_id=$request->modelid;
        $success=$body->save();
        if ($success) {
            return 1;
        }
    }

}
