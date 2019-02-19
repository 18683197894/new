<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AboutTeam;
use App\Model\AboutMember;
use App\Model\AboutLink;
use App\Model\AboutCarousel;
class AboutController extends Controller
{
    public function team(Request $request)
    {	
    	$name = $request->get('name','');
    	$team = AboutTeam::where('name','like','%'.$name.'%')
    			->get();
    	$getKeys = $this->baseKey($request->all(),'set');
    	return view('Backend.About.team',[
    		'team'=>$team,
    		'getKeys' => $getKeys,
    		'request' => $request->all()
    	]);
    }

    public function team_add(Request $request)
    {
    	$name = $request->name;

    	if(AboutTeam::where('name',$name)->first())
    	{
    		return back()->with(['error_message'=>'团队已存在']);
    	}

    	if(AboutTeam::create(array('name'=>$name)))
    	{
    		return back()->with(['success_message'=>'添加成功']);
    	}else
    	{
    		return back()->with(['error_message'=>'添加失败']);
    	}
    }

    public function team_edit(Request $request)
    {
    	$name = $request->name;
    	$id = $request->id;
    	$model = AboutTeam::find($id);
    	if(!$model)
    	{
    		return back()->with(['error_message'=>'数据不存在']);
    	}

    	$team = AboutTeam::where('name',$name)->first();
    	if($team && $team->id != $model->id)
    	{
    		return back()->with(['error_message'=>'团队已存在']);
    	}

    	$model->name = $name;
    	$model->save();
    	return back()->with(['success_message'=>'编辑成功']);

    }
    public function team_del(Request $request)
    {
    	$id = $request->id;
    	if(AboutMember::where('team_id',$id)->first())
    	{
    		$this->error_message('已禁止删除');
    	}
    	AboutTeam::destroy($id);
    	$this->success_message('删除成功');
    }
    public function member(Request $request)
    {
		$this->SysConfingInit();
    	$name = $request->get('name','');
        $page = $request->get('page',1);
    	$team = AboutTeam::find($request->id);
    	$member = AboutMember::where('team_id',$request->id)
                        ->where('name','like','%'.$name.'%')
    					->orderBy('stort')
    					->paginate($this->_sizePage);
        $getKeys = $this->baseKey($request->all(),'set');
    	return view('Backend.About.member',[
    		'label' => $request->label,
    		'team' => $team,
    		'member' => $member,
    		'request' => $request->all(),
            'getKeys' => $getKeys
    	]);
    }

