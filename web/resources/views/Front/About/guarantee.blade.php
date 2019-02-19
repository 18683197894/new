@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Guarantee.css') }}"/>

@endsection

@section('content')
<div class="Guarantee">
    <div class="Guarantee_Jz">
        <a href="#">
            <img src="{{ asset('/front/img/Guarantee1.png') }}" alt=""/>
            <span>战略协同，更好帮助楼盘销售</span>
        </a>
        <a href="#">
            <img src="{{ asset('/front/img/Guarantee2.png') }}" alt=""/>
            <span>保障交房，我们一手操办</span>
        </a>
        <a href="#">
            <img src="{{ asset('/front/img/Guarantee3.png') }}" alt=""/>
            <span>独创模式，额外收益立竿见影</span>
        </a>
    </div>
</div>

<!--占位置给尾部-->
<div class="Occupy"></div>
@endsection

@section('js')

@endsection