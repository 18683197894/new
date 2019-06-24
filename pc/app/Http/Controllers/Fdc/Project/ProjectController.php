<?php

namespace App\Http\Controllers\Fdc\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fdc\LeavingMessage;
class ProjectController extends Controller
{
    public function jfxz(Request $request)
    {	
    	return view('Fdc.Project.jfxz');
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
