<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SysWebConfig;
use App\Model\SysZendConfig;
use App\Model\SysSystemConfig;
use App\Model\SysFrontKeyword;
use App\Model\SysFrontMenu;
use App\Model\SysMenu;
use App\Model\FileUploadsInfo;
class SysController extends Controller
{   


    public function config_all(Request $request)
    {	

        $sysCache = array('ueditorSize'=>$this->getRealSize($this->getDirSize('uploads/ueditor')));

    	$webConfig = SysWebConfig::find(1);
    	if(!$webConfig)
    	{
    		$webConfig = SysWebConfig::create(['id'=>1]);
    	}
    	$zendConfig = SysZendConfig::find(1);
    	if(!$zendConfig)
    	{
    		$zendConfig = SysZendConfig::create(['id'=>1]);
    	}
    	$systemConfig = SysSystemConfig::find(1);
    	if(!$systemConfig)
    	{
    		$systemConfig = SysSystemConfig::create(['id'=>1]);
    	}
    	return view('Backend.Sys.config_all',[
    		'webConfig' => $webConfig,
    		'zendConfig' => $zendConfig,
    		'systemConfig' => $systemConfig,
            'sysCache' => $sysCache
    		]);
    }

    public function webconfig_edit(Request $request)
    {	

    	$models = SysWebConfig::find(1);
    	if(!$models)
    	{
    		$models = SysWebConfig::create(['id'=>1]);
    	}
    	if($request->post('type') == 'ico')
    	{
	    	if($request->hasFile('ico'))
	        {
	            if($request->file('ico')->isValid())
	            { 
	                $ext=$request->file('ico')->extension();
	                if($ext != 'ico')
	                {
	                	$this->error_message('上传非ICO文件');
	                }
	                $path = './'.env('UPLOAD_BACKEND').'/sys/ico/';
	                $newname = time().rand(1111,9999).'.'.$ext;
	                
	                @unlink('./favicon.ico');
	                @unlink($models->logo);
	                $request->file('ico')->move('./','favicon.ico');
	                copy('./favicon.ico',$path.$newname);
	                $models->logo  = $path.$newname;
	                $models->save();
	        		$this->success_message('LOGO上传成功',['src'=>asset($models->logo)]);
	         	
	            }
	        }
	        $this->error_message('上传失败');
    	}else
    	{
    		$data = $request->data;
           
    		unset($data['file']);
    		unset($data['ico']);
    		$res = SysWebConfig::find(1)->update($data);
    		if($res)
    		{
    			$this->success_message('修改成功');
    		}else
    		{
    			$this->error('修改失败');
    		}
    	}
    }

    public function zendconfig_edit(Request $request)
    {	
    	$data = $request->data;
    	$models = SysZendConfig::find(1);
    	if(!$models)
    	{
    		$models = SysZendConfig::create(['id'=>1]);
    	}
    	$res = SysZendConfig::find(1)->update($data);
		if($res)
		{
			$this->success_message('修改成功');
		}else
		{
			$this->error('修改失败');
		}
    }

    public function systemconfig_edit(Request $request)
    {
        $data = $request->data;
        $models = SysSystemConfig::find(1);
        if(!$models)
        {
            $models = SysSystemConfig::create(['id'=>1]);
        }
        $res = SysSystemConfig::find(1)->update($data);
        if($res)
        {
            $this->success_message('修改成功');
        }else
        {
            $this->error('修改失败');
        }
    }

    public function front_keyword(Request $request)
    {   
        $this->SysConfingInit();
        $url = $request->get('url',null);
        $app = app();
        $routes = $app->routes->getRoutes();
        $path = [];
        foreach ($routes as $k=>$value)
        {   

            if( isset($value->action['middleware']) && in_array('front',$value->action['middleware']))
            {
                $path[$k] = $value->uri;
            }
        }
        $keyword = SysFrontKeyword::select('*')
        ->where('url','like','%'.$url.'%')
        ->orderBy('created_at','DESC')
        ->paginate($this->_sizePage);

        return view('Backend.Sys.front_keyword',[
            'keyword'=> $keyword,
            'path'=>$path,
            'request'=>$request->all()
            ]);
    }

