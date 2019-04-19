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

         if($this->isMobile())
         {   
             $host = $request->server('HTTP_HOST').$request->server('REQUEST_URI');
             $newHost = preg_replace('/^www\./','m.',$host);
             //$this->gheader('https://'.$newHost);
			 return redirect('https://'.$newHost,301);			
         }
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
	public function gheader($url)  
	{  
		//echo '<html><head><meta http-equiv="Content-Language" content="zh-CN"><meta HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=gb2312"><meta http-equiv="refresh"  content="0;url='.$url.'"><title>loading ... </title></head><body><div style="display:none">  <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id=\'cnzz_stat_icon_5696423\'%3E%3C/span%3E%3Cscript src=\'" + cnzz_protocol + "s9.cnzz.com/stat.php%3Fid%3D5696423%26show%3Dpic1\' type=\'text/javascript\'%3E%3C/script%3E"));</script></div> <script>window.location="'.$url.'";</script></body></html>';  
	//echo '<!DOCTYPE HTML>
//<html lang="en-US">
//<head>
  // <meta charset="UTF-8">
   //<title></title>
//</head>
//<body>
  // <a id="links" href="#" style="display:none;"></a>
  // <script type="text/javascript">
  //    var obj = document.getElementById("links");
  //    obj.href = "'.$url.'";
  //    obj.click();
  // </script>
//</body>
//</html>';	
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="0;url='.$url.'"/>    
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">

</style>
</head>
<body>
</body>
</html>';
	exit();  
	} 
}
