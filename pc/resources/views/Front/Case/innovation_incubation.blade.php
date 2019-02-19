@extends('Front.public')

@section('css')
   	<link rel="stylesheet" href="{{ asset('/front/index/css/shutter.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/case/css/CaseDetails.css') }}"/>
@endsection

@section('content')

<div class="Crumbs">
    <span>当前位置</span><o>></o><a href="{{ url('/case.html') }}">精彩案列</a><o>></o><a href="javascript:;">案列详情</a>
</div>

<div class="CaseDetails">
    <div class="CaseDetails_list">
        <img src="{{ asset('/front/case/img/chuangfu.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">创新孵化基地人才公寓</div>
            <div class="xijie">
                <div class="time">楼盘地址：宜宾</div>
            </div>
            <div class="neir">创新化基地人才公寓总投资14亿，占地260亩，宜宾市政府形象工程项目，建商集团承接高端人才公寓精装</div>

        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/chuangfu-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">借助原木的温婉、棉麻的素净、鲜活的植物等元素，让室内充盈明澈清新的北欧风情 。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">毫无矫揉的柠檬黄与偶尔出现的蓝调迸发出沁人心脾的清新感，剔除琐碎，留下轻快 ，以现代简约的质感和雅致，给繁乱混杂的日常赋予轻松的情境。</div>
                </div>
                <img src="{{ asset('/front/case/img/chuangfu-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/chuangfu-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">在歌舞升平的城市，于轻纱帷幔下安于一隅，感受平淡日子里的刺，也是岁月沉过后的自由 安然。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">视觉上舍弃性冷淡的北欧风，通过对色块的巧妙应用，让空间散发耀眼和希望，给人带来意想不到的视觉冲击力。</div>
                </div>
                <img src="{{ asset('/front/case/img/chuangfu-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/feidayihao.html') }}" class="shang">上一条：飞大壹号公馆</a>
            <a href="{{ url('/case/defu.html') }}" class="xia">下一条：德福公园</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection