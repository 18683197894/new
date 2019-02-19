@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/baoli.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">保利198</div>
                <div class="Place">楼盘地址:成都</div>
                <div class="Text">保利公园198项目位于位于成都北三环外蜀龙大道西侧，项目总占地约6000亩，规划有亚洲最大的2200亩郁金香公园、国际高尔夫生活和五星级酒店，总建筑面积在200万平米以上</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/baoli_1.png') }}" alt=""/>
                <div class="Text">浓缩品质生活，打造精品空间，让我们体验踱步惬意。客厅呈现出一种朦胧复古的高级感，将色运用到中式装修风格上，锦上添花，相得益彰。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/baoli_2.png') }}" alt=""/>
                <div class="Text">运用色系打中式样板房，在低饱和的色彩选择中随意组合搭配出优雅、温柔的感觉。带着幽幽的意境之美，泛着淡淡的柔和之光，这就是东方高级灰的生活美学。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/baoli_3.png') }}" alt=""/>
                <div class="Text">色彩上，采用柔和的中性色调加以留白，保持着“灰度”色调，给人优雅温馨、自然脱俗的感受，材质和色彩被极尽的克制，体现的是一种精致简单，真正的平静。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/baoli_4.png') }}" alt=""/>
                <div class="Text">卧室作为私密空间，也是人心性的体现，整体色调较为朴素，身处其中，每个细胞都放松下来，逃离了喧嚣，感受到一缕安宁与惬意，享受着此时的舒适</div>
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