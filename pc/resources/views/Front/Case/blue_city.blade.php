@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/case/css/CaseDetails.css') }}"/>
@endsection

@section('content')
<div class="Crumbs">
    <span>当前位置</span><o>></o><a href="{{ url('/case.html') }}">精彩案列</a><o>></o><a href="javascript:;">案列详情</a>
</div>

<div class="CaseDetails">
    <div class="CaseDetails_list">
        <img src="{{ asset('/front/case/img/zhongzhi.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">北京中治蓝城</div>
            <div class="xijie">
                <div class="time">楼盘地址:北京</div>
            </div>
            <div class="neir">北京中治蓝城总建筑面积160平方公里，位于北京市房山区城关镇饶乐府村的中治蓝城项目，我公司全面承揽了该项目的住宅批量精装业务。</div>
            
        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/zhongzhi-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">定位于年轻人打造的创业性质的居住空间，以盒子为主导，用镜面分割拉伸空间感，大面积采用木质、软包提高柔和舒适度。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">入户的走廊墙面是镜面，木质的餐桌，木色的玻璃吊灯，整体空间和谐温馨，餐厅对应的一面用了镜面，从视觉上增大空间。一整排的悬空柜实用性和美观些都是很好的。</div>
                </div>
                <img src="{{ asset('/front/case/img/zhongzhi-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/zhongzhi-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">整体是浅灰色，背景是用的橙色的硬包，一面整体的柜子，中间是原墙的电视，两边是衣柜，合理化，橙色的背景，浅灰色的床品和窗帘。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">厨房是半开放的设计，墙面则是用的颜值很高的小白砖，简单、清新，让当代居住者在繁忙喧嚣的城市中找到属于自己的一份归属感。</div>
                </div>
                <img src="{{ asset('/front/case/img/zhongzhi-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/mando.html') }}" class="shang">上一条：贵州万都铭城</a>
            <a href="{{ url('/case/funfair-games.html') }}" class="xia">下一条：海上嘉年华公寓项目海洋之心</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection