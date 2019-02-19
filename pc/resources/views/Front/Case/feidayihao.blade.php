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
        <img src="{{ asset('/front/case/img/feitian.jpg') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">飞大壹号公馆</div>
            <div class="xijie">
                <div class="time">楼盘地址：成都</div>
            </div>
            <div class="neir">飞大·一号公馆总建筑面积130平方公里成都壹号公馆位于成都市中心草市街商圈，是香港飞大集团入驻成都的首个地产力作，开创了成都地产青年风格新纪元。
            </div>
        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/feitian-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">本设计已经定格了的硬装对软装设计其实是有局限性，只能在已有硬装的基础上发挥</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">业主对未来的家没有清晰的想法，只有个模糊的概念，设计师以色彩的视觉效果为起始点，确定了业主想要的风格、材料和平面布局等，营造出可以直接触碰到业主内心的氛围。</div>
                </div>
                <img src="{{ asset('/front/case/img/feitian-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/feitian-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">将居住者的生活习惯及喜好融入整个设计中，让这个温暖舒适的新家承载业主的欢声笑语，满足所有关于美好生活的想象。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">生活有时似白百叶窗边的几支粉色格瑞利绣球，淡雅温润。生活有时似一支婉转悠扬的小提琴独奏曲，细腻灵动。生活有时似一方水墨留白，虚实生相。家是生活的容器，家的样子藏着生活的模样。</div>
                </div>
                <img src="{{ asset('/front/case/img/feitian-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/maikebiology.html') }}" class="shang">上一条：迈克生物专家公寓</a>
            <a href="{{ url('/case/innovation-incubation.html') }}" class="xia">下一条：创新孵化基地人才公寓</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection