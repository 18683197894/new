@extends('Fdc.public')

@section('css')
<link rel="stylesheet" href="{{ asset('/front/fdc/css/swiper.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('/front/fdc/css/jfxz.css') }}"/>
@endsection

@section('content')
<!--占头部位置-->
<div class="konge"></div>
<!--轮播-->
<div class="swiper-container">
    <ul class="swiper-wrapper">
        @foreach($luobo as $k => $v)
        <li class="swiper-slide"><img src="{{ asset($v->image) }}" alt="11"/></li>
        @endforeach
    </ul>
    <div class="swiper-pagination"></div>
</div>

<div class="House">
    <div class="Text">
        <div class="mianbao">
            <a href="{{ url('/') }}">首页</a>
            <span>></span>
            <a href="javascript:;">热门楼盘</a>
            <span>></span>
            <a href="javascript:;">万贯金府星座</a>
        </div>
        <div class="Details">
            <div class="Details_img">
                <div class="tupian">
                    <img src="{{ asset('/front/fdc/img/loupan.png') }}" alt=""/>
                </div>
                <div class="xiaotu">
                    <a href="javascript:;" class="fl"><</a>
                    <a href="javascript:;" class="fr">></a>
                    <div class="fangxiaotu">
                        <a href="javascript:;" class="avtive">
                            <img src="{{ asset('/front/fdc/img/fangxiaotu1.png') }}" alt=""/>
                            <span>楼盘效果图</span>
                        </a>
                        <a href="javascript:;">
                            <img src="{{ asset('/front/fdc/img/fangxiaotu2.png') }}" alt=""/>
                            <span>交通图</span>
                        </a>
                        <a href="javascript:;">
                            <img src="{{ asset('/front/fdc/img/fangxiaotu3.png') }}" alt=""/>
                            <span>样板间</span>
                        </a>
                        <a href="javascript:;">
                            <img src="{{ asset('/front/fdc/img/fangxiaotu4.png') }}" alt=""/>
                            <span>周边配套图</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="Introduce">
                <div class="Title">
                    <span class="Name">万贯金府星座</span>
                    <ol>公寓</ol>
                    <ol>新盘</ol>
                    <ol>品牌</ol>
                </div>
                <div class="Price">
                    <div class="Xunhuan">
                        <div class="bt">价格：</div>
                        <div class="neirong">
                            <span>1.37-1.49</span>万元/㎡
                        </div>
                    </div>
                    <div class="Xunhuan">
                        <div class="bt">户型：</div>
                        <div class="neirong">
                            43㎡-50㎡、51㎡-58㎡、74㎡-80㎡、100㎡-110㎡
                        </div>
                    </div>
                    <div class="Xunhuan">
                        <div class="bt">绿化率：</div>
                        <div class="neirong">
                            暂无信息
                        </div>
                    </div>
                    <div class="Xunhuan">
                        <div class="bt">地址：</div>
                        <div class="neirong">
                            金牛 西南交大、金府、华侨城·欢乐谷三大商圈中心
                        </div>
                    </div>
                    <div class="Xunhuan">
                        <div class="bt">开盘时间：</div>
                        <div class="neirong">
                            2019年7月16号
                        </div>
                    </div>
                    <div class="Xunhuan">
                        <div class="bt">开发商：</div>
                        <div class="neirong">
                            成都万贯房地产开发有限公司
                        </div>
                    </div>
                    <div class="Xunhuan">
                        <div class="bt">商业价值：</div>
                        <div class="neirong">
                            三核之芯、醇熟配套、双铁物业、商务典范
                        </div>
                    </div>
                </div>
                <div class="dianhua">
                    <span>联系电话:</span>028-62230059
                </div>
                <a href="javascript:;" class="yuyue">预约看房</a>
            </div>
        </div>
    </div>
    <div class="Apartment">
        <div class="Taitou">万贯金府星座户型图</div>
        <div class="suoying">
            <div class="ApartmentTu">
                <div class="ApartmentTu_tp">
                    <img src="{{ asset('/front/fdc/img/huxing1.png') }}" alt="" class="ApartmentTu_img"/>
                </div>
                <div class="Content">
                    <div class="Content_xu">
                        建面：43㎡-50㎡
                    </div>
                    <div class="Content_xu">
                        公寓类型：<span>办公/居住</span>
                    </div>
                    <div class="Content_xu">
                        参考均价：<span class="red">1.37—1.49万元/㎡</span>
                    </div>
                    <div class="Content_xu">
                        房源状态：<span>充足</span>
                    </div>
                    <div class="Content_xu">
                        户型解析：<span>高利用率，功能分区明确，动线紧凑，小创新大舒适；百变空间，户型方正大气，城市SOHO功能灵活蝶变；智能时尚，智能系统引领生活，更舒适、方便、安全。</span>
                    </div>
                <span class="Tel">
                    <img src="{{ asset('/front/fdc/img/lianxidh.png') }}" alt=""/>
                </span>
                </div>
            </div>
            <div class="ApartmentTu">
                <div class="ApartmentTu_tp">
                    <img src="{{ asset('/front/fdc/img/huxing2.png') }}" alt="" class="ApartmentTu_img"/>
                </div>
                <div class="Content">
                    <div class="Content_xu">
                        建面：51㎡-58㎡
                    </div>
                    <div class="Content_xu">
                        公寓类型：<span>办公/居住</span>
                    </div>
                    <div class="Content_xu">
                        参考均价：<span class="red">1.37—1.49万元/㎡</span>
                    </div>
                    <div class="Content_xu">
                        房源状态：<span>充足</span>
                    </div>
                    <div class="Content_xu">
                        户型解析：<span>高利用率，功能分区明确，动线紧凑，小创新大舒适；百变空间，户型方正大气，城市SOHO功能灵活蝶变；智能时尚，智能系统引领生活，更舒适、方便、安全。</span>
                    </div>
                <span class="Tel">
                    <img src="{{ asset('/front/fdc/img/lianxidh.png') }}" alt=""/>
                </span>
                </div>
            </div>
            <div class="ApartmentTu">
                <div class="ApartmentTu_tp">
                    <img src="{{ asset('/front/fdc/img/huxing3.png') }}" alt="" class="ApartmentTu_img"/>
                </div>
                <div class="Content">
                    <div class="Content_xu">
                        建面：74㎡-80㎡
                    </div>
                    <div class="Content_xu">
                        公寓类型：<span>办公/居住</span>
                    </div>
                    <div class="Content_xu">
                        参考均价：<span class="red">1.37—1.49万元/㎡</span>
                    </div>
                    <div class="Content_xu">
                        房源状态：<span>充足</span>
                    </div>
                    <div class="Content_xu">
                        户型解析：<span>两全其美、时尚简约、动静分区，生活工作自有天地；弹性空间、通透采光、通风良好、全能户型按需幻变；智能时尚、智能系统引领生活，更舒适、方便、安全。</span>
                    </div>
                <span class="Tel">
                    <img src="{{ asset('/front/fdc/img/lianxidh.png') }}" alt=""/>
                </span>
                </div>
            </div>
            <div class="ApartmentTu">
                <div class="ApartmentTu_tp">
                    <img src="{{ asset('/front/fdc/img/huxing4.png') }}" alt="" class="ApartmentTu_img"/>
                </div>
                <div class="Content">
                    <div class="Content_xu">
                        建面：100㎡-110㎡
                    </div>
                    <div class="Content_xu">
                        公寓类型：<span>办公/居住</span>
                    </div>
                    <div class="Content_xu">
                        参考均价：<span class="red">1.37—1.49万元/㎡</span>
                    </div>
                    <div class="Content_xu">
                        房源状态：<span>充足</span>
                    </div>
                    <div class="Content_xu">
                        户型解析：<span>两全其美、时尚简约、动静分区，生活工作自有天地；弹性空间、通透采光、通风良好、全能户型按需幻变；智能时尚、智能系统引领生活，更舒适、方便、安全。</span>
                    </div>
                <span class="Tel">
                    <img src="{{ asset('/front/fdc/img/lianxidh.png') }}" alt=""/>
                </span>
                </div>
            </div>
        </div>

    </div>
    <div class="Sample">
        <div class="Taitou">万贯金府星座样板间</div>
        <div class="suoy">
            <div class="Sample_L">
                <div class="Title"><span>47</span>㎡办公型样板间</div>
                <div class="Sample_a">
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show1.png') }}" alt="" class="img"/>
                    </a>
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show2.png') }}" alt="" class="img"/>
                    </a>
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show3.png') }}" alt="" class="img"/>
                    </a>
                </div>
            </div>
            <div class="Sample_L">
                <div class="Title"><span>47</span>㎡私馆型样板间</div>
                <div class="Sample_a">
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show4.png') }}" alt="" class="img"/>
                    </a>
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show5.png') }}" alt="" class="img"/>
                    </a>
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show6.png') }}" alt="" class="img"/>
                    </a>
                </div>
            </div>
            <div class="Sample_L">
                <div class="Title"><span>75</span><span>.59</span>㎡私馆样板间</div>
                <div class="Sample_a">
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show7.png') }}" alt="" class="img"/>
                    </a>
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show8.png') }}" alt="" class="img"/>
                    </a>
                    <a href="javascript:;" class="Sa_i">
                        <img src="{{ asset('/front/fdc/img/Sample_Show9.png') }}" alt="" class="img" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="Information">
        <div class="Taitou">万贯金府星座楼盘资讯</div>
        <div class="Information_L">
            @foreach($news as $v)
            <a href="{{ url('/jfxz/'.$v->id) }}">
                <span>{{ $loop->index + 1 }}</span>{{ $v->title }}
            </a>
            @endforeach
        </div>
        <div class="Information_r">
            <!--轮播-->
            <div class="swiper-container">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide"><img src="{{ asset('/front/fdc/img/Information_img.png') }}" alt="11"/></li>
                    <li class="swiper-slide"><img src="{{ asset('/front/fdc/img/Information_img.png') }}" alt="11"/></li>
                    <li class="swiper-slide"><img src="{{ asset('/front/fdc/img/Information_img.png') }}" alt="11"/></li>
                </ul>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="Like">
        <div class="Title">猜你喜欢</div>
        <div class="Like_C">
            <a href="javascript:;">
                <img src="{{ asset('/front/fdc/img/Like_C1.png') }}" alt=""/>
                <span>北京中冶蓝城</span>
            </a>
            <a href="javascript:;" class="Margin">
                <img src="{{ asset('/front/fdc/img/Like_C2.png') }}" alt=""/>
                <span>重庆阳光100国际新城</span>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/fdc/img/Like_C3.png') }}" alt=""/>
                <span>贵州万都铭城</span>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/fdc/img/Like_C4.png') }}" alt=""/>
                <span>丽雅龙城</span>
            </a>
            <a href="#" class="Margin">
                <img src="{{ asset('/front/fdc/img/Like_C5.png') }}" alt=""/>
                <span>鲁能山水原著</span>
            </a>
            <a href="#">
                <img src="{{ asset('/front/fdc/img/Like_C6.png') }}" alt=""/>
                <span>飞大壹号公馆</span>
            </a>
        </div>
    </div>

