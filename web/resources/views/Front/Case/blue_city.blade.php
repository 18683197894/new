@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/zhongzhi.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">北京中治蓝城</div>
                <div class="Place">楼盘地址:北京</div>
                <div class="Text">北京中治蓝城总建筑面积160平方公里，位于北京市房山区城关镇饶乐府村的中治蓝城项目，我公司全面承揽了该项目的住宅批量精装业务。</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/zhongzhi_1.png') }}" alt=""/>
                <div class="Text">定位于年轻人打造的创业性质的居住空间，以盒子为主导，用镜面分割拉伸空间感，大面积采用木质、软包提高柔和舒适度。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/zhongzhi_2.png') }}" alt=""/>
                <div class="Text">入户的走廊墙面是镜面，木质的餐桌，木色的玻璃吊灯，整体空间和谐温馨，餐厅对应的一面用了镜面，从视觉上增大空间。一整排的悬空柜实用性和美观些都是很好的。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/zhongzhi_3.png') }}" alt=""/>
                <div class="Text">整体是浅灰色，背景是用的橙色的硬包，一面整体的柜子，中间是原墙的电视，两边是衣柜，合理化，橙色的背景，浅灰色的床品和窗帘。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/zhongzhi_4.png') }}" alt=""/>
                <div class="Text">厨房是半开放的设计，墙面则是用的颜值很高的小白砖，简单、清新，让当代居住者在繁忙喧嚣的城市中找到属于自己的一份归属感。</div>
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