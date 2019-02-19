@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Partner.css') }}"/>

@endsection

@section('content')
<!--联盟商家-->
<div class="business">
    <div class="business_jz">
        <div class="Title">
            <span>联盟商家</span>
            <i></i>
        </div>
        <div class="business_Show">
            <a href="javascript:;">
                <img src="{{ asset('/front/img/business_Show1.png') }}" alt=""/>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/img/business_Show2.png') }}" alt=""/>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/img/business_Show3.png') }}" alt=""/>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/img/business_Show4.png') }}" alt=""/>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/img/business_Show5.png') }}" alt=""/>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/img/business_Show6.png') }}" alt=""/>
            </a>
        </div>
    </div>
</div>
<!--战略合作方-->
<div class="Strategy">
    <div class="Strategy_jz">
        <div class="Title">
            <span>战略合作方</span>
            <i></i>
        </div>
    </div>
    <div class="Strategy_Show">
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show1.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show2.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show3.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show4.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show5.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show6.png') }}" alt=""/>
        </a>
    </div>
    <a href="javascript:;" class="Strategy_Click">查看更多</a>
</div>
<!--点击更多显示出来的合作方-->
<div class="Strategy_More">
    <div class="Strategy_MoreJz">
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show7.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show8.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show9.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show10.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show11.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show12.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show13.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show14.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show15.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show16.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show17.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show18.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show19.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show20.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show21.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show22.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show23.png') }}" alt=""/>
        </a>
        <a href="javascript:;">
            <img src="{{ asset('/front/img/Strategy_Show24.png') }}" alt=""/>
        </a>
    </div>
    <a href="javascript:;" class="Strategy_MoreMg">
        <img src="{{ asset('/front/img/City_Mgb.gif') }}" alt=""/>
    </a>
</div>
<!--服务保障-->
<div class="Guarantee">
    <div class="Guarantee_Jz">
        <div class="Title">
            <span>服务保障</span>
            <a href="{{ url('/guarantee.html') }}">
                <img src="{{ asset('/front/img/Designer_Gowa.gif') }}" alt=""/>
            </a>
        </div>
        <a href="#" class="Guarantee_img">
            <img src="{{ asset('/front/img/Guarantee_img.png') }}" alt=""/>
        </a>
    </div>
</div>

<!--占位置给尾部-->
<div class="Occupy"></div>
@endsection

@section('js')
<script src="{{ asset('/front/js/Partner.js') }}"></script>
@endsection