    public function key_add(Request $request)
    {
        $data = $request->except('_token');
        $data['url'] = $data['urls'];
        unset($data['urls']);
        if($data['url'] != '/' )
        {
            $data['url'] = $data['url'];
        }
        $model =  SysFrontKeyword::where('url',$data['url'])->first();
        if($model)
        {
            return redirect('/backend/sys/front-keyword')->with(['error_message'=>'当前路由已存在']);
        }
        $res = SysFrontKeyword::create($data);
        if($res)
        {
            return redirect('/backend/sys/front-keyword')->with(['success_message'=>'添加成功']);
        }else
        {
            return redirect('/backend/sys/front-keyword')->with(['error_message'=>'新增失败']);
        }
    }

    public function key_edit(Request $request)
    {
        $data = $request->post('data');
        $id = $data['id'];
        $models = SysFrontKeyword::where('url',$data['url'])->where('id','!=',$id)->first();
        if($models)
        {
            $this->error_message('当前路由已存在');
        }
        $res = SysFrontKeyword::where('id',$id)->update($data);
        if($res)
        {
            $this->success_message('修改成功');
        }else
        {
            $this->error_message('修改失败');
        }
    }

    public function key_del(Request $request)
    {
        $ids = $request->ids;
        $res = SysFrontKeyword::destroy($ids);
        if($res)
        {
            $this->success_message('删除成功');
        }else
        {
            $this->error_message('删除失败');
        }
    }
    public function key_image(Request $request)
    {
        $id = $request->id;
        $model = SysFrontKeyword::find($id);
        if($model)
        {
            if($request->file && $request->file != "undefined")
            {
                if($request->hasFile('file'))
                {
                    if($request->file('file')->isValid())
                    {
                        $extension = $request->file->extension();
                        if($extension != 'jpg' && $extension != 'jpeg' && $extension !='png' )
                        {
                            $this->error_message('请上传图片');
                        }
                        $newName = time().mt_rand(11111,99999).'.'.$extension;
                        $url = $request->file->storeAs('/about/keyword/images',$newName,'backend');
                        if($url)
                        {   
                           
                            $path = env('UPLOAD_BACKEND').'/'.$url;
                            if($model->image)
                            {  
                                @unlink('.'.$model->image);
                            }
                            $model->image = $path;
                            $model->save();
                        }
                    }
                }
            }
            $this->success_message('上传成功');
        }else
        {
            $this->error_message('数据不存在');
        }
        $this->success_message('上传成功');
    }

    public function key_del_banner(Request $request)
    {
        $model = SysFrontKeyword::find($request->id);
        if($model && $model->image)
        {
            @unlink('.'.$model->image);
            $model->image = null;
            $model->save();
        }
        $this->success_message('删除成功');
    }
    public function menu(Request $request)
    {   
        $app = app();
        $routes = $app->routes->getRoutes();
        $path = [];
        foreach ($routes as $k=>$value)
        {
            if( isset($value->action['middleware']) && in_array('rule',$value->action['middleware']))
            {
                $path[$k] = $value->uri;
            }
        }
        $menu = SysMenu::where('level',1)
                        ->orderBy('sort')
                        ->with(['getMenus'=>function($query){
                            return $query->select('*')->where('level',2)->orderBy('sort')->get();
                        }])
                        ->get()->toArray();
        return view('Backend.Sys.menu',[
            'menu'=>$menu,
            'path'=>$path
            ]);
    }
    public function menu_add(Request $request)
    {   

        $data = $request->except('_token');

        if( isset($data['url']) && $data['url'] != '#')
        {
            $data['url'] = '/'.$data['url'];
        }
        $res = SysMenu::create($data);
        if($res)
        {
            return redirect('/backend/sys/menu')->with(['success_message'=>'新增成功']);
        }else
        {
            return redirect('/backend/sys/menu')->with(['error_message'=>'新增失败']);
        }

    }
    public function menu_edit(Request $request)
    {
        $data = $request->except('_token','urls');
        if(SysMenu::find($data['id'])->status == 2)
        {
            return redirect('/backend/sys/menu')->with(['error_message'=>'操作失败 系统默认目录禁止编辑']);
        }
        $res = SysMenu::where('id',$data['id'])->update($data);
        if($res)
        {
            return redirect('/backend/sys/menu')->with(['success_message'=>'修改成功']);
        }else
        {
            return redirect('/backend/sys/menu')->with(['error_message'=>'修改失败']);
        }
    }

