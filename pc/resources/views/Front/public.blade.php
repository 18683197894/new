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

$link = App\Model\AboutLink::orderBy('stort')->get();
$banner = \App\Model\SysFrontKeyword::where('url',\Request::getRequestUri())->first();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class=" js mobile no-desktop no-ie chrome chrome68 root-section gradient rgba opacity textshadow multiplebgs boxshadow borderimage borderradius cssreflections csstransforms csstransitions no-touch retina fontface domloaded w-1025 gt-240 gt-320 gt-480 gt-640 gt-768 gt-800 gt-1024 lt-1280 lt-1440 lt-1680 lt-1920 portrait no-landscape" id="index-page">
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/front/public/css/header.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/public/css/footer.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/banner/css/Banner.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/banner/css/aos.css') }}">
    <script src="{{ asset('/front/banner/js/aos.js') }}"></script>
    <title>{{ $frontKeyword['title'] }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Keywords" content="{{ $frontKeyword['keyword'] }}">
    <meta name="description" content="{{ $frontKeyword['description'] }}">
@yield('css')
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?98669ef195655b47be18f778f438f15e";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
<div class="Header">
    <div class="Header_C">
      <h1> <a href="{{ url('/') }}"><img src="{{ asset('/front/public/img/Logo.png') }}" alt="建商集团" class="Logo"/></a></h1>
        <div class="Nav">
        @foreach($frontMenu as $val)
        <a href="{{ url($val->url) }}" @if(\Request::getRequestUri() == $val->url ) class="avtive" @endif ><span>{{ $val->title }}</span></a>
        @endforeach
        </div>
        <div class="Telephone">
            <div class="TOP">
                <img src="{{ asset('/front/public/img/Header_T.png') }}" alt=""/>
                <span>合作热线</span>
            </div>
            <div class="BOT">@php echo $webConfig->phone; @endphp</div>
        </div>
    </div>

</div>
@if(isset($banner->image) && !empty($banner->image))
<div class="Banner" data-aos="zoom-in">
   <img src="{{ asset($banner->image) }}" alt="#">
</div>
@endif

@yield('content')

<div class="Footer">
    <div class="juz">
        <div class="lianje avtive">
            @foreach($link as $l)
                @if($l->status == 1)
                    @if($l->url =='javascript:;')
                    <a href="{{ $l->url }}" class="xiaoshi">{{ $l->name }}</a>
                    @else
                    @if($l->type == 0)
                    <a href="{{ url($l->url) }}" class="xiaoshi">{{ $l->name }}</a>

                    @else
                    <a href="{{ $l->url }}" target="_blank" class="xiaoshi">{{ $l->name }}</a>
                    @endif
                    @endif
                @endif
            @endforeach
            @if(\Request::getRequestUri() == '/')
                <a href="javascript:;" class="youq">友情链接</a>
            @endif
        </div>
        <div class="friendship">
            <div class="friendship_link">
            @foreach($link as $ll)
                @if($ll->status == 2)
                    @if($ll->url =='javascript:;')
                    <a href="{{ $ll->url }}">{{ $ll->name }}</a>
                    @else
                    @if($ll->type == 0)
                    <a href="{{ url($ll->url) }}">{{ $ll->name }}</a>

                    @else
                    <a href="{{ $ll->url }}" target="_blank">{{ $ll->name }}</a>
                    @endif
                    @endif
                @endif
            @endforeach
            </div>
        </div>
        <span class="beian">{{ $webConfig->copyright }} &nbsp;&nbsp;&nbsp;{{ $webConfig->record }} @php echo $webConfig->statistical_code; @endphp</span>
        <div class="Weibo">
            <img src="{{ asset('/front/public/img/weixin.jpg') }}" alt=""/>
            <span>微信公众号</span>
        </div>
        <div class="Wechat">
            <img src="{{ asset('/front/public/img/weibo.png') }}" alt=""/>
            <span>微博号</span>
        </div>

    </div>
</div>

<script src="{{ asset('/front/public/js/jquery-1.8.3.js') }}"></script>
<!-- <script src="{{ asset('/front/public/js/Header.js') }}"></script> -->
<script>
    $(".lianje .youq").mouseover(function(){
        $(".juz .friendship").addClass("avtive");
    });
    $(".lianje .xiaoshi").mouseover(function(){
        $(".juz .friendship").removeClass("avtive");
    });
</script>
<script>
    AOS.init();
</script>
@yield('js')
@php echo $webConfig->baidu_push @endphp
@php echo $webConfig->push_360 @endphp
</body>
</html>
