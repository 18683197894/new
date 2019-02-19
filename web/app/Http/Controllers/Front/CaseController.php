<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AboutMember;
class CaseController extends Controller
{
    public function case(Request $request)
    {	
    	$label['title'] = '精彩案例';
    	$label['url'] = '/';
    	$team = AboutMember::where('team_id',1)->orderBy('stort')->offset(0)->limit(4)->get();
    	return view('Front.Case.case',['label'=>$label,'team'=>$team]);
    }
}
