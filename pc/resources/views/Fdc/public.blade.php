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
    <link rel="stylesheet" href="{{ asset('/front/fdc/css/footer.css') }}"/>
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
<div class="Footer">
    <div class="Juzhong">
        <div class="Juzhong_fl">
            <div class="Title">关于我们</div>
            <a href="#">买房找建商</a>
            <a href="#">清水房送精装·精装房送家具家电</a>
        </div>
        <div class="Juzhong_fr">
            <div class="Title">关于我们</div>
            <a href="javascript:;">地址：成都市青羊区青阳工业总部基地H区7栋</a>
            <a href="javascript:;">电话：028-62230059</a>
        </div>
    </div>
    <div class="Banquan"><span>opyRight 2017-2020 建商集团版权所有</span> <span>ICP备案：蜀ICP备17010220</span></div>
    <div class="Erweima">
        <div class="Auto">
            <div class="weibo">
                <img src="{{ asset('/front/fdc/img/weibo.png') }}" alt=""/>
                <span>微博公众号</span>
            </div>
            <div class="weixin">
                <img src="{{ asset('/front/fdc/img/weixin.png') }}" alt=""/>
                <span>微信公众号</span>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/front/fdc/js/jquery-1.8.3.js') }}"></script>
<script src="{{ asset('/front/fdc/js/header.js') }}"></script>
@yield('js')
</body>
</html>