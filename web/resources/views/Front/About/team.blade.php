@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Design.css') }}"/>
@endsection('css')

@section('content')
<!--设计师-->
<div class="Design">
    <div class="Centered">
        @foreach($team as $v)
        <!--等级为冠军-->
        @if($loop->index == 0)
        <a href="javascript:;">
            <img src="@php echo str_replace('//m','//www',asset($v->image)) @endphp" alt="" class="Photo"/>
            <div class="Text">
                <div class="Xinm">
                    <div class="Name">{{ $v->name }}</div>
                    <span class="Zhiwei">{{ $v->post }}</span>
                    <img src="{{ asset('/front/img/Champion.gif') }}" alt="" class="Champion"/>
                </div>
                <div class="Idea">
                    <div class="Idea_i">理念：<span>{{ $v->design_concept }}</span></div>
                </div>
                <div class="Idea">
                    <div class="Idea_i">风格：<span>{{ $v->design_manifesto }}</span></div>
                </div>
            </div>
        </a>
        @else
        <!--等级为星星-->
        <a href="javascript:;">
            <img src="@php echo str_replace('//m','//www',asset($v->image)) @endphp" alt="" class="Photo"/>
            <div class="Text">
                <div class="Xinm">
                    <div class="Name">{{ $v->name }}</div>
                    <span class="Zhiwei">{{ $v->post }}</span>
                    @if($loop->index == 1 || $loop->index == 2 || $loop->index == 3)
                        <img src="{{ asset('/front/img/Grade.gif') }}" alt="" class="Grade"/>
                        <img src="{{ asset('/front/img/Grade.gif') }}" alt="" class="Grade"/>
                        <img src="{{ asset('/front/img/Grade.gif') }}" alt="" class="Grade"/>
                        <img src="{{ asset('/front/img/Grade.gif') }}" alt="" class="Grade"/>
                        <img src="{{ asset('/front/img/Grade.gif') }}" alt="" class="Grade"/>
                    @else
                        <img src="{{ asset('/front/img/Grade.gif') }}" alt="" class="Grade"/>
                        <img src="{{ asset('/front/img/Grade.gif') }}" alt="" class="Grade"/>
                        <img src="{{ asset('/front/img/Grade.gif') }}" alt="" class="Grade"/>
                    @endif 
               
                </div>
                <div class="Idea">
                    <div class="Idea_i">理念：<span>{{ $v->design_concept }}</span></div>
                </div>
                <div class="Idea">
                    <div class="Idea_i">风格：<span>{{ $v->design_manifesto }}</span></div>
                </div>
            </div>
        </a>
        @endif
        @endforeach
    </div>
</div>
<!--楼盘案列-->
<div class="Building">
    <div class="Center">
        <div class="Title">
            <span>楼盘案例</span>
            <a href="{{ url('/case.html') }}">
                <img src="{{ asset('/front/img/Designer_Gowa.gif') }}" alt=""/>
            </a>
        </div>
        <div class="Building_a">
            <div class="Building_Shwo">
                <a href="{{ url('/case/baoli.html') }}">
                    <img src="{{ asset('/front/img/baoli.png') }}" alt=""/>
                    <span>保利198</span>
                </a>
                <a href="{{ url('/case/maikebiology.html') }}">
                    <img src="{{ asset('/front/img/maikebiology.png') }}" alt=""/>
                    <span>迈克生物专家公寓</span>
                </a>
                <a href="{{ url('/case/feidayihao.html') }}">
                    <img src="{{ asset('/front/img/feidayihao.png') }}" alt=""/>
                    <span>飞大壹号公馆</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!--占位置给尾部-->
<div class="Occupy"></div>
@endsection('content')

@section('js')

@endsection('js')

