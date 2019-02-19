@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/chuangfu.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">创新孵化基地人才公寓</div>
                <div class="Place">楼盘地址:成都</div>
                <div class="Text">创新化基地人才公寓总投资14亿，占地260亩，宜宾市政府形象工程项目，建商集团承接高端人才公寓精装</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/chuangfu_1.png') }}" alt=""/>
                <div class="Text">借助原木的温婉、棉麻的素净、鲜活的植物等元素，让室内充盈明澈清新的北欧风情</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/chuangfu_2.png') }}" alt=""/>
                <div class="Text">毫无矫揉的柠檬黄与偶尔出现的蓝调迸发出沁人心脾的清新感，剔除琐碎，留下轻快 ，以现代简约的质感和雅致，给繁乱混杂的日常赋予轻松的情境。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/chuangfu_3.png') }}" alt=""/>
                <div class="Text">在歌舞升平的城市，于轻纱帷幔下安于一隅，感受平淡日子里的刺，也是岁月沉过后的自由 安然。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/chuangfu_4.png') }}" alt=""/>
                <div class="Text">视觉上舍弃性冷淡的北欧风，通过对色块的巧妙应用，让空间散发耀眼和希望，给人带来意想不到的视觉冲击力。</div>
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