<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LeavingMessage;
use App\Model\AboutCarousel;
use App\Model\DynamicNews;
class IndexController extends Controller
{
    public function index(Request $request)
    {	
    	return view('Front.Index.index',[
            'lunbo'=>AboutCarousel::where('type',0)->orderBy('stort','DESC')->get(),
			'news'=>DynamicNews::where('status','>',0)->orderBy('created_at','DESC')->offset(0)->limit(10)->get()
        ]);
    }
    public function message(Request $request)
    {
    	$data = $request->except('_token');
		// $request->setTrustedProxies(array('10.32.0.1/16'));
		$data['ip'] = $request->getClientIp();
    	if(LeavingMessage::create($data))
    	{
    		$this->success_message('留言成功');
    	}else
    	{
    		$this->error_message('留言失败');
    	}
    }
}
