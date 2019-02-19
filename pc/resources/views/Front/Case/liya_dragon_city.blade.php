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
        <img src="{{ asset('/front/case/img/liya.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">丽雅龙城</div>
            <div class="xijie">
                <div class="time">楼盘地址:宜宾</div>
            </div>
            <div class="neir">宜宾·丽雅龙城总建筑面积130.3平方公里，丽雅龙城位于宜宾市南岸西区的大地坡区域内，与中坝片区一桥之隔，区位条件优越，是城市发展的主要方向之一。我公司全面承揽了该项目的住宅批量精装业务。</div>
            
        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/liya-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">在这个生活节奏越来越快的时代，一处闲适自如的生活居所，那便是家。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">棕色的背景墙、零零星星的浮雕、还有素雅的床品，给人以心神安定的居住感受，窗台上别致的摆饰从中透露出典雅的文艺气息和老人颐养天年的生活习性。</div>
                </div>
                <img src="{{ asset('/front/case/img/liya-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/liya-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">白色作为卧室的基本色调，延续主人房的风格，搭配以灰色和朦胧橙的床品，和谐辉映，轻与重之间没有繁复也没有冲突，整个空间给人以舒适自然的感觉。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">沉稳内敛，橙色的挂画在空间中起到了点缀的作用，细微处更见品质，充满着一股潇洒风雅的书卷气，一幅“室雅何须大，花香不在多”的闲适生活情境映入眼前。</div>
                </div>
                <img src="{{ asset('/front/case/img/liya-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/defu.html') }}" class="shang">上一条：德福公园</a>
            <a href="{{ url('/case/luneng-landscape.html') }}" class="xia">下一条：鲁能山水原著</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection