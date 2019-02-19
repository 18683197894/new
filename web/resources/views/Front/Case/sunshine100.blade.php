@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case_Details.css') }}"/>

@endsection

@section('content')
<div class="Case_Details">
    <div class="Case_DetailsJz">
        <div class="Details_On">
            <img src="{{ asset('/front/case/img/yangguang.png') }}" alt="" class="Details_On_l"/>
            <div class="Details_On_r">
                <div class="Title">重庆阳光100国际新城</div>
                <div class="Place">楼盘地址:重庆</div>
                <div class="Text">阳光100国际新城总建筑面积210平方公里，地处CBD核心，沿长江绵延1.2公里，与朝天门、江北嘴三足鼎立，浑然一体。我司受托负责该项目住宅批量装饰工程，通过精心设计、施工，为项目注入了新的价值内涵。</div>
            </div>
        </div>
        <div class="Effect">
            <div class="Title">室内效果图</div>
            <i></i>
        </div>
        <div class="Effect_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/yangguang_1.png') }}" alt=""/>
                <div class="Text">素雅的原木色与活泼的朦胧橙在空间中相互融合，一半静谧，一半绚烂，动静自如。大厅以棕色和素白色为主色调，柔和的阳光透过窗纱散落在屋内，每一处都呈现出闲适自如的生活气息。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/yangguang_2.png') }}" alt=""/>
                <div class="Text">深挖当代人的时代趣味与生活需求，以现代简约、自然人文的个性设计，使空间尽情地挥洒源远流长的神韵，闲适自如</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/yangguang_3.png') }}" alt=""/>
                <div class="Text">个性别致的吊灯，原木色的餐桌随处安放的花束，在阳光的映射下曼妙起舞，墙上的挂画呼应了这一画面，为就餐区营造出一种活泼素雅的氛围。</div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/case/img/yangguang_4.png') }}" alt=""/>
                <div class="Text">深灰色床头与素白色的丝光床品，极富质感的搭配，使空间多了一份理性的冷静，墙上的挂画为空间增添了趣味，没有多余的花样与纹饰，纯粹的、极富现代感的气息扑面而来。</div>
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