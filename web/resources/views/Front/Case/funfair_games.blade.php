@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/jianianhua.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">海上嘉年华公寓项目海洋之心</div>
                <div class="Place">楼盘地址:青岛</div>
                <div class="Text">青岛海上嘉年华总建筑面积810平方公里，地处青岛市凤凰岛旅游度假区，我司受托负责该项目公寓批量装饰工程，与开发商精诚合作，为项目的价值提升、营销畅旺做出独有贡献。</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/jianianhua_1.png') }}" alt=""/>
                <div class="Text">人身，总要在娑婆中历练道心，总要在尘埃中开出清莲，花开花谢总会在缺憾中修得圆满，来这里，桃源里，寻找最美好的自己。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/jianianhua_2.png') }}" alt=""/>
                <div class="Text">素雅的原木色与活泼的朦胧橙在空间中相互融合，一半静谧，一半绚烂，动静自如。大厅以棕色和素白色为主色调，朦胧橙的椅子打破了这之间的沉静，柔和的阳光。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/jianianhua_3.png') }}" alt=""/>
                <div class="Text">我们于日用必需的东西之外，必须还有一点无用的游戏和享乐，生活才有意义。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/jianianhua_4.png') }}" alt=""/>
                <div class="Text">简约、舒适。整个空间摈弃过多装饰色调，干净清雅，以纯白色、原木色及温和的灰蓝色、浅褐色为主，白墙、原木、创意灯具，恰到好处的留白与尺度营造出恬静宜人的生活场景。</div>
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