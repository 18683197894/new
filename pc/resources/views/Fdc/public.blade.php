@php
if(!isset($keyword))
{      
    $keyword = \App\Model\Fdc\FrontKeyword::where('url',\Request::route()->uri === '/'?'/':'/'.\Request::route()->uri)->first();
    $keyword = !empty($keyword)?$keyword->toArray():array();
    $keyword['title'] = isset($keyword['title'])?$keyword['title'] :'';
    $keyword['keyword'] = isset($keyword['keyword'])?$keyword['keyword'] :'';
    $keyword['description'] = isset($keyword['description'])?$keyword['description']:'';
}
@endphp
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/front/fdc/css/header.css') }}"/>
    <title>{{ $keyword['title'] }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $keyword['keyword'] }}">
    <meta name="description" content="{{ $keyword['description'] }}">
    @yield('css')
</head>
<body>
<div class="Nav">
    <div class="Centered">
        <a href="#"  class="Logo">
            <img src="{{ asset('/front/fdc/img/House_logo.png') }}" alt=""/>
        </a>
        <div class="Daohang fr">
            <a href="{{ url('/') }}">首页</a>
            <a href="javascript:;">商务合作</a>
            <a href="javascript:;" class="jiange">
                微信
                <div class="yingcang">
                    <img src="{{ asset('/front/fdc/img/weixin.png') }}" alt=""/>
                </div>
            </a>
            <a href="javascript:;"class="weibo">
                微博
                <div class="ycbo">
                    <img src="{{ asset('/front/fdc/img/weibo.png') }}" alt=""/>
                </div>
            </a>
            <div class="lianxi">
                <img src="{{ asset('/front/fdc/img/lxdh.png') }}" alt=""/>
                <div class="dh">联系电话：028-62230059</div>
            </div>
        </div>
    </div>
</div>
@yield('content')
<script src="{{ asset('/front/fdc/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/front/fdc/js/header.js') }}"></script>
@yield('js')
</body>
</html>