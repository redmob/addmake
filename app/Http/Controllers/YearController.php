<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    
    public function index()
    {
        return view('backend.year');
    }

    
    public function store(Request $request)
    {
        $year=new Year;
        $year->year=$request->year;
        $success=$year->save();
        if ($success) {
            return 1;
        }
    }

    
}
