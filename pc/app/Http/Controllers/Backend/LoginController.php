<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\MemberBackend;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Backend\VerCode;
	 
class LoginController extends Controller
{
    public function login(Request $request)
    {	
    	$ip = preg_replace('/\./','-',$request->getClientIp());
    	$Identification = 'frequency'.$ip;
    	$loginNum = intval(\Cache::get($Identification));
    	
    	if($loginNum >= 3)
    	{	
    		return view('Backend.Login.login',['verCode'=>'true']);
    	}
    	return view('Backend.Login.login');
    }

    public function dologin(VerCode $request)
    {	
    	
    	$username = $request->post('username');
    	$password = $request->post('password');
    	$models = MemberBackend::where('username',$username)->first();
    	if($models)
    	{	
    		if($models->status == 0)
    		{	
    			$this->setLoginNum($request);
    			return back()->withInput()->with('messageinfo','此账号被禁用');
    		}

    		if(Hash::check($password,$models->password_hash))
    		{	
    			
    			$models->visit_count += 1;
    			$models->last_time = time();
    			$models->last_ip = $request->getClientIp();
    			$models->save();
    			$backend = $models->toArray();
    			unset($backend['password_reset_key']);
    			unset($backend['password_hash']);
                
    			\session(['backend'=>$backend]);
    			return redirect('/backend/origin-index')->with('messageinfo','登录成功');
    		}else
    		{	
    			$this->setLoginNum($request);
    			return back()->withInput()->with('messageinfo','用户名或密码不正确');
    		}
    	}else
    	{	

    	 	$this->setLoginNum($request);
    		return back()->withInput()->with('messageinfo','用户名或密码不正确');
    	}
    	
    }

    public function setLoginNum($request)
    {
    	$ip = preg_replace('/\./','-',$request->getClientIp());
    	$Identification = 'frequency'.$ip;
    	$frequency = \Cache::get($Identification);
    	$frequency = empty($frequency)?1:$frequency + 1;
    	\Cache::put($Identification,$frequency,3);
    }
}
