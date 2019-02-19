@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/luneng.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">鲁能山水原著</div>
                <div class="Place">楼盘地址:宜宾</div>
                <div class="Text">宜宾鲁能山水原著总建筑面积1610平方公里，宜宾西区最大的楼盘项目，我司作为项目住房批量装饰工程合作方，为项目的价值提升营销畅旺做出了独有贡献，得到了开发商股东的一致肯定和广大购房者的大力好评</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/luneng_1.png') }}" alt=""/>
                <div class="Text">“烟花三月下扬州”是诗人李白的著名诗句，更被蘅塘退士评曰：“千古丽句”。依瘦西湖而立的御景园，样板房呈现的是雅致和具有恬静东方气息的居所！</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/luneng_2.png') }}" alt=""/>
                <div class="Text">色调上以清淡的浅色系为主，追求一种清雅含蓄、端庄丰华的东方式精神境界。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/luneng_3.png') }}" alt=""/>
                <div class="Text">翠绿色在这其中起到点缀的作用，虽没有大面积的着色，只是在重要的位置用清新的颜色润色一番，但却营造出点石成金的完美效果。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/luneng_4.png') }}" alt=""/>
                <div class="Text">主卧家具体型简约，金空间的配色、饰品无不体现出主人的高审美和细致品味，卧室、床头柜、床头、床品色彩的搭配饱含着优雅。</div>
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