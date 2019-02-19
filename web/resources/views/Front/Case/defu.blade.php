@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/defu.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">德福公元</div>
                <div class="Place">楼盘地址:宜宾</div>
                <div class="Text">宜宾德福公元总建筑面积10.6平方公里，项目规模10余万方，与建商集团合作前，仅卖出20余套，装修套餐进驻后项目一售而空</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/defu_1.png') }}" alt=""/>
                <div class="Text">会客厅由设计师纯手工晕染编制的七彩挂毯弱化了强硬的空间视觉，这个新家已然传递出淳朴而又细腻的生活气息。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/defu_2.png') }}" alt=""/>
                <div class="Text">移步即入景的一片白桦林打破了常规的陈设方式，拉宽了餐厅的纵深感，糅合着生命的永恒，诠释着人与自然的和谐韵律，在美好的时光遇见最好的自己。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/defu_3.png') }}" alt=""/>
                <div class="Text">组合了丝绒面料、毛织地毯、精致水晶、尊贵皮质等现代元素，呈现出品质生活的现代追求。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/defu_4.png') }}" alt=""/>
                <div class="Text">设计巧妙介入了都会元素，塑造出让人迷恋的简洁、轻奢与雅致，结束了一天忙碌的工作，享受此刻的美好。</div>
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