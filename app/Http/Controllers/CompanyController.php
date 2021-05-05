<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    public function index()
    {
        return view('backend.company');
    }

    

    
    public function store(Request $request)
    {
        $company=new Company;
        $company->name=$request->company;
        $success=$company->save();
        if ($success) {
            return 1;
        }
    }

}
