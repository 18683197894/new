<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DynamicNews;
use App\Model\FileUploadsInfo;
use App\Model\SysSystemConfig;
use App\Model\DynamicNewsClassify;
use App\Model\DynamicLabel;
class DynamicController extends Controller
{   
    public function news_index(Request $request)
    {   
        $this->SysConfingInit();
        
        $page = $request->get('page',1);
        $title = $request->get('title','');
        $start = !empty($request->start)?strtotime($request->start):0;
        $end = !empty($request->end)?strtotime($request->end)+86400:time();
        $getKey = array('page'=>$page,'title'=>$title,'classify_id'=>$request->get('classify_id',false),'start'=>$request->get('start',''),'end'=>$request->get('end',''));
        $classify = DynamicNewsClassify::get();
        $a = !empty($request->classify_id)?'=':'!=';
    	$news = DynamicNews::where('classify_id',$a,$request->get('classify_id',NULL))
                            ->where('title','like','%'.$title.'%')
                            ->where('created_at','>=',$start)
                            ->where('created_at','<=',$end)
                            ->orderBy('created_at','DESC')
                            ->paginate($this->_sizePage);

        return view('Backend.Dynamic.news_index',[
                'news'=>$news,
                'request'=>$request->all(),
                'getKeys'=>$this->baseKey($getKey,'set'),
                'classify'=> $classify
        ]);
    }

