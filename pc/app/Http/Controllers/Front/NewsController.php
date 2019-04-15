<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\DynamicNewsClassify;
use App\Model\DynamicNews;
use App\Model\DynamicLabel;
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
                    if($news->label_id)
                    {
                        $remen = DynamicNews::where('classify_id',$news->classify_id)->where('label_id',$news->label_id)->orderBy('created_at','DESC')->offset(0)->limit(10)->get();

                    }else
                    {
                        $remen = DynamicNews::where('classify_id',$news->classify_id)->offset(0)->limit(10)->get();
                    }

                    $keyword['title'] = $news->titles;
                    $keyword['keyword'] = $news->keyword;
                    $keyword['description'] = $news->description;

                    return view('Front.News.details',[
                        'news'=>$news,
                        'remen' => $remen,
                        'keyword'=>$keyword,
                        'shang' => DynamicNews::where('classify_id',$news->classify_id)->where('created_at','<',$news->toArray()['created_at'])->orderBy('created_at','DESC')->first(),
                        'xia' => DynamicNews::where('classify_id',$news->classify_id)->where('created_at','>',$news->toArray()['created_at'])->orderBy('created_at')->first()

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
                  ->paginate($config->sizepage_front?$config->sizepage_front:10,null,'page',$page);
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
			'keyword' => $keyword
    	]);
    }
}
