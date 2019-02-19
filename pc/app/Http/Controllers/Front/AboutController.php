<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AboutTeam;
class AboutController extends Controller
{
    public function team(Request $request)
    {	
    	$team = AboutTeam::with(['Members'=>function($query){
    		return $query->orderBy('stort')->get();
    	}])->get();
    	return view('Front.About.team',[
    		'team' => $team
    	]);
    }

    public function commerce(Request $request)
    {
    	return view('Front.About.commerce');
    }
    public function about(Request $request)
    {
        return view('Front.About.about');
    }
}
