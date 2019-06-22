<?php

namespace App\Http\Controllers\Fdc\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function jfxz(Request $request)
    {
    	return view('Fdc.Project.jfxz');
    }
}
