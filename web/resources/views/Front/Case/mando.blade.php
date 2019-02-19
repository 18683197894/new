@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/mando.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">贵州万都铭城</div>
                <div class="Place">楼盘地址:贵州</div>
                <div class="Text">贵州万都铭城总建筑面积平方公里，贵州织金万都置业标杆项目，毕节市重点招商引资项目，织金唯一商业综合体，近干套精装公寓。</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/mando_1.png') }}" alt=""/>
                <div class="Text">常有人说：“如何体现小空间的价值？”我最先想到的，是格局和细节，在吸收建筑景观优势的同时，最大化地挖掘功能与美学的结合。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/mando_2.png') }}" alt=""/>
                <div class="Text">以现代简约的语言，透过空间的虚实处理，模糊了功能区间的界限，形成一个自由的空间，共享与私密的角色互换，既有延展过渡，又有细节叠加，衬托出丰富多元的空间情感。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/mando_3.png') }}" alt=""/>
                <div class="Text">空间游离在黑白灰之间，并采用棕黄色作为跳跃色，舒适的沙发、灰色条纹地毯、时尚的抱枕和经典的钓鱼灯，营造出丰富多元的空间情感。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/mando_4.png') }}" alt=""/>
                <div class="Text">蓝绿色作为空间的主题色，在空间中得到充分体现。实木复合型地板覆盖整体空间，木质纹理本身成为装饰的一部分。色泽交替与造型转换，都在不经意间彰显着主人的个性与品位。</div>
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