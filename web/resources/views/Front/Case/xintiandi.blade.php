@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/zeshang.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">浙商临港新天地</div>
                <div class="Place">楼盘地址:宜宾</div>
                <div class="Text">宜宾浙商临港新天地总建筑面积160平方公里，浙商集团宜宾代表作项目，总规模16万方商业综合体，其中近千套L OFT及平层公寓。</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/zeshang_1.png') }}" alt=""/>
                <div class="Text">村上春树对幸福的描摹极致细微：生活中小小的幸运与快乐，流淌在生活的每个瞬间且稍纵即逝的美好，内心的宽容与满足，对人生的感恩和珍惜。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/zeshang_2.png') }}" alt=""/>
                <div class="Text">当空间与人文、艺术、生活紧密结合时，所创造出来不单是居住或使用的空间容器，而是表述故事与片段的场景。它十足窄小，紧紧包围的簇拥感，梦幻、柔软、温暖。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/zeshang_3.png') }}" alt=""/>
                <div class="Text">鹅黄与天蓝的明媚气息在空气中流淌，散发青春的味道。在阳光晴好的日子里，换上便装，把大自然最美的纹理和灵动的姿态捕捉，而后定格为家永恒的背景，那便是幸福的底色。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/zeshang_4.png') }}" alt=""/>
                <div class="Text">想象穿着家居服，带着俏皮的绒线帽，专注于研磨新入手的豆子，尝试缤纷马卡龙的最新做法，把甜腻的日子晒到融化。</div>
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