<?php

namespace App\Http\Controllers\Backend\Fdc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fdc\DynamicNews;
use App\Model\FileUploadsInfo;
class DynamicController extends Controller
{
    public function news(Request $request)
    {   
        $this->SysConfingInit();
        $page = $request->get('page',1);
        $title = $request->get('title','');
        $getKey = array('page'=>$page,'title'=>$title,'key'=>$request->get('key',false),'start'=>$request->get('start',''),'end'=>$request->get('end',''));
        $a = !empty($request->key)?'=':'!=';
    	$news = DynamicNews::where('key',$a,$request->get('key',NULL))
                            ->where('title','like','%'.$title.'%')
                            ->orderBy('created_at','DESC')
                            ->paginate($this->_sizePage);

        return view('Backend.Fdc.Dynamic.news',[
                'news'=>$news,
                'request'=>$request->all(),
                'getKeys'=>$this->baseKey($getKey,'set'),
                'project' => $this->getFdcProjectList()
        ]);
    }
    public function news_add(Request $request)
    {   
    	return view('Backend.Fdc.Dynamic.news_add',['label'=>$request->label,'project'=>$this->getFdcProjectList()]);
    }
    public function news_adds(Request $request)
    {   
        $default = NULL;
    	$data = $request->except('_token','imageName');
    	$data['source'] = !empty($request->source)?$request->source:'建商家居';
        $data['titles'] = !empty($request->titles)?$request->titles:$request->title;
        $data['keyword'] = !empty($request->keyword)?$request->keyword:$request->title;
        $data['exhibition_image'] = !empty($request->exhibition_image)?'success':$default;
        $data['status'] = 1;
        if(!$request->description)
        {
            $data['description'] = !empty($request->synopsis)?$request->synopsis:$request->title;
        }

        preg_match_all('/(\/uploads\/ueditor\/(file|image|video)\/)(\d{10,}\.(.*?))\"/',$data['content'],$files);


        if($data['exhibition_image'] == 'success')
        {
            if($request->hasFile('exhibition_image'))
            {
                if($request->file('exhibition_image')->isValid())
                {
                    $extension = $request->exhibition_image->extension();
                    $newName = time().mt_rand(11111,99999).'.'.$extension;
                    $url = $request->exhibition_image->storeAs('/news/images',$newName,'backend');
                    if($url)
                    {
                        $data['exhibition_image'] = env('UPLOAD_BACKEND').'/'.$url;
                    }else
                    {
                        $data['exhibition_image'] = $default;
                    }
                }else
                {
                    $data['exhibition_image'] = $default;
                }
            }else
            {
                $data['exhibition_image'] = $default;
            }
        }
        $fdata = array();
        if(!empty($files[0]))
        {   
            for($i = 0; $i < count($files[0]); $i++)
            {   
                $tmp = array(
                    'path' => $files[1][$i],
                    'title' => $files[3][$i],
                    'type' => $files[4][$i],
                    'member_id' => $request->session()->get('backend')['id'],
                    'member_name' => $request->session()->get('backend')['username'],
                    'ip' => $request->session()->get('backend')['last_ip'],
                    'remarks'=>'FDC新闻上传('.$data['title'].')',
                    'category' => 'UEditor',
                    'index_num' => 1,
                );
                $init = false;
                foreach($fdata as $k => $v)
                {   
                    if($tmp['title'] == $v['title'])
                    {
                        $fdata[$k]['index_num'] += 1;
                        $init = true;
                        break;
                    }
                }
                if($init == false)
                {
                    array_push($fdata,$tmp);
                }
                
            }
        }
        $res = DynamicNews::create($data);

        if($res)
        {   
            foreach($fdata as $val)
            {
                $model = FileUploadsInfo::where('title',$val['title'])->where('path',$val['path'])->first();
                if($model)
                {
                    $model->index_num += intval($val['index_num']);
                    $model->save();
                }else
                {
                    FileUploadsInfo::create($val);
                }
            }
            return redirect('/backend/fdc/dynamic/news')->with(['success_message'=>'上传成功']);
        }else
        {
            if($data['exhibition_image'])
            {
                @unlink(substr($data['exhibition_image'],1));
                return back()->withInput()->with(['error_message'=>'上传失败']);
            }
        }
    }
    public function news_edit(Request $request)
    {   

        if($request->isMethod('get'))
        {   
            $id = $request->id;
            $label = $request->label;
            $news = DynamicNews::where('id',$id)->first();
            if(!$news)
            {
                return back()->with('error_message','数据不存在');
            }
            return view('Backend.Fdc.Dynamic.news_edit',[
                    'label' => $label,
                    'news' => $news,
                    'getKeys' => $request->get('getKeys',''),
                    'project'=>$this->getFdcProjectList()
            ]);
        }else
        {   
            $data = $request->except('_token','imageName','id','getKeys');
            $data['source'] = !empty($request->source)?$request->source:'建商家居';
            $data['titles'] = !empty($request->titles)?$request->titles:$request->title;
            $data['keyword'] = !empty($request->keyword)?$request->keyword:$request->title;
            if(!$request->description)
            {
                $data['description'] = !empty($request->synopsis)?$request->synopsis:$request->title;
            }
			if($data['created_at'])
			{
				$data['created_at'] = strtotime($data['created_at']);
			}else
			{
				unset($data['created']);
			}
           
			$news = DynamicNews::find($request->id);
            $imageInit = false;
            if($request->hasFile('exhibition_image'))
            {   
                if($request->file('exhibition_image')->isValid())
                {
                    $extension = $request->exhibition_image->extension();
                    $newName = time().mt_rand(11111,99999).'.'.$extension;
                    $url = $request->exhibition_image->storeAs('/news/images',$newName,'backend');
                    if($url)
                    {   
                        $data['exhibition_image'] = env('UPLOAD_BACKEND').'/'.$url;
                        $imageInit = true;
                    }
                }
            }
            
            $res = DynamicNews::where('id',$request->id)->update($data);
            if($res)
            {   
                if($news->content !== $data['content'])
                {
                    preg_match_all('/(\/uploads\/ueditor\/(file|image|video)\/)(\d{10,}\.(.*?))\"/',$news->content,$usedFile);
                    preg_match_all('/(\/uploads\/ueditor\/(file|image|video)\/)(\d{10,}\.(.*?))\"/',$data['content'],$newFile);
                    if($usedFile !== $newFile)
                    {   
                        if(!empty($usedFile[0]))
                        {
                            foreach($usedFile[0] as $k => $v)
                            {
                                $model = FileUploadsInfo::where('path',$usedFile[1][$k])->where('title',$usedFile[3][$k])->first();
                                if($model)
                                {
                                    $model->index_num -= 1;
                                    
                                    if($model->index_num <= 0)
                                    {
                                        FileUploadsInfo::where('id',$model->id)->delete();
                                    }else
                                    {
                                        $model->save();
                                    }
                                }
                            }
                        }

                        if(!empty($newFile[0]))
                        {   

                            foreach($newFile[0] as $key => $val)
                            {
                                $model = FileUploadsInfo::where('path',$newFile[1][$key])->where('title',$newFile[3][$key])->first();
                                if($model)
                                {
                                    $model->index_num += 1;
                                    $model->save();
                                }else
                                {
                                    $tmp = array(
                                        'path' => $newFile[1][$key],
                                        'title' => $newFile[3][$key],
                                        'type' => $newFile[4][$key],
                                        'member_id' => $request->session()->get('backend')['id'],
                                        'member_name' => $request->session()->get('backend')['username'],
                                        'ip' => $request->session()->get('backend')['last_ip'],
                                        'remarks'=>'新闻修改('.$data['title'].')',
                                        'category' => 'UEditor',
                                        'index_num' => 1,
                                    );
                                    FileUploadsInfo::create($tmp);
                                }
                            }
                        }

                    }
                }

                if($imageInit == True)
                {   
                    @unlink(substr($news->exhibition_image,1));
                }
                return redirect('/backend/fdc/dynamic/news'.$this->baseKey($request->getKeys,'get'))->with(['success_message'=>'修改成功']);
            }else
            {
                if($imageInit == True)
                {
                    @unlink(substr($data['exhibition_image']),1);
                    return back()->withInput()->with(['error_message'=>'修改失败']);
                }
            }
        }
    }
    public function news_del(Request $request)
    {   
        $ids = $request->id;
        if(!is_array($ids))
        {
            $ids= array($ids);
        }
        $models = DynamicNews::find($ids);
        $res = DynamicNews::destroy($ids);
        
        if($res)
        {
            foreach($models as $k => $v)
            {
                if($v->exhibition_image)
                {
                    @unlink(substr($v->exhibition_image,1));
                }
                preg_match_all('/(\/uploads\/ueditor\/(file|image|video)\/)(\d{10,}\.(.*?))\"/',$v->content,$files);
                if(!empty($files[0]))
                {
                    foreach($files[0] as $key => $val)
                    {
                        $model = FileUploadsInfo::where('path',$files[1][$key])->where('title',$files[3][$key])->first();
                        if($model)
                        {
                            $model->index_num -= 1;
                            
                            if($model->index_num <= 0)
                            {
                                FileUploadsInfo::where('id',$model->id)->delete();
                            }else
                            {
                                $model->save();
                            }
                        }
                    }

                }
            }
            $this->success_message('删除成功');
        }else
        {
            $this->error_message('删除失败 数据不存在');
        }
        
        // $this->success_message('删除成功');
    }
}
