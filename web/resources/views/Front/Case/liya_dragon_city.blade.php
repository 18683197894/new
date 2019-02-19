@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/liya.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">丽雅龙城</div>
                <div class="Place">楼盘地址:宜宾</div>
                <div class="Text">宜宾·丽雅龙城总建筑面积130.3平方公里，丽雅龙城位于宜宾市南岸西区的大地坡区域内，与中坝片区一桥之隔，区位条件优越，是城市发展的主要方向之一。我公司全面承揽了该项目的住宅批量精装业务。</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/liya_1.png') }}" alt=""/>
                <div class="Text">在这个生活节奏越来越快的时代，一处闲适自如的生活居所，那便是家。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/liya_2.png') }}" alt=""/>
                <div class="Text">棕色的背景墙、零零星星的浮雕、还有素雅的床品，给人以心神安定的居住感受，窗台上别致的摆饰从中透露出典雅的文艺气息和老人颐养天年的生活习性。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/liya_3.png') }}" alt=""/>
                <div class="Text">白色作为卧室的基本色调，延续主人房的风格，搭配以灰色和朦胧橙的床品，和谐辉映，轻与重之间没有繁复也没有冲突，整个空间给人以舒适自然的感觉。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/liya_4.png') }}" alt=""/>
                <div class="Text">沉稳内敛，橙色的挂画在空间中起到了点缀的作用，细微处更见品质，充满着一股潇洒风雅的书卷气，一幅“室雅何须大，花香不在多”的闲适生活情境映入眼前。</div>
            </a>
        </div>
    </div>
</div>

<div class="Brand">
    <div class="Brand_Jz">
        <div class="Title">
            <span>合作品牌</span>
            <i></i>
        </div>
        <div class="Brand_a">
            <div class="Brand_Show">
            	@foreach($arr as $v)
                <a href="#">
                	@if($loop->index <= 3 )
                    <img src="{{ asset('front/img/Strategy_Show'.$v.'.png') }}" alt=""/>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!--占位置给尾部-->
<div class="Occupy"></div>
<!--尾部-->
@endsection

@section('js')

@endsection