</div>

<div class="shadow">
    <!--阴影-->
</div>
<div class="Collect">
    <div class="Centered">
        <div class="Liuc">
            <img src="{{ asset('/front/fdc/img/Liuc1.png') }}" alt="" class="Liuc_On"/>
            <img src="{{ asset('/front/fdc/img/Liuc_Heng.png') }}" alt="" class="Liuc_Heng"/>
            <img src="{{ asset('/front/fdc/img/Liuc2.png') }}" alt="" class="Liuc_Two"/>
            <img src="{{ asset('/front/fdc/img/Liuc_Heng.png') }}" alt="" class="Liuc_Heng"/>
            <img src="{{ asset('/front/fdc/img/Liuc3.png') }}" alt="" class="Liuc_Two"/>
        </div>
        <div class="Wanke">
            <div class="Mingcheng">
                万贯金府星座
            </div>
            <div class="Wanke_Xinx">
                <div class="Wenzi">
                    <span>*</span>您的姓名：
                </div>
                <input type="text" class="WankeInput" placeholder="请输入您的姓名或称谓" id="name"/>
            </div>
            <div class="Wanke_Xinx">
                <div class="Wenzi">
                    <span>*</span>手机号码：
                </div>
                <input type="text" class="WankeInput" placeholder="请输入您的手机号码" id="Telephone"/>
            </div>
            <div class="Wanke_Xinx">
                <div class="Wenzi">
                    <span>*</span>看房时间：
                </div>
                <div id="date" class="Data">
                    <select name="year" id="year">
                        <option value="">选择年份</option>
                    </select>
                    <select name="month" id="month">
                        <option value="">选择月份</option>
                    </select>
                    <select id="days" class="day">
                        <option value="">选择日期</option>
                    </select>
                    <select id="time" class="time">
                        <option value="">选择日期</option>
                        <option value="01">01时</option>
                        <option value="02">02时</option>
                        <option value="03">03时</option>
                        <option value="04">04时</option>
                        <option value="05">05时</option>
                        <option value="06">06时</option>
                        <option value="07">07时</option>
                        <option value="08">08时</option>
                        <option value="09">09时</option>
                        <option value="10">10时</option>
                        <option value="12">12时</option>
                        <option value="13">13时</option>
                        <option value="14">14时</option>
                        <option value="15">15时</option>
                        <option value="16">16时</option>
                        <option value="17">17时</option>
                        <option value="18">18时</option>
                        <option value="19">19时</option>
                        <option value="20">20时</option>
                        <option value="21">21时</option>
                        <option value="22">22时</option>
                        <option value="23">23时</option>
                        <option value="24">24时</option>
                    </select>
                </div>

            </div>
            <div class="Wanke_Xinx">
                <div class="Wenzi">
                    <span>*</span>意向户型：
                </div>
                <select class="Select" id="Intention">
                    <option value ="">请选择您的意向户型</option>
                    <option value ="84">84</option>
                    <option value ="100">100</option>
                </select>
            </div>
            <div class="Wanke_Xinx">
                <div class="Wenzi">
                </div>
                <div class="Yanzhan">
                    <input type="text" class="Yz" placeholder="输入验证码" id="Send"/>
                    <a href="javascript:;" class="Fs">发送短信验证码至手机</a>
                </div>
            </div>
            <div class="Wanke_Xinx">
                <div class="Wenzi">

                </div>
                <a href="javascript:;" class="Tijiao">
                    提交
                </a>
            </div>
        </div>
        <a href="javascript:;" class="guanbi">
            <img src="{{ asset('/front/fdc/img/guanbi.png') }}" alt=""/>
        </a>
    </div>