    public function member_add(Request $request)
    {
    	$data = $request->except('_token','file');
    	if(AboutMember::where('name',$data['name'])->first())
    	{
    		return back()->with(['error_message'=>'成员已存在']);
    	}
    	$res = AboutMember::create($data);
    	if(!$res)
    	{
    		return back()->with(['error_message'=>'添加失败']);
    	}
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
	                $url = $request->file->storeAs('/about/team/images',$newName,'backend');
	                if($url)
	                {   
	                   
	                    $path = env('UPLOAD_BACKEND').'/'.$url;
	                    $res->image = $path;
	                    $res->save();
	                }
	            }
	        }
		}
    	return back()->with(['success_message'=>'添加成功']);
    }

    public function member_edit(Request $request)
    {
    	$data = $request->except('_token','file');

    	$model = AboutMember::find($data['id']);
    	$member = AboutMember::where('name',$data['name'])->first();
    	if($member && $member->id != $data['id'])
    	{
    		return back()->with(['error_message'=>'成员已存在']);
    	}

    	AboutMember::where('id',$data['id'])->update($data);
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
	                $url = $request->file->storeAs('/about/team/images',$newName,'backend');
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
    	return back()->with(['success_message'=>'编辑成功']);
    }

    public function member_del(Request $request)
    {
    	$ids = $request->ids;
    	if(!is_array($ids))
    	{
    		$ids = array($ids);
    	}
    	foreach($ids as $v)
    	{
    		$tmp = AboutMember::find($v);
    		if($tmp && $tmp->image)
    		{
    			@unlink('.'.$tmp->image);
    		}
    	}
    	AboutMember::destroy($ids);
    	$this->success_message('删除成功');
    }

    public function link(Request $request)
    {
        $name = $request->get('name','');

        $link = AboutLink::where('name','like','%'.$name.'%')
                ->where('status',1)
                ->orderBy('stort')->get();
        return view('Backend.About.link',[
            'link'=>$link,
            'request'=>$request->all()
        ]);
    }

    public function link_re(Request $request)
    {
        $name = $request->get('name','');

        $link = AboutLink::where('name','like','%'.$name.'%')
                ->where('status',2)
                ->orderBy('stort')->get();
        return view('Backend.About.link_re',[
            'link'=>$link,
            'request'=>$request->all()
        ]);
    }

    public function link_add(Request $request)
    {
        $data = $request->except('_token');
        if(AboutLink::where('name',$data['name'])->first())
        {
            return back()->with(['error_message'=>'链接已存在']);
        }
        $res = AboutLink::create($data);
        if(!$res)
        {
            return back()->with(['error_message'=>'添加失败']);
        }else
        {
            return back()->with(['success_message'=>'添加成功']);
        }    
    }

    public function link_edit(Request $request)
    {
        $data = $request->except('_token');

        $model = AboutLink::find($data['id']);
        $link = AboutLink::where('name',$data['name'])->first();
        if($link && $link->id != $data['id'])
        {
            return back()->with(['error_message'=>'链接已存在']);
        }
        AboutLink::where('id',$data['id'])->update($data);
        return back()->with(['success_message'=>'修改成功']);

    }

    public function link_del(Request $request)
    {
        $ids = $request->ids;
        if(!is_array($ids))
        {
            $ids = array($ids);
        }
        AboutLink::destroy($ids);
        $this->success_message('删除成功');
    }

    public function carousel(Request $request)
    {
        $url = $request->get('url','');
        $carousel = AboutCarousel::where('url','like','%'.$url.'%')
                ->where('type',0)
                ->orderBy('stort')->get();
        return view('Backend.About.carousel',[
            'carousel'=>$carousel,
            'request'=>$request->all()
        ]);
    }
    public function carousel_web(Request $request)
    {
        $url = $request->get('url','');
        $carousel = AboutCarousel::where('url','like','%'.$url.'%')
                ->where('type',1)
                ->orderBy('stort')->get();
        return view('Backend.About.carousel_web',[
            'carousel'=>$carousel,
            'request'=>$request->all()
        ]);
    }

    public function carousel_add(Request $request)
    {
        $data = $request->except('_token','file');
        $model = AboutCarousel::where('url',$data['url'])->first();
        if($model && $model->url != 'javascript:;')
        {
            return back()->with(['error_message'=>'轮播已存在']);
        }
        $res = AboutCarousel::create($data);
        if(!$res)
        {
            return back()->with(['error_message'=>'添加失败']);
        }
        if($request->file && $request->file != "undefined")
        {
            if($request->hasFile('file'))
            {
                if($request->file('file')->isValid())
                {
                    $extension = $request->file->extension();
                    if($extension != 'jpg' && $extension != 'jpeg' && $extension !='png' && $extension != 'gif' )
                    {
                        $this->error_message('请上传图片');
                    }
                    $newName = time().mt_rand(11111,99999).'.'.$extension;
                    $url = $request->file->storeAs('/about/carousel/images',$newName,'backend');
                    if($url)
                    {   
                       
                        $path = env('UPLOAD_BACKEND').'/'.$url;
                        $res->image = $path;
                        $res->save();
                    }
                }
            }
        }
        return back()->with(['success_message'=>'添加成功']);
    }
    public function carousel_add_web(Request $request)
    {
        $data = $request->except('_token','file');
        $model = AboutCarousel::where('url',$data['url'])->first();
        if($model && $model->url != 'javascript:;')
        {
            return back()->with(['error_message'=>'轮播已存在']);
        }
        $res = AboutCarousel::create($data);
        if(!$res)
        {
            return back()->with(['error_message'=>'添加失败']);
        }
        if($request->file && $request->file != "undefined")
        {
            if($request->hasFile('file'))
            {
                if($request->file('file')->isValid())
                {
                    $extension = $request->file->extension();
                    if($extension != 'jpg' && $extension != 'jpeg' && $extension !='png' && $extension != 'gif' )
                    {
                        $this->error_message('请上传图片');
                    }
                    $newName = time().mt_rand(11111,99999).'.'.$extension;
                    $url = $request->file->storeAs('/about/carousel/images',$newName,'web_backend');
                    if($url)
                    {   
                       
                        $path = env('UPLOAD_BACKEND').'/'.$url;
                        $res->image = $path;
                        $res->save();
                    }
                }
            }
        }
        return back()->with(['success_message'=>'添加成功']);
    }
    public function carousel_edit(Request $request)
    {
        $data = $request->except('_token','file');

        $model = AboutCarousel::find($data['id']);
        $member = AboutCarousel::where('url',$data['url'])->where('type',0)->first();
        if($member && $member->id != $data['id'] && $member->url != 'javascript:;')
        {
            return back()->with(['error_message'=>'轮播已存在']);
        }

        AboutCarousel::where('id',$data['id'])->update($data);
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
                    $url = $request->file->storeAs('/about/carousel/images',$newName,'backend');
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
        return back()->with(['success_message'=>'编辑成功']);
    }
        public function carousel_edit_web(Request $request)
    {
        $data = $request->except('_token','file');

        $model = AboutCarousel::find($data['id']);
        $member = AboutCarousel::where('url',$data['url'])->where('type',1)->first();
        if($member && $member->id != $data['id'] && $member->url != 'javascript:;')
        {
            return back()->with(['error_message'=>'轮播已存在']);
        }

        AboutCarousel::where('id',$data['id'])->update($data);
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
                    $url = $request->file->storeAs('/about/carousel/images',$newName,'web_backend');
                    if($url)
                    {   
                       
                        $path = env('UPLOAD_BACKEND').'/'.$url;
                        if($model->image)
                        {  
                            @unlink('../../web/public'.$model->image);
                        }
                        $model->image = $path;
                        $model->save();
                    }
                }
            }
        }
        return back()->with(['success_message'=>'编辑成功']);
    }

    public function carousel_del(Request $request)
    {
        $ids = $request->ids;
        if(!is_array($ids))
        {
            $ids = array($ids);
        }
        foreach($ids as $v)
        {
            $tmp = AboutCarousel::find($v);
            if($tmp && $tmp->image)
            {
                @unlink('.'.$tmp->image);
            }
            $tmp = null;
        }
        AboutCarousel::destroy($ids);
        $this->success_message('删除成功');  
    }
    public function carousel_del_web(Request $request)
    {
        $ids = $request->ids;
        if(!is_array($ids))
        {
            $ids = array($ids);
        }
        foreach($ids as $v)
        {
            $tmp = AboutCarousel::find($v);
            if($tmp && $tmp->image)
            {
                @unlink('../../web/public'.$tmp->image);
            }
            $tmp = null;
        }
        AboutCarousel::destroy($ids);
        $this->success_message('删除成功');  
    }
}
