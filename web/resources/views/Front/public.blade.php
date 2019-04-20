<?php
$webConfig = \App\Model\SysWebConfig::find(1);
if(!isset($keyword))
{   
    $keyword = \App\Model\SysFrontKeyword::where('url',\Request::route()->uri === '/'?'/':'/'.\Request::route()->uri)->first();
    $keyword = !empty($keyword)?$keyword->toArray():array();
    $keyword['title'] = isset($keyword['title'])?$keyword['title'] :'';
    $keyword['keyword'] = isset($keyword['keyword'])?$keyword['keyword'] :'';
    $keyword['description'] = isset($keyword['description'])?$keyword['description']:'';
}
$frontKeyword['title'] = $webConfig->title ?$keyword['title'].'_'. $webConfig->title:$keyword['title'] ;
$frontKeyword['keyword'] = $webConfig->keyword ?$keyword['keyword'].','. $webConfig->keyword:$keyword['keyword'] ;
$frontKeyword['description'] = $webConfig->description?$keyword['description'].','.$webConfig->description:$keyword['description'];
$frontMenu = App\Model\SysFrontMenu::where('status','!=',0)
                                  ->where('level',1)
                                  ->orderBy('sort')
                                  ->with(['getmenus'=>function($query){
                                        return $query->where('status','!=',0)->orderBy('sort')->get();
                                  }])
                              ->get();

?>
<!DOCTYPE html>
<html data-use-rem="750">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/front/css/reset.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/css/header.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/css/footer.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/css/Classify.css') }}"/>
    <title>{{ $frontKeyword['title'] }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Keywords" content="{{ $frontKeyword['keyword'] }}">
    <meta name="description" content="{{ $frontKeyword['description'] }}">
	@yield('css')
	<script>
		//百度统计
		var _hmt = _hmt || [];
		(function() {
  			var hm = document.createElement("script");
  			hm.src = "https://hm.baidu.com/hm.js?0c0cc9613ccbe6fd5bb3c6d2a25cef53";
  			var s = document.getElementsByTagName("script")[0]; 
  			s.parentNode.insertBefore(hm, s);
		})();
	</script>
</head>    
<body>

<div class="header">
    <div class="header_T">
        <a href="{{ $label['url'] }}" class="History">
            <img src="{{ asset('/front/img/History.gif') }}" alt=""/>
        </a>
        <div class="Title">{{ $label['title'] }}</div>
        <a href="javasceipt::" class="Share">
            <img src="{{ asset('/front/img/Share.gif') }}" alt=""/>
        </a>
    </div>
</div>

@yield('content')
<!--尾部-->
<div class="footer">
    <a href="{{ url('/') }}" class="footer_index">
        <img src="{{ asset('/front/img/House_index.gif') }}" alt=""/>
        <span>首页</span>
    </a>
    <a href="javascript:;" class="footer_Classify">
        <img src="{{ asset('/front/img/Classify.gif') }}" alt=""/>
        <span>分类</span>
    </a>
    <a href='tel:{{ str_replace("&nbsp;","",$webConfig->phone)}}' class="footer_Te" >
        <img src="{{ asset('/front/img/index_te.gif') }}" alt=""/>
        <span>电话咨询</span>
    </a>
    <a href="http://p.qiao.baidu.com/cps/chat?siteId=13305483&userId=27651107&cp=&cr=&cw=mobile" target="_blank" class="footer_Kefu">
        <img src="{{ asset('/front/img/kefu.gif') }}" alt=""/>
        <div class="footerNum">1</div>
        <span>客服</span>
    </a>
    <a href="https://www.yunzhan365.com/47318499.html" target="_blank" class="footer_Huace">
        <img src="{{ asset('/front/img/huace.gif') }}" alt=""/>
        <span>画册</span>
    </a>
</div>
<div class="Classify">
    <!--背景色-->
    <div class="Classify_Bg"></div>
    <div class="Classify_Te">
        <div class="Classify_Te_a">
            <a href="{{ url('/hardcover.html') }}" class="link">
                批量精装修
            </a>
        </div>
        <div class="Classify_Te_a">
            <a href="{{ url('/discount.html') }}" class="link">
                优惠活动
            </a>
        </div>
        <!--精彩案列有选择的楼盘-->
        <div class="Classify_Te_a">
            <a href="JavaScript:;" class="link">
                精彩案例
            </a>
            <div class="Ca_xz">
                <a href="{{ url('/case/baoli.html') }}">保利198</a>
                <a href="{{ url('/case/maikebiology.html') }}">迈克生物专家公寓</a>
                <a href="{{ url('/case/feidayihao.html') }}">飞大壹号公馆</a>
                <a href="{{ url('/case/innovation-incubation.html') }}">创新孵化基地人才公寓</a>
                <a href="{{ url('/case/defu.html') }}">德福公园</a>
                <a href="{{ url('/case/liya-dragon-city.html') }}">丽雅龙城</a>
                <a href="{{ url('/case/luneng-landscape.html') }}">鲁能山水原著</a>
                <a href="{{ url('/case/xintiandi.html') }}">浙商临港新天地</a>
                <a href="{{ url('/case/sunshine100.html') }}">重庆阳光100国际新城</a>
                <a href="{{ url('/case/mando.html') }}">贵州万都铭城</a>
                <a href="{{ url('/case/blue-city.html') }}">北京中治蓝城</a>
                <a href="{{ url('/case/funfair-games.html') }}">海上嘉年华公寓项目海洋之心</a>
            </div>
        </div>
        <div class="Classify_Te_a">
            <a href="{{ url('/honor.html') }}" class="link">
                集团荣誉
            </a>
        </div>
        <div class="Classify_Te_a">
            <a href="{{ url('/partner.html') }}" class="link">
                合作伙伴
            </a>
        </div>
        <div class="Classify_Te_a">
            <a href="{{ url('/guarantee.html') }}" class="link">
                服务保障
            </a>
        </div>
        <div class="Classify_Te_a">
            <a href="{{ url('/about.html') }}" class="link">
                关于我们
            </a>
        </div>
        <!--新闻资讯有选择的的资讯-->
        <div class="Classify_Te_a New_sx">
            <a href="javascript:;" class="link">
                新闻资讯
            </a>
            <div class="New_xz">
                <a href="{{ url('/hyxw') }}">行业动态</a>
                <a href="{{ url('/gsxw') }}">公司动态</a>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/front/js/zepto.min.js') }}"></script>
<script src="{{ asset('/front/js/rem.js') }}"></script>
<script src="{{ asset('/front/js/Classify.js') }}"></script>
<script type="text/javascript">
    $(".footer_Kefu").click(function(){
        $(".footer_Kefu .footerNum").addClass("avtive")
    });
</script>
@yield('js')
</body>
</html>