</div>


<div class="huxintu_yy">
    <!--阴影-->
</div>
<div class="huxintu">
    <div class="huxintu_img">
        <img src="" alt="" class="huxintu_tp"/>
    </div>
    <a href="javascript:;" class="fl">
        <img src="{{ asset('/front/fdc/img/huxintu_fl.png') }}" alt=""/>
    </a>
    <a href="javascript:;" class="fr">
        <img src="{{ asset('/front/fdc/img/huxintu_fr.png') }}" alt=""/>
    </a>
    <a href="javascript:;" class="guan">
        <img src="{{ asset('/front/fdc/img/chacha.png') }}" alt=""/>
    </a>
</div>

<div class="Sample_y">
    <!--阴影-->
</div>
<div class="Sample_tp">
    <div class="Sample_tp_img">
        <img src="" alt="" class="Simg"/>
    </div>
    <a href="javascript:;" class="fl">
        <img src="{{ asset('/front/fdc/img/huxintu_fl.png') }}" alt=""/>
    </a>
    <a href="javascript:;" class="fr">
        <img src="{{ asset('/front/fdc/img/huxintu_fr.png') }}" alt=""/>
    </a>
    <a href="javascript:;" class="guan">
        <img src="{{ asset('/front/fdc/img/chacha.png') }}" alt=""/>
    </a>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('/front/fdc/js/select.js') }}"></script>
<script src="{{ asset('/front/fdc/js/swiper.min.js') }}"></script>
<script src="{{ asset('/front/fdc/js/jfxz.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $("#date").selectDate();
        $("#days").focusout(function(){
            var year = $("#year option:selected").html();
            var month = $("#month option:selected").html();
            var day = $("#days option:selected").html();
        })
    })
</script>
@endsection