<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DynamicNewsClassify;
use App\Model\DynamicNews;
use App\Model\SysFrontKeyword;
class NewsController extends Controller
{
    public function news(Request $request,$name=null,$id=null)
    {	
        if($id === null)
        {
            $page =1;
        }else
        {   
            if(!preg_match('/^p[1-9](\d*?)$/',$id))
            {   
                if(preg_match('/^[1-9](\d*?)$/',$id))
                {
                    $news = DynamicNews::find($id);
                    if(!$news)
                    {   
                        return view('Error.404',['path'=>'/hyxw']);
                    }
                    $news->total_num += 1;
                    $news->save();
                    
                    $remen = DynamicNews::where('classify_id',$news->classify_id)->orderBy
                    ('total_num','DESC')->offset(0)->limit(3)->get();
                    $web = \App\Model\SysWebConfig::find(1);
                    $keyword['title'] = !empty($web->title)?$news->titles.'_'.$web->title:$news->titles;
                    $keyword['keyword'] = $news->keyword;
                    $keyword['description'] = $news->description;
                    $news->content = str_replace('src="/uploads/ueditor/image/','src="'.str_replace('//m','//www',asset('/uploads/ueditor/image/')).'/',$news->content);
                    // dd($news->content);
                    return view('Front.News.details',[
                        'news'=>$news,
                        'remen' => $remen,
                        'keyword'=>$keyword,
                        'label'=>array('url'=>'/'.$news->classify->url,'title'=>'新闻资讯')
                      ]);

                }
                return view('Error.404',['path'=>'/hyxw']);
            }
            $page = intval(substr($id,1));
        }
    	$config = $this->getSystemConfig();
    	$classify = DynamicNewsClassify::where('url',$name)->first();
    	$news = DynamicNews::where('classify_id',$classify->id)
                ->orderBy('created_at','DESC')
    			->simplePaginate($config->sizepage_front?$config->sizepage_front:10,null,'page',$page);
        $links = $news->links();
        if($id)
        {
        $links = preg_replace('/[\d]*\?page=/','',$links);

        }else
        {

        $links = preg_replace('/[\d]*\?page=/','/p',$links);
        }
        $links = preg_replace('/\/p1\"/','"',$links);
    	$remen = DynamicNews::where('classify_id',$classify->id)->orderBy('total_num','DESC')->offset(0)->limit(5)->get();
		$keyword = SysFrontKeyword::where('url','/'.$classify->url)->first();
        if($keyword)
        {
            $keyword = $keyword->toArray();
        }
    	   	return view('Front.News.classify',[
    		'classify' => $classify,
    		'news' => $news,
    		'classifys' => DynamicNewsClassify::orderBy('id','DESC')->get(),
    		'remen'=>$remen,
            'links' => $links,
            'label'=>array('url'=>'/','title'=>$classify->classify_name),
			'keyword'=>$keyword
    	]);
    }
}
