<?php

namespace App\Http\Controllers;

use App\Models\CheckValuation;
use App\Models\Company;
use App\Models\Year;
use App\Models\Valuation;
use App\Models\Body;
use App\Models\Modal;
use App\Models\Make;
use Illuminate\Http\Request;

class CheckValuationController extends Controller
{
    
    public function index()
    {   $year   =Year::all();
        $company=Company::all();
        return view('welcome',compact('company','year'));
    }

    
    public function store(Request $request)
    {  
        //companyid=1&makeid=1&modelid=1&bodyid=1&yearid=2&valuation=1100

            $count=CheckValuation::count();
            if ($count<2) {
            $store=new CheckValuation;
            $store->company_id=$request->companyid;
            $store->make_id=$request->makeid;
            $store->modal_id=$request->modelid;
            $store->body_id=$request->bodyid;
            $store->year_id=$request->yearid;
            $store->valuation=$request->valuation;
            $success=$store->save();
            if ($success) {
               return 1;
            }
            }else{

                return 2;
            }

    }

    public function countcp()
    {
        $check=CheckValuation::count();
        if (is_numeric($check)) {
            return $check;
        }
    }
    public function show()
    {   
        $comparison=CheckValuation::count();
        if ($comparison===2) {
            $check=CheckValuation::all();
             return view('comparison',compact('check'));
        }else{
            return redirect('/')->with('success','Check There Comparison Values');
        }
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
    public function destroy()
    {
        $sucess=CheckValuation::truncate();

        if (!empty($success)) {
            return 1;
        }else{
            return 2;
        }
    }
}
