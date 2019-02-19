@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/case/css/Case.css') }}"/>
@endsection

@section('content')
<div class="Crumbs aos-init" data-aos="zoom-in">
    <span>当前位置</span><span>&gt;</span><a href="JavaScript:;">精彩案例</a>
</div>
<div class="Map">
    <img src="{{ asset('/front/case/img/Map.png') }}" alt="" class="Map_bg"/>
    <!--成都-->
    <div class="cd"></div>
    <img src="{{ asset('/front/case/img/hongqi.png') }}" alt="" class="cd_hq"/>
    <div class="chengdu yc">
       <ul>
           <li><i></i><a href="{{ url('/case/baoli.html') }}">保利198</a></li>
           <li><i></i><a href="{{ url('/case/maikebiology.html') }}">迈克生物专家公寓</a></li>
           <li><i></i><a href="{{ url('/case/feidayihao.html') }}">飞大壹号公馆</a></li>
       </ul>
    </div>
    <!--宜宾-->
    <div class="yb"></div>
    <img src="{{ asset('/front/case/img/hongqi_xiao.png') }}" alt="" class="yb_hq"/>
    <div class="yibing yc">
        <ul>
            <li><i></i><a href="{{ url('/case/innovation-incubation.html') }}">创新孵化基地人才公寓</a></li>
            <li><i></i><a href="{{ url('/case/defu.html') }}">德福公园</a></li>
            <li><i></i><a href="{{ url('/case/liya-dragon-city.html') }}">丽雅龙城</a></li>
            <li><i></i><a href="{{ url('/case/luneng-landscape.html') }}">鲁能山水原著</a></li>
            <li><i></i><a href="{{ url('/case/xintiandi.html') }}">浙商临港新天地</a></li>
        </ul>
    </div>
    <!--重庆-->
    <div class="cq"></div>
    <img src="{{ asset('/front/case/img/hongqi.png') }}" alt="" class="cq_hq"/>
    <div class="chongq yc">
        <ul>
            <li><i></i><a href="{{ url('/case/sunshine100.html') }}">重庆阳光100国际新城</a></li>
        </ul>
    </div>
    <!--贵州-->
    <div class="gz"></div>
    <img src="{{ asset('/front/case/img/hongqi.png') }}" alt="" class="gz_hq"/>
    <div class="guizhou yc">
        <ul>
            <li><i></i><a href="{{ url('/case/mando.html') }}">贵州万都铭城</a></li>
        </ul>
    </div>
    <!--北京-->
    <div class="bj"></div>
    <img src="{{ asset('/front/case/img/hongqi.png') }}" alt="" class="bj_hq"/>
    <div class="beijin yc">
        <ul>
            <li><i></i><a href="{{ url('/case/blue-city.html') }}">北京中冶蓝城</a></li>
        </ul>
    </div>
    <!--青岛-->
    <div class="qd"></div>
    <img src="{{ asset('/front/case/img/hongqi.png') }}" alt="" class="qd_hq"/>
    <div class="qingdao yc">
        <ul>
            <li><i></i><a href="{{ url('/case/funfair-games.html') }}">海上嘉年华公寓项目海洋之心</a></li>
        </ul>
    </div>
</div>
<div class="Case">
    <div class="content">
        <div class="Box_con clearfix">
            <span class="btnl btn" id="btnl">
                <img src="{{ asset('/front/case/img/Case_l.png') }}" alt=""/>
            </span>
            <span class="btnr btn" id="btnr">
                 <img src="{{ asset('/front/case/img/Case_r.png') }}" alt=""/>
            </span>
            <div class="conbox" id="BoxUl">
                <ul>
                    <li>
                        <img src="{{ asset('/front/case/img/baoli.png') }}" alt=""/>
                        <span class="biaoti">保利198</span>
                        <div class="genduo">
                            <span>保利198</span>
                            <a href="{{ url('/case/baoli.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/maikebiology.png') }}" alt=""/>
                        <span class="biaoti">迈克生物专家公寓</span>
                        <div class="genduo">
                            <span>迈克生物专家公寓</span>
                            <a href="{{ url('/case/maikebiology.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/feidayihao.png') }}" alt=""/>
                        <span class="biaoti">飞大壹号公馆</span>
                        <div class="genduo">
                            <span>飞大壹号公馆</span>
                            <a href="{{ url('/case/feidayihao.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/innovation_incubation.png') }}" alt=""/>
                        <span class="biaoti">创新孵化基地人才公寓</span>
                        <div class="genduo">
                            <span>创新孵化基地人才公寓</span>
                            <a href="{{ url('/case/innovation-incubation.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/defu.png') }}" alt=""/>
                        <span class="biaoti">德福公园</span>
                        <div class="genduo">
                            <span>德福公园</span>
                            <a href="{{ url('/case/defu.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/liya_dragon_city.png') }}" alt=""/>
                        <span class="biaoti">丽雅龙城</span>
                        <div class="genduo">
                            <span>丽雅龙城</span>
                            <a href="{{ url('/case/liya-dragon-city.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/luneng_landscape.png') }}" alt=""/>
                        <span class="biaoti">鲁能山水原著</span>
                        <div class="genduo">
                            <span>鲁能山水原著</span>
                            <a href="{{ url('/case/luneng-landscape.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/xintiandi.png') }}" alt=""/>
                        <span class="biaoti">浙商临港新天地</span>
                        <div class="genduo">
                            <span>浙商临港新天地</span>
                            <a href="{{ url('/case/xintiandi.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/sunshine100.png') }}" alt=""/>
                        <span class="biaoti">重庆阳光100国际新城</span>
                        <div class="genduo">
                            <span>重庆阳光100国际新城</span>
                            <a href="{{ url('/case/sunshine100.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/mando.png') }}" alt=""/>
                        <span class="biaoti">贵州万都铭城</span>
                        <div class="genduo">
                            <span>贵州万都铭城</span>
                            <a href="{{ url('/case/mando.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/blue_city.png') }}" alt=""/>
                        <span class="biaoti">北京中治蓝城</span>
                        <div class="genduo">
                            <span>北京中治蓝城</span>
                            <a href="{{ url('/case/blue-city.html') }}">了解更多</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('/front/case/img/funfair_games.png') }}" alt=""/>
                        <span class="biaoti">海上嘉年华公寓项目海洋之心</span>
                        <div class="genduo">
                            <span>海上嘉年华公寓项目海洋之心</span>
                            <a href="{{ url('/case/funfair-games.html') }}">了解更多</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('/front/case/js/Lunbo.js') }}" ></script>
@section('js')
<script>
    $(".cd").click(function(){
        $(".yc").removeClass("avtive");
        $(".chengdu").addClass("avtive");
    });
    $(".yb").click(function(){
        $(".yc").removeClass("avtive");
        $(".yibing").addClass("avtive");
    });
    $(".cq").click(function(){
        $(".yc").removeClass("avtive");
        $(".chongq").addClass("avtive");
    });
    $(".gz").click(function(){
        $(".yc").removeClass("avtive");
        $(".guizhou").addClass("avtive");
    });
    $(".bj").click(function(){
        $(".yc").removeClass("avtive");
        $(".beijin").addClass("avtive");
    });
    $(".qd").click(function(){
        $(".yc").removeClass("avtive");
        $(".qingdao").addClass("avtive");
    });

    //滚动元素id，左切换按钮，右切换按钮，切换元素个数id,滚动方式，切换方向，是否自动滚动，滚动距离，滚动时间，滚动间隔，显示个数
    LbMove('BoxUl','btnl','btnr','BoxSwitch',true,'left',true,260,1000,3000,5);
</script>
@endsection