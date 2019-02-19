<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SysMenu;
use App\Model\MemberBackend;

class IndexController extends Controller
{
	public function index()
	{	
		$menu = SysMenu::where('level',1)
				->where('status','!=',0)
				->orderBy('sort')
				->with(['getMenus'=>function($query)
				{
                    return $query->select('*')->where('level',2)->where('status','!=',0)->orderBy('sort')->get();
                }])
                ->get()->toArray();

        $member = $this->getBackendMember();
        $config = $this->getSystemConfig();
        $itps = !empty($config)?intval($config->rule_menu):1;

        if($member->type != 10 && $itps == 0)
        {
        	$rules = $member->roles->rules->toArray();
        	$rules_arr = [];
        	foreach($rules as $key => $val)
        	{
        			$rules_arr[$key] = '/'.$val['rules'];
        	}
        	foreach($menu as $k => $v)
        	{	
        		$init = false;
        		foreach($v['get_menus'] as $keys => $vals)
        		{	
        		
        			if(!in_array($vals['url'],$rules_arr))
        			{
        				unset($menu[$k]['get_menus'][$keys]);
        			}else
        			{
        				$init = true;
        			}
        		}
			    if(!$init)
				{
					unset($menu[$k]);
				}
        	}

        }
		return view('Backend.index',[
				'menu'=>$menu
		]);
	}
    public function exit(Request $request)
    {
    	if($request->session()->has('backend'))
    	{
    		$request->session()->forget('backend');
    	}
    	return redirect('/backend/origin-login')->with('messageinfo','退出成功');
    }


}
