@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/team/css/Team.css') }}"/>
@endsection

@section('content')
<div class="Team">
    <div class="Part">
    @foreach($team as $v)
    <div class="@if($loop->first) Part_l avtive @else Part_r @endif">
        <a href="javascript:;">{{ $v->name }}</a>
    </div>
    @endforeach
    </div>
    <div class="Show">
        @foreach($team as $v)
        <div class="Show_time @if($loop->first) avtive @endif">
            <!--ON为左边TWO为右边-->
            @foreach($v->members as $val)
            <div @if(($loop->index+1) % 2 !=0) class="ON" @else class="TWO" @endif data-aos="zoom-in">
                <div class="Text">
                    <div class="Name">{{$val->name}}</div>
                    <div class="Position">{{$val->post}}</div>
                    <div class="Con">{{$val->synopsis}}</div>
                    @if($val->design_concept)
                    <div class="Declaration"><span>设计理念：</span>{{$val->design_concept}}</div>
                    @endif
                    @if($val->design_manifesto)
                    <div class="Declaration"><span>设计风格：</span>{{$val->design_manifesto}}</div>
                    @endif
                </div>
                <img src="{{ asset($val->image) }}" alt="" class="touxiang"/>
                <!--分割线-->
                <div class="fgx"></div>
            </div>
            @endforeach
            
        </div>
        @endforeach

    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('/front/index/js/velocity.js') }}"></script>
<script src="{{ asset('/front/index/js/shutter.js') }}"></script>
<script>
    $(".Part div").click(function(){
        $(".Part div").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $(".Show .Show_time").removeClass("avtive").eq($(this).index()).addClass("avtive");
    });
</script>

@endsection