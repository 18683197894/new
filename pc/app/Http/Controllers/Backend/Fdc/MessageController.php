<?php

namespace App\Http\Controllers\Backend\Fdc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fdc\LeavingMessage;
class MessageController extends Controller
{
    public function leaving_message(Request $request)
    {	
    	$this->SysConfingInit();
    	$name = $request->get('name','');        
    	$start = $request->get('start');
        $end = $request->get('end');
    	$start = empty($start)?0:$start;
        $end = empty($end)?'2020-12-30':$end;

    	$message = LeavingMessage::where('name','like','%'.$name.'%')
    							->whereDate('time','>=',$start)
                                ->whereDate('time','<=',$end)
    							->orderBy('time','DESC')
    							->paginate($this->_sizePage);
        foreach($message as $k => $v)
        {
            $message[$k]['time'] .= ' '.$v->time_re.'时';
        }
    	return view('Backend.Fdc.Message.leaving_message',[
    		'message'=>$message,
    		'request' => $request->all()
    	]);
    }
    public function leaving_message_status(Request $request)
    {
    	$model = LeavingMessage::find($request->id);
    	if($model)
    	{
    		$model->status = $request->status;
    		$model->save();
    		$this->success_message('状态更改成功');
    	}else
    	{
    		$this->error_message('数据不存在');
    	}
    }
    public function leaving_message_del(Request $request)
    {
    	$ids = $request->ids;
        $res = LeavingMessage::destroy($ids);
        if($res)
        {
            $this->success_message('删除成功');
        }else
        {
            $this->error_message('删除失败');
        }
    }
    public function leaving_message_code(Request $request)
    {
    	$model = LeavingMessage::find($request->id);
    	if($model)
    	{	
    		$message = new \Message();
    		$res = $message->SendMessage($model->phone,$request->content,$request->getClientIp());
    		if($res['code'] == 200)
    		{
    			$model->status = 1;
    			$model->save();
    			$this->success_message($res['info']);
    		}else
    		{
    			$this->error_message($res['info']);
    		}
    		// $this->success_message('短信发送成功');
    	}else
    	{
    		$this->error_message('数据不存在');
    	}
    }
}
