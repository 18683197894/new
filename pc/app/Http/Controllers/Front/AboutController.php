<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AboutTeam;
use App\Model\LeavingMessage;

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
    public function message(Request $request)
    {   
        $data = $request->except('_token','send');
        if(!\Cache::has('about'.$request->phone))
        {   
            $this->error_message('请发送验证码',null,401);
        }
        if(\Cache::get('about'.$request->phone) !== intval($request['send']))
        {   
            $this->error_message('验证码错误',null,401);
        }
        \Cache::forget('about'.$request->phone);
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
            \Cache::put('about'.$request->phone,$code,10);
            $this->success_message($res['info']);
        }else
        {
            $this->error_message($res['info']);
        }
    }
}
