<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\SysSystemConfig;
class HouseMiddleware
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
        $model = SysSystemConfig::find(1);
        if($model && $model->site_close == 1)
        {
            return response()->view('Error.503');
        }
        return $next($request);
    }
}
