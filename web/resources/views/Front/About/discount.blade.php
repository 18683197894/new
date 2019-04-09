@extends('Front.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/front/css/Preferential.css') }}"/>
@endsection

@section('content')
<div class="Preferential">
    <div class="Centered">
        <img src="{{ asset('/front/img/Preferential_t.png') }}" alt="" class="Preferential_t"/>
        <div class="Centered_img">
            <img src="{{ asset('/front/img/Preferential1.png') }}" alt="" class="Preferential_img"/>
            <img src="{{ asset('/front/img/Preferential2.png') }}" alt="" class="Preferential_img"/>
            <img src="{{ asset('/front/img/Preferential3.png') }}" alt="" class="Preferential_img"/>
            <img src="{{ asset('/front/img/Preferential4.png') }}" alt="" class="Preferential_img"/>
            <img src="{{ asset('/front/img/Preferential5.png') }}" alt="" class="Preferential_img"/>
            <img src="{{ asset('/front/img/Preferential6.png') }}" alt="" class="Preferential_img"/>
        </div>
        <img src="{{ asset('/front/img/Preferential_b.png') }}" alt="" class="Preferential_b"/>
    </div>
    <!--荣誉-->
    <div class="Honor">
        <div class="Title">
            <span>
                <img src="{{ asset('/front/img/Honor.png') }}" alt=""/>
            </span>
            <a href="{{ url('/honor.html') }}">
                <img src="{{ asset('/front/img/Honor_r.png') }}" alt=""/>
            </a>
        </div>
        <div class="Show">
            <a href="#">
                <img src="{{ asset('/front/img/Honor1.png') }}" alt=""/>
            </a>
            <a href="#">
                <img src="{{ asset('/front/img/Honor2.png') }}" alt=""/>
            </a>
            <a href="#">
                <img src="{{ asset('/front/img/Honor3.png') }}" alt=""/>
            </a>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
