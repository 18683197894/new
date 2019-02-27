@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/commerce/css/Commerce.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/front/banner/css/aos.css') }}">
@endsection

@section('content')
<div class="Crumbs" data-aos="zoom-in">
    <span>当前位置</span><span>></span><a href="#">商务合作</a>
</div>

<div class="Content">
    <div class="Batch" data-aos="zoom-in">
        <img src="{{ asset('/front/commerce/img/Cooperation_pl.png') }}" alt=""/>
        <div class="Batch_tit">建商批量精装修</div>
        <div class="Text">
            建商集团定位于中国房地产精装修产业价值构建者，其核心竞争优势来源于全一线品牌的资源整合能力，从而为业主提供最具性价比的放心生态家装。其独创模式，
            用市场杂牌的装修套餐价格装修出全一线家居建材品牌组合的品质，让终端购房客户得实惠，为房地产项目销售加分，并助开发商实现更高的利润可能。
        </div>
    </div>
    <div class="Business" data-aos="fade-up">
        <div class="Title">业务特色</div>
        <div class="Business_Show">
            <div class="Tab avtive">
                <img src="{{ asset('/front/commerce/img/Business_Show.png') }}" alt="" class="Tab_on"/>
            </div>
            <div class="Tab">
                <img src="{{ asset('/front/commerce/img/Business_Show2.png') }}" alt="" class="Tab_on"/>
            </div>
            <div class="Tab">
                <img src="{{ asset('/front/commerce/img/Business_Show3.png') }}" alt="" class="Tab_on"/>
            </div>
            <div class="Tab">
                <img src="{{ asset('/front/commerce/img/Business_Show4.png') }}" alt="" class="Tab_on"/>
            </div>
        </div>
        <div class="Show_Click">
            <a href="javascript:;" class="avtive"></a>
            <a href="javascript:;" class=""></a>
            <a href="javascript:;" class=""></a>
            <a href="javascript:;" class=""></a>
        </div>
    </div>
    <div class="Slogan"  data-aos="zoom-in">
        <div class="Title">六大优势</div>
        <div class="Slogan_c">
            <img src="{{ asset('/front/commerce/img/Slogan.png') }}" alt=""/>
            <div class="show">
<div class="Reset">
    <a href="javascript:;" class="Early avtive">
        <span>前期</span>
    </a>
    <a href="javascript:;" class="Metaphase">
        <span>中期</span>
    </a>
    <a href="javascript:;" class="Later">
        <span>后期</span>
    </a>
    <div class="Early_T ACJ avtive">
        <div class="Wenzi">免费建筑规划设计</div>
        <img src="http://www.jsjju.cn/front/commerce/img/Reset.png" alt="" class="Reset_img">
    </div>
    <div class="Metaphase_T ACJ">
        <div class="Wenzi">免费装修售楼部</div>
        <img src="http://www.jsjju.cn/front/commerce/img/Reset.png" alt="" class="Reset_img">
    </div>
    <div class="Later_T ACJ">
        <img src="http://www.jsjju.cn/front/commerce/img/Reset.png" alt="" class="Reset_img">
        <div class="Wenzi">免费物业管理</div>
    </div>
    <div class="Template ACJ">
        <div class="Wenzi">免费提供样板房</div>
        <img src="http://www.jsjju.cn/front/commerce/img/Reset.png" alt="" class="Reset_img">
    </div>
    <div class="Sale ACJ">
        <img src="http://www.jsjju.cn/front/commerce/img/Reset.png" alt="" class="Reset_img">
        <div class="Wenzi">免费销售代理</div>
    </div>
    <div class="Batchh ACJ">
        <img src="http://www.jsjju.cn/front/commerce/img/Reset.png" alt="" class="Reset_img">
        <div class="Wenzi">批量精装房合作</div>
    </div>
    <div class="Architecture ACJ">
        <img src="http://www.jsjju.cn/front/commerce/img/Reset.png" alt="" class="Reset_img">
        <div class="Wenzi">建筑工程项目装修六折</div>
    </div>
</div>
            </div>
        </div>
    </div>
    <div class="Promise" data-aos="fade-up">
        <div class="Title">我们的承诺</div>
        <div class="Promise_c">
            <div class="Article">
                <img src="{{ asset('/front/commerce/img/Promise1.png') }}" alt=""/>
                <span>战略协同，更好帮助楼盘销售</span>
            </div>
            <div class="Article">
                <img src="{{ asset('/front/commerce/img/Promise2.png') }}" alt=""/>
                <span>保障交房，我们一手操办</span>
            </div>
            <div class="Article">
                <img src="{{ asset('/front/commerce/img/Promise3.png') }}" alt=""/>
                <span>独创模式，额外收益立竿见影</span>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('/front/banner/js/aos.js') }}"></script>

<script>
    $(".Show_Click a").click(function(){
        $(".Show_Click a").removeClass("avtive").eq($(this).index()).addClass("avtive");
        $(".Business_Show .Tab").removeClass("avtive").eq($(this).index()).addClass("avtive");
    });
    var shu = 0, a, js = $(".Show_Click").find("a"), Tab = $(".Business_Show").find(".Tab"), geshu = $(".Business_Show").find(".Tab").length;
    setInterval(function() {
        shu >= js.length && (js = 0);
        var t = js.eq(shu);
        var b =Tab.eq(shu);
        t.siblings().removeClass("avtive");
        b.siblings().removeClass("avtive");
        setTimeout(function() {
            t.addClass("avtive");
            b.addClass("avtive")
        });
        $(".Show_Click a").click(function(){
            a = $(".Show_Click a").index(this);
            shu = a;
            return;
        });
        shu++;
        if(shu>= geshu){
            shu=0;
            return;
        }
    }, 2100);
    $(".Reset a").mouseover(function(){
        $(".Reset a").removeClass("avtive").eq($(this).index()).addClass("avtive");
    });
    $(".Reset .Early").mouseover(function(){
        $(".Reset .ACJ").removeClass("avtive");
        $(".Reset .Early_T").addClass("avtive");
    });
    $(".Reset .Metaphase").mouseover(function(){
        $(".Reset .ACJ").removeClass("avtive");
        $(".Reset .Metaphase_T").addClass("avtive");
        $(".Reset .Template").addClass("avtive");
        $(".Reset .Sale").addClass("avtive");
    });
    $(".Reset .Later").mouseover(function(){
        $(".Reset .ACJ").removeClass("avtive");
        $(".Reset .Batchh").addClass("avtive");
        $(".Reset .Later_T").addClass("avtive");
        $(".Reset .Architecture").addClass("avtive");
    });

</script>
<script>
    AOS.init();
</script>
@endsection