    public function news_status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        if(!$id || !in_array($status,array(0,1))) $this->error_message('参数错误');
        $model = DynamicNews::find($request->id);
        if($model->top == 1 && $request->status !== 1)
        {
            $this->error_message('当前新闻已置顶 无法禁用');
        }
        $model->status = $request->status;
        $model->save();
        $this->success_message('操作成功');
       
    }

    public function news_top(Request $request)
    {
        $model = DynamicNews::find($request->id);
        if($model->status == 0 && $request->top == 1)
        {
            $this->error_message('当前新闻已禁用 无法置顶');
        }
        $count = DynamicNews::where('top',1)->get()->count();
        if($count >= 4 && $request->top == 1)
        {
            $this->error_message('置顶位已满');
        }
        $model->top = $request->top;
        $model->save();
        $this->success_message('成功');
    }
    public function news_edit(Request $request)
    {   

        if($request->isMethod('get'))
        {   
            $id = $request->id;
            $label = $request->label;
            $news = DynamicNews::where('id',$id)->first();
            $classify = DynamicNewsClassify::get();
            if(!$news)
            {
                return back()->with('error_message','数据不存在');
            }
            return view('Backend.Dynamic.news_edit',[
                    'label' => $label,
                    'labels' => DynamicLabel::get(),
                    'news' => $news,
                    'getKeys' => $request->get('getKeys',''),
                    'classify' => $classify
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
                return redirect('/backend/dynamic/news-index'.$this->baseKey($request->getKeys,'get'))->with(['success_message'=>'修改成功']);
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
    public function news_add(Request $request)
    {   
        $classify = DynamicNewsClassify::get();
        $labels  = DynamicLabel::get();
    	return view('Backend.Dynamic.news_add',['labels'=>$labels,'label'=>$request->label,'classify'=>$classify]);
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
                    'remarks'=>'新闻上传('.$data['title'].')',
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
            return redirect('/backend/dynamic/news-index')->with(['success_message'=>'上传成功']);
        }else
        {
            if($data['exhibition_image'])
            {
                @unlink(substr($data['exhibition_image'],1));
                return back()->withInput()->with(['error_message'=>'上传失败']);
            }
        }
    }

    public function label(Request $request)
    {
        $this->SysConfingInit();
        
        $name = $request->get('name','');
        $label = DynamicLabel::where('name','like','%'.$name.'%')
                            ->orderBy('stort')
                            ->paginate($this->_sizePage);

        return view('Backend.Dynamic.news_label',[
                'label'=>$label,
                'request'=>$request->all(),
        ]);
    }

    public function label_add(Request $request)
    {
        $name = $request->name;
        $stort = $request->stort;

        if(DynamicLabel::where('name',$name)->first())
        {
            return back()->withInput()->with(['error_message'=>'标签名已存在']);
        }

        if(DynamicLabel::create(array('name'=>$name,'stort'=>$stort)))
        {
            return back()->withInput()->with(['success_message'=>'添加成功']);
        }else
        {
            return back()->withInput()->with(['error_message'=>'添加失败']);
        }
    }

    public function label_edit(Request $request)
    {
        $id = $request->data['id'];
        $name = $request->data['name'];
        $stort = $request->data['stort'];

        $model = DynamicLabel::find($id);
        $label = DynamicLabel::where('name',$name)->first();

        if($label && $label->id != $model->id)
        {
            return back()->withInput()->with(['error_message'=>'标签名已存在']);
        }

        $model->name = $name;
        $model->stort = $stort;
        $model->save();
        $this->success_message('修改成功');

    }

    public function label_del(Request $request)
    {
        $ids = $request->ids;
        if(!is_array($ids))
        {
            $ids = array($ids);
        }
        foreach($ids as $k => $v)
        {
            DynamicNews::where('label_id',$v)->delete();
        }
        DynamicLabel::destroy($ids);
        $this->success_message('删除成功');
    }

    public function news_copy(Request $request)
    {
        if($request->tips == 'tx')
        {
        $res = [];
        for($i=1;$i<=$request->page;$i++)
        {   

            $res_tmp = json_decode($this->sendhttp($request->url,['cid'=>$request->cid,'p'=>$request->start+$i],'GET'),True);
            if($res_tmp)
            {
                $res = array_merge($res,$res_tmp);
            }
        }
        $max = count($res);
        if($max <= 0)
        {
            return response()->json(['status'=>'no','error'=>'没有爬取到文章!']);
        }

        $titles = DynamicNews::get();
        foreach($res as $k => $v)
        {
            foreach($titles as $kk => $vv)
            {
                if(trim($v['title']) == trim($vv->title))
                {
                    unset($res[$k]);
                }
            }
        }
        $mymax = count($res);
        if($mymax <= 0)
        {   
            $this->error_message('数据库已过滤全部文章');
            // return response()->json(['status'=>'no','error'=>'数据库已过滤全部文章!']);
        }

        $keymax = 0;
        if($request->key)
        {
            $keys = explode('-',$request->key);
            foreach($res as $k => $v)
            {   
                foreach($keys as $kk => $vv)
                {   
                    trim($vv);
                    $preg = "/{$vv}/";
                    if(preg_match($preg, trim($v['title'])))
                    {
                        unset($res[$k]);
                        $keymax += 1;
                    }
                }
            }
        }
        if(count($res) <= 0 )
        {   
            $this->error_message("共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇");
            // return response()->json(['status'=>'no','error'=>"共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇"]);
        }
        $result = [];
        
        foreach($res as $k => $v)
        {   
            $v['titleimg'] = json_decode($v['smeta'],True)['thumb'][0];
            $result[$k]['title'] = $v['title'];
            $result[$k]['exhibition_image'] = $v['titleimg'];
            // $result[$k]['time'] = time();
            // $result[$k]['yuan'] = '建商家居';
            $result[$k]['total_num'] = 0;
            $result[$k]['status'] = 1;
            $result[$k]['top'] = 0;
            $result[$k]['classify_id'] = $request->pid;
            $result[$k]['synopsis'] = $v['desc'];
            // $result[$k]['zhi'] = 0;
            // $result[$k]['szhi'] = 0;
            $result[$k]['keyword'] = $v['title'].'建商家居,建商新闻动态，宜宾装修新闻，宜宾家居新闻';
            $result[$k]['description'] = $v['desc'];
            $result[$k]['titles'] = $v['title'];
            $content = (string) $this->sendhttp("http://www.jia360.com/new/".$v['id'].'.html',null,'GET');
            
            preg_match('/<div class="newsD_contend">(.*?)<\/div>/', $content,$contents);
            if(!isset($contents[1]) or strlen($contents[1]) > 65000 )
            {   
                $mymax += 1;
                unset($result[$k]);
                continue;
            }


            $result[$k]['yuan'] = '建商家居';
            // （来源：九正建材网）
            preg_match('/（来源：(.*?)）/', $content,$yuan1);
            if(isset($yuan1[1]) && !empty($yuan1[1]))
            {
                $result[$k]['content'] = $contents[1].'<br>';
                continue;
            }else
            {
                preg_match('/<span class="source fr" style="margin-top: 12px;">来源：(.*?) <\/span>/', $content,$yuan2);
                $yuan3 = '<p style="margin-bottom: 15px; line-height: 1.75em; text-indent: 2em;">（来源：'.$yuan2[1].'）</p><br>';
                $result[$k]['content'] = $contents[1].$yuan3.'<br>';
                continue;
            }
        }
        foreach ($result as $key => $value) {
            $value['source'] = $value['yuan'];
            unset($value['yuan']); 
            DynamicNews::create($value);
        }
        $this->success_message("共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇");
        // return response()->json(['status'=>'ok','redirect'=>"/jslmadmin/newslei/newsindex/{$request->pid}",'info'=>"共爬取".$max."篇文章,数据库过滤".($max-$mymax)."篇,关键字过滤".$keymax."篇"]);
        }
    }



    public function sendhttp($url,$data,$init)
    {   
        
        // 拼接参数
        $urlData = '';
        if($data)
        {   
            foreach($data as $k => $v)
            {
                $urlData .= '&'.$k.'='.$v;
            }
            $urlData = preg_replace('/&/','?',$urlData,1);
        }
        $ip = $this->Rand_IP();
        $header = array('CLIENT-IP:'.$ip,'X-FORWARDED-FOR:'.$ip,);
        
        $curlobj = curl_init();
        //设置访问的url
        curl_setopt($curlobj, CURLOPT_URL, $url.$urlData ); 
        curl_setopt($curlobj, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curlobj, CURLOPT_REFERER, $this->Rand_Url());
        //执行后不直接打印出
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);  
     
        //设置https 支持
        date_default_timezone_get('PRC');   //使用cookies时，必须先设置时区
        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, 0);  //终止从服务端验证
     
        $output = curl_exec($curlobj);  //执行获取内容
        curl_close($curlobj); 
        return $output;
    }

    public function Rand_IP(){

        $ip2id= round(rand(600000, 2550000) / 10000); //第一种方法，直接生成
        $ip3id= round(rand(600000, 2550000) / 10000);
        $ip4id= round(rand(600000, 2550000) / 10000);
        //下面是第二种方法，在以下数据中随机抽取
        $arr_1 = array("218","218","66","66","218","218","60","60","202","204","66","66","66","59","61","60","222","221","66","59","60","60","66","218","218","62","63","64","66","66","122","211");
        $randarr= mt_rand(0,count($arr_1)-1);
        $ip1id = $arr_1[$randarr];
        return $ip1id.".".$ip2id.".".$ip3id.".".$ip4id;
    }
    public function Rand_Url()
    {
        $url = array('http://www.csdn.net/','http://www.baidu.com','https://www.so.com/','https://www.google.com','http://www.sogou.com','http://www.bing.com');
        return array_rand($url);
    }
}
