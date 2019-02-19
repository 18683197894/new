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
        $news = DynamicNews::where('status','>',0)->orderBy('created_at','DESC')->offset(0)->limit(3)->get();
    	return view('Front.Index.index',[
            'lunbo'=>AboutCarousel::where('type',1)->orderBy('stort','DESC')->get(),
            'news' => $news
        ]);
    }

    public function index_message(Request $request)
    {
    	$data = $request->except('_token');
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
