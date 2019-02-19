@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Case.css') }}"/>

@endsection('css')

@section('content')
<div class="Case_Tab">
    <!--展示图片-->
    <div class="Case_Tab_Centered">
        <div class="Design">
            <a href="#" class="Design_D">
                <img src="{{ asset('/front/img/Design_D.png') }}" alt=""/>
            </a>
            <div class="Design_R">
                <a href="#" class="Design_Rto">
                    <img src="{{ asset('/front/img/Design_R1.png') }}" alt=""/>
                </a>
                <a href="#" class="Design_Rbo">
                    <img src="{{ asset('/front/img/Design_R2.png') }}" alt=""/>
                </a>
            </div>
        </div>
    </div>
    <!--城市选项卡-->
    <div class="City">
        <div class="Centered">
            <div class="City_a">
                <a href="javascript:;" class="avtive">全部</a>
                <a href="javascript:;">成都</a>
                <a href="javascript:;">宜宾</a>
                <a href="javascript:;">重庆</a>
                <a href="javascript:;">贵州</a>
                <a href="javascript:;">北京</a>
                <a href="javascript:;">青岛</a>
            </div>
            <div class="City_Show">
                <div class="City_ShowT avtive">
                    <div class="City_Show_a">
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
                        <a href="{{ url('/case/innovation-incubation.html') }}">
                            <img src="{{ asset('/front/img/innovation_incubation.png') }}" alt=""/>
                            <span>创新孵化基地人才公寓</span>
                        </a>
                    </div>
                </div>
                <div class="City_ShowT">
                    <div class="City_Show_a">
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
                <div class="City_ShowT">
                    <div class="City_Show_a">
                        <a href="{{ url('/case/innovation-incubation.html') }}">
                            <img src="{{ asset('/front/img/innovation_incubation.png') }}" alt=""/>
                            <span>创新孵化基地人才公寓</span>
                        </a>
                        <a href="{{ url('/case/defu.html') }}">
                            <img src="{{ asset('/front/img/defu.png') }}" alt=""/>
                            <span>德福公园</span>
                        </a>
                        <a href="{{ url('/case/liya-dragon-city.html') }}">
                            <img src="{{ asset('/front/img/liya_dragon_city.png') }}" alt=""/>
                            <span>丽雅龙城</span>
                        </a>
                        <a href="{{ url('/case/luneng-landscape.html') }}">
                            <img src="{{ asset('/front/img/luneng_landscape.png') }}" alt=""/>
                            <span>鲁能山水原著</span>
                        </a>
                        <a href="{{ url('/case/xintiandi.html') }}">
                            <img src="{{ asset('/front/img/xintiandi.png') }}" alt=""/>
                            <span>浙商临港新天地</span>
                        </a>
                    </div>
                </div>
                <div class="City_ShowT">
                    <div class="City_Show_a">
                        <a href="{{ url('/case/sunshine100.html') }}">
                            <img src="{{ asset('/front/img/sunshine100.png') }}" alt=""/>
                            <span>重庆阳光100国际新城</span>
                        </a>
                    </div>
                </div>
                <div class="City_ShowT">
                    <div class="City_Show_a">
                        <a href="{{ url('/case/mando.html') }}">
                            <img src="{{ asset('/front/img/mando.png') }}" alt=""/>
                            <span>贵州万都铭城</span>
                        </a>
                    </div>
                </div>
                <div class="City_ShowT">
                    <div class="City_Show_a">
                        <a href="{{ url('/case/blue-city.html') }}">
                            <img src="{{ asset('/front/img/blue_city.png') }}" alt=""/>
                            <span>北京中治蓝城</span>
                        </a>
                    </div>
                </div>
                <div class="City_ShowT">
                    <div class="City_Show_a">
                        <a href="{{ url('/case/funfair-games.html') }}">
                            <img src="{{ asset('/front/img/funfair_games.png') }}" alt=""/>
                            <span>海上嘉年华公寓项目海洋之心</span>
                        </a>
                    </div>
                </div>
                <a href="javascript:;" class="More">
                    <img src="{{ asset('/front/img/Ca_More.png') }}" alt=""/>
                </a>
            </div>
            <div class="City_M">
                <div class="City_Ma">
                    <a href="{{ url('/case/defu.html') }}">
                        <img src="{{ asset('/front/img/defu.png') }}" alt=""/>
                        <span>德福公园</span>
                    </a>
                    <a href="{{ url('/case/liya-dragon-city.html') }}">
                        <img src="{{ asset('/front/img/liya_dragon_city.png') }}" alt=""/>
                        <span>丽雅龙城</span>
                    </a>
                    <a href="{{ url('/case/luneng-landscape.html') }}">
                        <img src="{{ asset('/front/img/luneng_landscape.png') }}" alt=""/>
                        <span>鲁能山水原著</span>
                    </a>
                    <a href="{{ url('/case/xintiandi.html') }}">
                        <img src="{{ asset('/front/img/xintiandi.png') }}" alt=""/>
                        <span>浙商临港新天地</span>
                    </a>
                    <a href="{{ url('/case/sunshine100.html') }}">
                        <img src="{{ asset('/front/img/sunshine100.png') }}" alt=""/>
                        <span>重庆阳光100国际新城</span>
                    </a>
                    <a href="{{ url('/case/mando.html') }}">
                        <img src="{{ asset('/front/img/mando.png') }}" alt=""/>
                        <span>贵州万都铭城</span>
                    </a>
                    <a href="{{ url('/case/blue-city.html') }}">
                        <img src="{{ asset('/front/img/blue_city.png') }}" alt=""/>
                        <span>北京中治蓝城</span>
                    </a>
                    <a href="{{ url('/case/funfair-games.html') }}">
                        <img src="{{ asset('/front/img/funfair_games.png') }}" alt=""/>
                        <span>海上嘉年华公寓项目海洋之心</span>
                    </a>
                </div>
                <a href="javascript:;" class="City_Mgb">
                    <img src="{{ asset('/front/img/City_Mgb.gif') }}" alt=""/>
                </a>
            </div>
        </div>
    </div>

</div>

<div class="Designer">
    <div class="Designer_Go">
        <div class="Title">
            <span>设计师</span>
            <a href="{{ url('team.html') }}" class="Designer_GoR">
                <img src="{{ asset('/front/img/Designer_Gowa.gif') }}" alt=""/>
            </a>
        </div>
        <div class="Designer_Gow">
            <div class="Designer_Gowa">
                @foreach($team as $v)
                <a href="javascript:;">
                    <img src="@php echo str_replace('//m','//www',asset($v->image)) @endphp" alt=""/>
                    <span class="Label">{{ $v->post }}</span>
                    <span class="Name">{{ $v->name }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--占位置给尾部-->
<div class="Occupy"></div>
@endsection('content')

@section('js')
<script src="{{ asset('/front/js/Case.js') }}"></script>
@endsection('js')

