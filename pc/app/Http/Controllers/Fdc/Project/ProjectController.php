<?php

namespace App\Http\Controllers\Fdc\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fdc\LeavingMessage;
use App\Model\Fdc\Banner;
use App\Model\Fdc\DynamicNews;
class ProjectController extends Controller
{
    public function jfxz(Request $request)
    {	
        $luobo = Banner::where('key','/jfxz')->orderBy('stort')->get();
        $news = DynamicNews::where('key','/jfxz')->orderBy('created_at','DESC')->offset(0)->limit(6)->get();
    	return view('Fdc.Project.jfxz',[
            'luobo' => $luobo,
            'news' => $news
        ]);
    }
    public function jfxz_news(Request $request,$id)
    {   
        $luobo = Banner::where('key','/jfxz/{id}')->orderBy('stort')->get();
        $news = DynamicNews::find($id);
        if(!$news)
        {   
            return view('Fdc.Error.404',['path'=>'/jfxz']);
        }
        $news->total_num += 1;
        $news->save();
        
        $remen = DynamicNews::where('key',$news->key)->where('id','!=',$news->id)->orderBy('total_num','DESC')->offset(0)->limit(10)->get();
        

        $keyword['title'] = $news->titles;
        $keyword['keyword'] = $news->keyword;
        $keyword['description'] = $news->description;

        return view('Fdc.News.details',[
            'key' => ['url'=>'/jfxz','title'=>$this->getFdcPageList()['/jfxz']],
            'luobo' => $luobo,
            'news'=>$news,
            'remen' => $remen,
            'keyword'=>$keyword,
            'shang' => DynamicNews::where('key',$news->key)->where('created_at','<',$news->toArray()['created_at'])->orderBy('created_at','DESC')->first(),
            'xia' => DynamicNews::where('key',$news->key)->where('created_at','>',$news->toArray()['created_at'])->orderBy('created_at')->first()
        ]);
    }
    public function rbgg(Request $request)
    {
        $luobo = Banner::where('key','/rbgg')->orderBy('stort')->get();
        $news = DynamicNews::where('key','/rbgg')->orderBy('created_at','DESC')->offset(0)->limit(6)->get();
        return view('Fdc.Project.rbgg',[
            'luobo' => $luobo,
            'news' => $news
        ]);
    }
    public function rbgg_news(Request $request,$id)
    {   
        $luobo = Banner::where('key','/rbgg/{id}')->orderBy('stort')->get();
        $news = DynamicNews::find($id);
        if(!$news)
        {   
            return view('Fdc.Error.404',['path'=>'/rbgg']);
        }
        $news->total_num += 1;
        $news->save();
        
        $remen = DynamicNews::where('key',$news->key)->where('id','!=',$news->id)->orderBy('total_num','DESC')->offset(0)->limit(10)->get();
        

        $keyword['title'] = $news->titles;
        $keyword['keyword'] = $news->keyword;
        $keyword['description'] = $news->description;

        return view('Fdc.News.details',[
            'key' => ['url'=>'/rbgg','title'=>$this->getFdcPageList()['/rbgg']],
            'luobo' => $luobo,
            'news'=>$news,
            'remen' => $remen,
            'keyword'=>$keyword,
            'shang' => DynamicNews::where('key',$news->key)->where('created_at','<',$news->toArray()['created_at'])->orderBy('created_at','DESC')->first(),
            'xia' => DynamicNews::where('key',$news->key)->where('created_at','>',$news->toArray()['created_at'])->orderBy('created_at')->first()
        ]);
    }
    public function message(Request $request)
    {
    	$data = $request->except('_token','send');
        if(!\Cache::has('fdc_project_'.$request->phone))
        {   
            $this->error_message('请发送验证码',null,401);
        }
        if(\Cache::get('fdc_project_'.$request->phone) !== intval($request['send']))
        {   
            $this->error_message('验证码错误',null,401);
        }
        \Cache::forget('fdc_project_'.$request->phone);
		$data['ip'] = $request->getClientIp();
    	if(LeavingMessage::create($data))
    	{
    		$this->success_message('留言成功');
    	}else
    	{
    		$this->error_message('留言失败');
    	}
    }

    public function message_send(Request $request)
    {   
        $message = new \Message();
        $code = mt_rand(1111, 9999);
        $res = $message->SendMessage($request->phone,'验证码:'.$code,$request->getClientIp());
        if($res['code'] == 200)
        {   
            \Cache::put('fdc_project_'.$request->phone,$code,10);
            $this->success_message($res['info']);
        }else
        {
            $this->error_message($res['info']);
        }
    }
}
