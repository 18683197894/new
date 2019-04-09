<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\SysSystemConfig;
class FrontMiddleware
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
        //if(!$this->isMobile())
        //{   

          //  $host = $request->server('HTTP_HOST').$request->server('REQUEST_URI');
          //  $newHost = preg_replace('/^m\./','www.',$host);
          //  return redirect('http://'.$newHost);
       // }
        $model = SysSystemConfig::find(1);
        if($model && $model->site_close == 1)
        {
            return response()->view('Error.503');
        }
        return $next($request);
    }
    public function isMobile(){  
        $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';  
        $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';        
        function CheckSubstrs($substrs,$text){  
            foreach($substrs as $substr)  
                if(false!==strpos($text,$substr)){  
                    return true;  
                }  
                return false;  
        }
        $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
        $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');  
              
        $found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||  
                  CheckSubstrs($mobile_token_list,$useragent);  
              
        if ($found_mobile){  
            return true;  
        }else{  
            return false;  
        }  
    }
}
