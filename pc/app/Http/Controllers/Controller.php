<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success_message($info = '成功',$data='',$code = 200)
    {	

			$ret = array('code'=>$code,'data'=>$data,'info'=>$info);
    		die(json_encode($ret));
    }

    public function error_message($info='失败',$data='',$code = 501)
    {	
		    $ret = array('code'=>$code,'data'=>$data,'info'=>$info);
            die(json_encode($ret));
    }

    public function str_rand($length = 32, $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') 
    {
        if(!is_int($length) || $length < 0) 
        {
        return false;
        }
        $string = '';
        for($i = $length; $i > 0; $i--) 
        {
            $string .= $char[mt_rand(0, strlen($char) - 1)];
        }
        return $string;
    }

    public function getKeyword($path)
    {
        $webConfig = \App\Model\SysWebConfig::find(1);
        $key = \App\Model\SysFrontKeyword::where('url',$path)->first();
        $key->keyword = $key->keyword?$key->keyword:'建商联盟';
        $key->description = $key->description?$key->description:'建商联盟';
        $data['title'] = $key->title;
        $data['keyword'] = $webConfig->keyword?$webConfig->keyword .','.$key->keyword:$key->keyword;
        $data['description'] = $webConfig->description?$webConfig->description .','.$key->description:$key->description;
        return $data;
    }

    public function getBackendMember($id=null)
    {  
        $id = !empty($id)?$id:\session('backend')['id'];
        return \App\Model\MemberBackend::find($id);
    }

    public function getSystemConfig()
    {
        return \App\Model\SysSystemConfig::find(1);
    }

    public function SysConfingInit()
    {
        $page = \App\Model\SysSystemConfig::find(1)->sizepage_backend;
        $page = !empty($page)?$page:10;
        $this->_sizePage = $page;
    }
    public function getFdcProjectList()
    {
        return ['/jfxz'=>'金府星座','/rbgg'=>'润帛公馆'];
    }
    public function getFdcPageList()
    {
        return ['/'=>'首页','/jfxz'=>'金府星座','/jfxz/{id}'=>'金府星座新闻页','/rbgg'=>'润帛公馆'];
    }
    public function baseKey($arr,$code)
    {   
        if(!$arr|| $code == NULL)
        {
            return false;
        }
        $getKeys = '';
        switch ($code) {
            case 'set':
                $i = 1;
                foreach($arr as $key => $val)
                {   
                    if($i == 1)
                    {   
                        $getKeys .= '?'.$key.'='.$val;
                    }else
                    {
                        $getKeys .= '&'.$key.'='.$val;
                    }
                    $i ++;
                }
                $getKeys = base64_encode($getKeys);
                break;
            
            case 'get':
                $getKeys = base64_decode($arr);
                break;
        }

        return $getKeys;
    }
}
