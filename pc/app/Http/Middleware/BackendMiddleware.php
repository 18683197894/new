<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\MemberBackend;
class BackendMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $backend = $request->session()->get('backend');
        if(empty($backend))
        {   
            return redirect('/backend/origin-login');
        }
        $model = MemberBackend::find($backend['id'])->toArray();
        if($model['last_time'] > $backend['last_time'])
        {
            if($request->ajax())
            {
                die(json_encode(['code'=>501,'info'=>'此账号已在别处登录'])); 
            }
           $request->session()->forget('backend');
           return redirect('/backend/origin-login')->with('messageinfo','此账号已在别处登录');
        }
        if($model['status'] !== 1)
        {
            if($request->ajax())
            {
                die(json_encode(['code'=>501,'info'=>'此账号已被禁用'])); 
            }
            $request->session()->forget('backend');
            return redirect('/backend/origin-login')->with('messageinfo','此账号已被禁用');
        }
        
        return $next($request);
    }
}
