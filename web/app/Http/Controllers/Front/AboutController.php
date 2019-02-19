<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AboutMember;
use App\Model\DynamicNews;
class AboutController extends Controller
{
    public function team(Request $request)
    {
    	$team = AboutMember::where('team_id',1)->orderBy('stort')->get();
    	return view('Front.About.team',[
    		'label' => array('title'=>'设计团队','url'=>'/'),
    		'team' => $team
    	]);
    }
    public function discount(Request $request)
    {
    	return view('Front.About.discount',[
    		'label' => array('title'=>'优惠活动','url'=>'/')
    	]);
    }
    public function partner(Request $request)
    {
    	return view('Front.About.partner',[
    		'label' => array('title'=>'合作伙伴','url'=>'/')
    	]);
    }

    public function about(Request $request)
    {
    	return view('Front.About.about',[
    		'label' => array('title'=>'关于我们','url'=>'/')
    	]); 	
    }

    public function guarantee(Request $request)
    {
        return view('Front.About.guarantee',[
            'label' => array('title'=>'服务保障','url'=>'/')
        ]);     
    }
    public function honor(Request $request)
    {   
        $news = DynamicNews::where('classify_id',1)
                ->orderBy('created_at','DESC')
                ->offset(0)->limit(3)
                ->get();
        return view('Front.About.honor',[
            'label' => array('title'=>'集团荣誉','url'=>'/'),
            'news'=>$news
        ]);     
    }
    public function hardcover(Request $request)
    {   
        return view('Front.About.hardcover',[
            'label' => array('title'=>'批量精装','url'=>'/')
        ]);     
    }
}
