<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\MemberBackend;
class RuleMiddleware
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
        $path = $request->path();
        $id = \session('backend')['id'];
        $models = MemberBackend::find($id);
        if($models->type == 10)
        {
            return $next($request);
        }
        $role = $models->roles;
        if(!$role)
        {
            if($request->ajax())
            {
                die(json_encode(['code'=>501,'info'=>'无权限'])); 
            }
            return response()->view('Error.403');
        }
        $rules = array();
        foreach($role->rules->toArray() as $k => $v)
        {   
            $rules[$k] = $v['rules'];
        }
        if(!in_array($path,$rules))
        {   
            if($request->ajax())
            {
                die(json_encode(['code'=>501,'info'=>'无权限'])); 
            }
            return response()->view('Error.403');
        }

        return $next($request);
    }
}
