@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/maikebiology.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">迈克生物专家公寓</div>
                <div class="Place">楼盘地址:成都</div>
                <div class="Text">迈克生物专家公寓总建筑面积180平方公里，“迈克生物”是经国家相关部门认证的“高新技术企业”，深交所上市公司。我公司团队负责承建装修迈克生物专家公寓，在业主方、政府相关部门]领导的指导关怀下，保质保量的圆满完成了工程任务。</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/maikebiology_1.png') }}" alt=""/>
                <div class="Text">将客餐厅区分开后，其实客厅区域还是挺大的。除了两面大书架外，阳台处制作了一个既浪漫又实用的储物式榻榻米。不常加班，榻榻米上摆了个小桌子，偶尔需要的话可以用用。平时就用来玩玩电脑，喝喝咖啡</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/maikebiology_2.png') }}" alt=""/>
                <div class="Text">主卧室背景墙地板上墙，上半部分石膏板做灯槽。床头灯不一定要对称，根据自己的生活习惯和喜好选择就行，就像本案一样，既然一方需要阅读灯，一方喜欢吊灯，干脆都装，只要注意颜色、材质搭配即可。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/maikebiology_3.png') }}" alt=""/>
                <div class="Text">改成开放式厨房后，少了移门的限制，弱化了空间的局促感。而且得以借用过道空间，增加了厨房操作空间的同时不仅放下了一个对开门的冰箱。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/maikebiology_4.png') }}" alt=""/>
                <div class="Text">衣帽间一侧的橙色墙面提亮了整个空间，普通涂料上加了一层专门的透明涂料，可以直接用水彩笔在墙面涂写。</div>
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