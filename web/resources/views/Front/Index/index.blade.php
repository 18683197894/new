<?php
$webConfig = \App\Model\SysWebConfig::find(1);
if(!isset($keyword))
{   
    $keyword = \App\Model\SysFrontKeyword::where('url',\Request::getRequestUri())->first();
    $keyword = !empty($keyword)?$keyword->toArray():array();
    $keyword['title'] = isset($keyword['title'])?$keyword['title'] :'建商联盟';
    $keyword['keyword'] = isset($keyword['keyword'])?$keyword['keyword'] :'建商联盟';
    $keyword['description'] = isset($keyword['description'])?$keyword['description']:'建商联盟';
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
    <link rel="stylesheet" href="{{ asset('/front/css/swiper.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/css/footer.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/css/index.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/css/Classify.css') }}"/>
    <title>{{ $frontKeyword['title'] }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Keywords" content="{{ $frontKeyword['keyword'] }}">
    <meta name="description" content="{{ $frontKeyword['description'] }}">
</head>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?a97b8dfaf8b73f8cab734e8fc95ee176";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<body>
<div class="header">
    <img src="{{ asset('/front/img/LOGO.gif') }}" alt="" class="header_logo"/>
    <div class="header_Telephone">
        <img src="{{ asset('/front/img/Telephone_dh.png') }}" alt=""/>
    </div>
</div>
<!--轮播-->
<div class="swiper-container">
    <ul class="swiper-wrapper">
        @foreach($lunbo as $v)
        <li class="swiper-slide"><a href="{{ $v->url }}"><img src="{{ $v->image }}" alt="11"/></a></li>
        @endforeach
    </ul>
    <div class="swiper-pagination"></div>
</div>
<!--入口-->
<div class="Entrance">
    <a href="{{ url('/hardcover.html') }}">
        <img src="{{ asset('/front/img/Entrance1.gif') }}" alt="" class="Entrance_img"/>
        <span>批量精装</span>
    </a>
    <a href="{{ url('/discount.html') }}">
        <img src="{{ asset('/front/img/Entrance2.gif') }}" alt="" class="Entrance_img"/>
        <span>优惠活动</span>
    </a>
    <a href="{{ url('/case.html') }}">
        <img src="{{ asset('/front/img/Entrance3.gif') }}" alt="" class="Entrance_img"/>
        <span>精彩案列</span>
    </a>
    <a href="{{ url('team.html') }}">
        <img src="{{ asset('/front/img/Entrance4.gif') }}" alt="" class="Entrance_img"/>
        <span>设计团队</span>
    </a>
    <a href="{{ url('/honor.html') }}">
        <img src="{{ asset('/front/img/Entrance5.gif') }}" alt="" class="Entrance_img"/>
        <span>集团荣誉</span>
    </a>
    <a href="{{ url('/partner.html') }}">
        <img src="{{ asset('/front/img/Entrance6.gif') }}" alt="" class="Entrance_img"/>
        <span>合作伙伴</span>
    </a>
    <a href="{{ url('/guarantee.html') }}">
        <img src="{{ asset('/front/img/Entrance7.gif') }}" alt="" class="Entrance_img"/>
        <span>服务保障</span>
    </a>
    <a href="{{ url('/about.html') }}">
        <img src="{{ asset('/front/img/Entrance8.gif') }}" alt="" class="Entrance_img"/>
        <span>关于我们</span>
    </a>
</div>
<!--建商模式-->
<div class="Mode">
    <div class="Title">
        <div class="Name">建商模式</div>
        <!--分割线-->
        <div class="xian_l"></div>
        <div class="xian_r"></div>

    </div>
    <div class="Brief">助力项目价值发掘，丰富住房营销内涵</div>
    <a href="#" class="Mode_img">
        <img src="{{ asset('/front/img/Mode_img.gif') }}" alt=""/>
    </a>
</div>
<!--六大优势-->
<div class="Advantage">
    <div class="Title">
        <div class="Name">六大优势</div>
        <!--分割线-->
        <div class="xian_l"></div>
        <div class="xian_r"></div>
    </div>
    <div class="Brief">助您行业升级转型，快人一步勇夺先机</div>
    <div class="Advantage_a">
        <a href="#">
            <img src="{{ asset('/front/img/Advantage_a1.png') }}" alt=""/>
            <span class="Text">免费设计咨询</span>
        </a>
        <a href="#">
            <img src="{{ asset('/front/img/Advantage_a2.png') }}" alt=""/>
            <span class="Text">免费装修样板间</span>
        </a>
        <a href="#">
            <img src="{{ asset('/front/img/Advantage_a1.png') }}" alt=""/>
            <span class="Text">免费设计售楼部</span>
        </a>
        <a href="#">
            <img src="{{ asset('/front/img/Advantage_a6.png') }}" alt=""/>
            <span class="Text">免费销售代理</span>
        </a>
        <a href="#">
            <img src="{{ asset('/front/img/Advantage_a5.png') }}" alt=""/>
            <span class="Text">免费物管业务</span>
        </a>
        <a href="#">
            <img src="{{ asset('/front/img/Advantage_a4.png') }}" alt=""/>
            <span class="Text">建筑工程装修六折</span>
        </a>
    </div>
</div>
<!--合作洽谈-->
<div class="Make">
    <div class="Title">
        <div class="Name">合作洽谈</div>
        <!--分割线-->
        <div class="xian_l"></div>
        <div class="xian_r"></div>
    </div>
    <div class="Brief">合作共赢，从第一次有效沟通开始</div>
    <div class="Make_i">
        <input type="text" id="Project" placeholder="项目名称："/>
        <sapn class="Make_x"></sapn>
        <input type="text" id="Company" placeholder="公司名称："/>
        <sapn class="Make_x"></sapn>
        <input type="text" id="Name" placeholder="您的称呼："/>
        <sapn class="Make_x"></sapn>
        <input type="text" id="Contact" placeholder="联系方式："/>
        <a href="javascript:;" class="Submit">提交</a>
    </div>
</div>
<!--了解建商-->
<div class="Understand">
    <div class="Title">
        <div class="Name">了解建商</div>
        <!--分割线-->
        <div class="xian_l"></div>
        <div class="xian_r"></div>
    </div>
    <div class="Understand_a">
        @foreach($news as $v)
        <a href="{{ url($v->Classify->url.'/'.$v->id) }}">
            <img src="{{ str_replace('//m','//www',asset($v->exhibition_image)) }}" alt=""/>
            <span>{{ $v->title }}</span>
        </a>
        @endforeach
    </div>
</div>
<!--占位置给尾部-->
<div class="Occupy"></div>
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
    <a href="http://p.qiao.baidu.com/cps/chat?siteId=13027239&userId=27102984" target="_blank" class="footer_Kefu">
        <img src="{{ asset('/front/img/kefu.gif') }}" alt=""/>
        <span>客服</span>
    </a>
    <a href="https://book.yunzhan365.com/zfki/bvkq/mobile/index.html" target="_blank" class="footer_Huace">
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
<script src="{{ asset('/front/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/front/js/rem.js') }}"></script>
<script src="{{ asset('/front/js/Classify.js') }}"></script>
<script src="{{ asset('/front/js/zepto.min.js') }}"></script>
<script src="{{ asset('/front/js/swiper.min.js') }}"></script>
<script src="{{ asset('/front/js/index.js') }}" charset="utf-8" ></script>
<script>
    var swiper = new Swiper('.swiper-container',{
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.swiper-pagination',
        autoplay : 3000,
        speed:300,
        loop: true,
        autoplayDisableOnInteraction : false
    });
</script>
</body>
</html>
