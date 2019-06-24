<?php

namespace App\Http\Controllers\Backend\Fdc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fdc\FrontKeyword;
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
}