    public function menu_status(Request $request)
    {
        $model = SysMenu::find($request->id);
        if($model)
        {   
            if($model->status == 2)
            {
                $this->error_message('操作失败 系统默认目录禁止更改状态');
            }
            $model->status = $request->status;
            $model->save();
            $this->success_message();
        }else
        {
            $this->error_message('数据不存在');
        }
    }
    public function menu_del(Request $request)
    {
        $model = SysMenu::find($request->id);
        if($model)
        {   
            if($model->status == 2)
            {
                $this->error_message('操作失败 系统默认目录禁止删除');
            }
            if($model->level == 1)
            {
                SysMenu::where('pid',$request->id)->delete();
            }
            $model->delete();
            $this->success_message();
        }else
        {
            $this->error_message('数据不存在');
        }
    }

    public function menu_sort(Request $request)
    {   
        $model = SysMenu::find($request->id);
        if($model)
        {
            $model->sort = $request->sort;
            $model->save();
            $this->success_message('排序成功');
        }else
        {
            $this->error_message('排序失败');
        }
        
    }

     public function frontmenu(Request $request)
    {
        $app = app();
        $routes = $app->routes->getRoutes();
        $path = [];
        foreach ($routes as $k=>$value)
        {
            if( isset($value->action['middleware']) && in_array('front',$value->action['middleware']))
            {
                $path[$k] = $value->uri;
            }
        }
        $menu = SysFrontMenu::where('level',1)
                        ->orderBy('sort')
                        ->with(['getMenus'=>function($query){
                            return $query->select('*')->where('level',2)->orderBy('sort')->get();
                        }])
                        ->get()->toArray();
        return view('Backend.Sys.frontmenu',[
            'menu'=>$menu,
            'path'=>$path
            ]);
    }

    public function frontmenu_add(Request $request)
    {
        $data = $request->except('_token');
        if($data['url'] != '/' && $data['url'] != 'javascript:;')
        {
            $data['url'] = '/'.$data['url'];
        }
        $res = SysFrontMenu::create($data);
        if($res)
        {
            return redirect('/backend/sys/frontmenu')->with(['success_message'=>'新增成功']);
        }else
        {
            return redirect('/backend/sys/frontmenu')->with(['error_message'=>'新增失败']);
        }

    }

    public function frontmenu_sort(Request $request)
    {   
        $model = SysFrontMenu::find($request->id);

        if($model)
        {
            $model->sort = $request->sort;
            $model->save();
            $this->success_message('排序成功');
        }else
        {
            $this->error_message('排序失败');
        }
        
    }
    public function frontmenu_edit(Request $request)
    {
        $data = $request->except('_token','urls');
        if(SysFrontMenu::find($data['id'])->status == 2)
        {
            return redirect('/backend/sys/frontmenu')->with(['error_message'=>'操作失败 系统默认目录禁止编辑']);
        }
        $res = SysFrontMenu::where('id',$data['id'])->update($data);
        if($res)
        {
            return redirect('/backend/sys/frontmenu')->with(['success_message'=>'修改成功']);
        }else
        {
            return redirect('/backend/sys/frontmenu')->with(['error_message'=>'修改失败']);
        }
    }

