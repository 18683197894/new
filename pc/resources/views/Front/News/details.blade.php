@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('front/news/css/News_list.css') }}"/>

@endsection

@section('content')
<div class="Crumbs">
    <div class="Crumbs_d">
        <span>当前位置</span><span>></span><a href="{{ url($news->Classify->url) }}">{{ $news->Classify->classify_name }}</a><span>></span><a href="#">正文</a>
    </div>

</div>
<div class="Conn">

    <div class="Conn_t">
        <!--Conn_l里面放新闻内容-->
        <div class="Conn_l">
        <div class="Title">
    <h1><div class="Text">{{ $news->title }}</div></h1>
<div class="xibao"><span>时间：{{ $news->created_at->format('Y-m-d') }}</span><span>发布作者：{{ $news->source }}</span><span>公众号：jsjt_cd</span></div>        
</div>

        	@php
echo $news->content;
        	@endphp
        </div>
        <div class="Conn_r">
            <div class="Title">
                相关推荐
            </div>
            <i class="Dividing"></i>
            @foreach($remen as $value)
            <a href="{{ url($value->Classify->url.'/'.$value->id) }}">
                <img src="{{ !empty($value->exhibition_image)?$value->exhibition_image:env('UPLOAD_NEWS_HEAD_DEFAULT') }}" alt=""/>
                <div class="neir">
                    <div class="Time">{{ $value->created_at->format('Y-m-d') }}</div>
                    <div class="Text">
                        {{ $value->title }}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="fenye" data-aos="zoom-in">

        @if(!empty($shang))
        <a href="{{ url($shang->Classify->url.'/'.$shang->id) }}" class="shang">上一条：{{ $shang->title }}</a>
        @endif
        @if(!empty($xia))
        <a href="{{ url($xia->Classify->url.'/'.$xia->id) }}" class="xia">下一条：{{ $xia->title }}</a>
        @endif
    </div>
</div>
@endsection

@section('js')

@endsection