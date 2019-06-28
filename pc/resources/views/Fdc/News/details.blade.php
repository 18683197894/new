@extends('Fdc.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/front/fdc/css/swiper.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('/front/fdc/css/details.css') }}"/>
@endsection

@section('content')
<!--占头部位置-->
<div class="konge"></div>
<!--轮播-->
<div class="swiper-container">
    <ul class="swiper-wrapper">
        @foreach($luobo as $k => $v)
        <li class="swiper-slide"><img src="{{ asset($v->image) }}" alt="11"/></li>
        @endforeach
    </ul>
    <div class="swiper-pagination"></div>
</div>
<div class="Content">
    <div class="Wenzhang">
        <div class="Miaobao">
            <a href="#">首页</a>
            <span>></span>
            <a href="{{ $key['url'] }}">{{ $key['title'] }}</a>
            <span>></span>
            <a href="javascript:;">正文</a>
        </div>
        <div class="Title">{{ $news->title }}</div>
        <div class="Xiaobiao">
            <span>发布时间：{{ $news->created_at->format('Y-m-d') }}</span>
            <span>发布作者：{{ $news->source }}</span>
            <span>公众号：jsjt_cd</span>
        </div>
        <div class="Text">
            @php
                echo $news->content;
            @endphp
        </div>
        <div class="Paging">
            <a href="{{ isset($shang->id)?url($key['url'].'/'.$shang->id):'javascript:;' }}" class="fl">上一篇：{{ isset($shang->title)?$shang->title:'无' }}</a>
            <a href="{{ isset($xia->id)?url($key['url'].'/'.$xia->id):'javascript:;' }}" class="fr">下一篇：{{ isset($xia->title)?$xia->title:'无'}}</a>
        </div>
    </div>
    <div class="Daohang">
        <div class="Title">
            相关推荐
            <span></span>
        </div>
        @foreach($remen as $val)
        <a href="{{ url($key['url'].'/'.$val->id) }}">
            <img src="{{ !empty($val->exhibition_image)?$val->exhibition_image:env('UPLOAD_NEWS_HEAD_DEFAULT') }}" alt=""/>
            <div class="Wenzi">
                <div class="Name">{{ $val->title }}</div>
                <div class="Time">{{ $val->created_at->format('Y-m-d') }}</div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection

@section('js')

@endsection