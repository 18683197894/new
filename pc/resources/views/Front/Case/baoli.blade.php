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
        <img src="{{ asset('/front/case/img/baoli-1.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">保利198</div>

            <div class="xijie">
                <div class="time">楼盘地址：成都</div>
            </div>
            <div class="neir">保利公园198项目位于位于成都北三环外蜀龙大道西侧，项目总占地约6000亩，规划有亚洲最大的2200亩郁金香公园、国际高尔夫生活和五星级酒店，总建筑面积在200万平米以上</div>
            
        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/baoli198-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">浓缩品质生活，打造精品空间，让我们体验踱步惬意。客厅呈现出一种朦胧复古的高级感，将色运用到中式装修风格上，锦上添花，相得益彰。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">运用色系打中式样板房，在低饱和的色彩选择中随意组合搭配出优雅、温柔的感觉。带着幽幽的意境之美，泛着淡淡的柔和之光，这就是东方高级灰的生活美学。</div>
                </div>
                <img src="{{ asset('/front/case/img/baoli198-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/baoli198-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">色彩上，采用柔和的中性色调加以留白，保持着“灰度”色调，给人优雅温馨、自然脱俗的感受，材质和色彩被极尽的克制，体现的是一种精致简单，真正的平静。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">卧室作为私密空间，也是人心性的体现，整体色调较为朴素，身处其中，每个细胞都放松下来，逃离了喧嚣，感受到一缕安宁与惬意，享受着此时的舒适</div>
                </div>
                <img src="{{ asset('/front/case/img/baoli198-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <!-- <a href="#" class="shang">上一条：德福公元</a> -->
            <a href="{{ url('/case/maikebiology.html') }}" class="xia">下一条：迈克生物专家公寓</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection