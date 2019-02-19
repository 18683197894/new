@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/feida.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">飞大壹号公馆</div>
                <div class="Place">楼盘地址:成都</div>
                <div class="Text">飞大·一号公馆总建筑面积130平方公里成都壹号公馆位于成都市中心草市街商圈，是香港飞大集团入驻成都的首个地产力作，开创了成都地产青年风格新纪元。楼盘图片：</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/feida_1.png') }}" alt=""/>
                <div class="Text">本设计已经定格了的硬装对软装设计其实是有局限性，只能在已有硬装的基础上发挥</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/feida_2.png') }}" alt=""/>
                <div class="Text">业主对未来的家没有清晰的想法，只有个模糊的概念，设计师以色彩的视觉效果为起始点，确定了业主想要的风格、材料和平面布局等，营造出可以直接触碰到业主内心的氛围。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/feida_3.png') }}" alt=""/>
                <div class="Text">将居住者的生活习惯及喜好融入整个设计中，让这个温暖舒适的新家承载业主的欢声笑语，满足所有关于美好生活的想象。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/feida_4.png') }}" alt=""/>
                <div class="Text">生活有时似白百叶窗边的几支粉色格瑞利绣球，淡雅温润。生活有时似一支婉转悠扬的小提琴独奏曲，细腻灵动。生活有时似一方水墨留白，虚实生相。家是生活的容器，家的样子藏着生活的模样。</div>
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