    public function frontmenu_status(Request $request)
    {
        $model = SysFrontMenu::find($request->id);
        if($model)
        {   
            if($model->status == 2)
            {
                $this->error_message('操作失败 系统默认目录禁止更改状态');
            }
            $model->status = $request->status;
            $model->save();
            $this->success_message();
        }else
        {
            $this->error_message('数据不存在');
        }
    }

    public function frontmenu_del(Request $request)
    {
        $model = SysFrontMenu::find($request->id);
        if($model)
        {   
            if($model->status == 2)
            {
                $this->error_message('操作失败 系统默认目录禁止删除');
            }
            if($model->level == 1)
            {
                SysMenu::where('pid',$request->id)->delete();
            }
            $model->delete();
            $this->success_message();
        }else
        {
            $this->error_message('数据不存在');
        }
    }

    function ueditor_clear(Request $request)
    {   
        sleep(2);
        $fileInfo = FileUploadsInfo::where('category','UEditor')->get()->toArray();
        $fdata = $this->read_all('uploads/ueditor');
        // dd($fdata);
        if($fdata)
        {   
            sleep(1);
            $clearSize = 0;
            $fileAll = array();
            foreach($fileInfo as $key => $val)
            {
                $fileAll[$key] = $val['path'].$val['title'];
            }
            foreach($fdata as $k => $v)
            {
                if(!in_array($v,$fileAll))
                {   
                    sleep(0.5);
                    $tmp = substr($v,1);
                    $clearSize += filesize($tmp);
                    @unlink($tmp);
                }
            }
            if($clearSize <= 0)
            {
                return $this->error_message('没有缓存');
            }
            $clearSize = $this->getRealSize($clearSize);
            $size = $this->getRealSize($this->getDirSize('uploads/ueditor'));
            $this->success_message('成功清除 '.$clearSize.' 缓存',array('size'=>$size,'clearSize'=>$clearSize));
        }else
        {
            return $this->error_message('没有缓存');
        }
        $this->success_message('清除成功',array('size'=>'21MB','unsize'=>'15MB'));
    }

    function getDirSize($dir)
    { 
        $handle = opendir($dir);
        $sizeResult = 0;

        while (false!==($FolderOrFile = readdir($handle)))
        { 
            if($FolderOrFile != "." && $FolderOrFile != "..") 
            { 
                if(is_dir("$dir/$FolderOrFile"))
                { 
                    $sizeResult += $this->getDirSize("$dir/$FolderOrFile"); 
                }
                else
                { 
                    $sizeResult += filesize("$dir/$FolderOrFile"); 
                }
            } 
        }
        closedir($handle);
        return $sizeResult;
    }
    public function getRealSize($size)
    { 
        $kb = 1024;   // Kilobyte
        $mb = 1024 * $kb; // Megabyte
        $gb = 1024 * $mb; // Gigabyte
        $tb = 1024 * $gb; // Terabyte
        if($size < $kb)
        { 
            return $size." B";
        }
        else if($size < $mb)
        { 
            return round($size/$kb,2)." KB";
        }
            else if($size < $gb)
        { 
            return round($size/$mb,2)." MB";
        }
        else if($size < $tb)
        { 
            return round($size/$gb,2)." GB";
        }
        else
        { 
            return round($size/$tb,2)." TB";
        }
    }
    public function read_all($dir){

        if(!is_dir($dir)) return array();
        $handlt = scandir($dir);
        $f_arr = array();
        foreach($handlt as $val)
        {
            if($val == '.' || $val == '..') continue;
            $path = $dir.'/'.$val;
            if(!is_dir($path))
            {
                array_push($f_arr,'/'.$path);
            }else
            {
               $f_arr = array_merge($f_arr,$this->read_all($path));
            }
        }
        return $f_arr;
    }
}









