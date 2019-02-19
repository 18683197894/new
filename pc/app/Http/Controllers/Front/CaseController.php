<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaseController extends Controller
{
    public function case(Request $request)
    {
    	return view('Front.Case.case');
    }
}
