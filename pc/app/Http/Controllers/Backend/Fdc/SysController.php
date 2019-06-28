<?php

namespace App\Http\Controllers\Backend\Fdc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fdc\FrontKeyword;
use App\Model\Fdc\Banner;
class SysController extends Controller
{
    public function keyword(Request $request)
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
        $keyword = FrontKeyword::select('*')
        ->where('url','like','%'.$url.'%')
        ->orderBy('created_at','DESC')
        ->paginate($this->_sizePage);

        return view('Backend.Fdc.Sys.front_keyword',[
            'keyword'=> $keyword,
            'path'=>$path,
            'request'=>$request->all()
            ]);
    }

    public function keyword_add(Request $request)
    {
        $data = $request->except('_token');
        $data['url'] = $data['urls'];
        unset($data['urls']);
        if($data['url'] != '/' )
        {
            $data['url'] = $data['url'];
        }
        $model =  FrontKeyword::where('url',$data['url'])->first();
        if($model)
        {
            return redirect('/backend/fdc/sys-keyword')->with(['error_message'=>'当前路由已存在']);
        }
        $res = FrontKeyword::create($data);
        if($res)
        {
            return redirect('/backend/fdc/sys-keyword')->with(['success_message'=>'添加成功']);
        }else
        {
            return redirect('/backend/fdc/sys-keyword')->with(['error_message'=>'新增失败']);
        }
    }

    public function keyword_edit(Request $request)
    {
        $data = $request->post('data');
        $id = $data['id'];
        $models = FrontKeyword::where('url',$data['url'])->where('id','!=',$id)->first();
        if($models)
        {
            $this->error_message('当前路由已存在');
        }
        $res = FrontKeyword::where('id',$id)->update($data);
        if($res)
        {
            $this->success_message('修改成功');
        }else
        {
            $this->error_message('修改失败');
        }
    }

    public function keyword_del(Request $request)
    {
        $ids = $request->ids;
        $res = FrontKeyword::destroy($ids);
        if($res)
        {
            $this->success_message('删除成功');
        }else
        {
            $this->error_message('删除失败');
        }
    }
    public function banner(Request $request)
    {   
        $a = !empty($request->key)?'=':'!=';
        $carousel = Banner::where('key',$a,$request->get('key',NULL))
                ->orderBy('key')
                ->orderBy('stort')
                ->get();
        return view('Backend.Fdc.Sys.banner',[
            'carousel'=>$carousel,
            'request'=>$request->all(),
            'page' => $this->getFdcPageList() 
        ]);
    }
    public function banner_add(Request $request)
    {
        $data = $request->except('_token','file');
        $model = Banner::where('url',$data['url'])->where('key',$data['key'])->first();
        if($model && $model->url != 'javascript:;')
        {
            return back()->with(['error_message'=>'轮播已存在']);
        }
        $res = Banner::create($data);
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
    public function banner_edit(Request $request)
    {
        $data = $request->except('_token','file');

        $model = Banner::find($data['id']);
        $member = Banner::where('url',$data['url'])->where('key',$data['key'])->first();
        if($member && $member->id != $data['id'] && $member->url != 'javascript:;')
        {
            return back()->with(['error_message'=>'轮播已存在']);
        }

        Banner::where('id',$data['id'])->update($data);
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
    public function banner_del(Request $request)
    {
        $ids = $request->ids;
        if(!is_array($ids))
        {
            $ids = array($ids);
        }
        foreach($ids as $v)
        {
            $tmp = Banner::find($v);
            if($tmp && $tmp->image)
            {
                @unlink('.'.$tmp->image);
            }
            $tmp = null;
        }
        Banner::destroy($ids);
        $this->success_message('删除成功');  
    }
}
