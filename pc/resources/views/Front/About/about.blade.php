@extends('Front.public')

@section('css')

    <link rel="stylesheet" href="{{ asset('front/about/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/about/css/jquery.fullPage.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front/about/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/about/css/About.css') }}"/> 

    <script src="{{ asset('front/about/js/jquery-1.8.3.js') }}"></script>
    <script src="{{ asset('front/about/js/html5shiv.min.js') }}"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300"/>
@endsection

@section('content')
<div class="section panel section1" data-section-name="pane1">
    <ul class="pagination">
    <li><a href="#pane1" class="active"><span class="hover-text"></span></a></li>
    <li><a href="#pane2"><span class="hover-text"></span></a></li>
    <li><a href="#pane3"><span class="hover-text"></span></a></li>
    <li><a href="#pane4"><span class="hover-text"></span></a></li>
    <li><a href="#pane5"><span class="hover-text"></span></a></li>
</ul>
    <div class="Centered">
        <img src="{{ asset('front/about/img/section1_logo.png') }}" alt="" class="section1_logo"/>
        <div class="Cont" data-aos="fade-down">
            <div class="Title">中 国 房 地 产 精 装 修 产 业 价 值 构 建 者</div>
            <div class="Brief">
                <p>
                    四川建商集团，主营业务致力于为房地产发展商提供 “商品房批量精装”、“房地产整合营销”服务，以及利用公司已有中国知名连锁酒店品牌进驻，
                    对公寓项目进行“带租约销售”，为开发商成功开发提供资源协同服务。
                </p>
                <p>
                    建商集团定位于中国房地产精装修产业价值构建者，其核心竞争优势来源于全一线品牌的资源整合能力，从而为业主提供最具性价比的放心生态家装。
                    其独创模式，用市场杂牌的装修套餐价格装修出全一线家居建材品牌组合的品质，让终端购房客户得实惠，为房地产项目销售加分，并助开发商实现更高的利润可能。
                    同时，建商集团与战略合作商家也通过规模化的经营得到相应的合理利润，从而真正实现多方共赢！
                </p>
                <p>
                    建商集团先后成功服务重庆·阳光100国际新城、青岛·海上嘉年华、北京·中冶蓝城、成都·迈克生物专家公寓、宜宾·浙商临港新天地等，
                    所合作项目不但实现了更高的利润附加值并一售而空，得到了广大客户及业界同仁的普遍认同和一致肯定。立足四川，服务全国，
                    在批量精装房成为大势所趋的行业背景下，建商集团将为更多有远见的开发商提供战略协同服务，助力客户企业在消费升级、产业转型的时代浪潮中快人一步、勇夺先机
                </p>
            </div>
        </div>
    </div>
</div>


<div class="section panel section2" data-section-name="pane2">
    <div class="juz">
        <div class="f_The">
            <div class="jt">
                <img src="{{ asset('front/about/img/jt.png') }}" alt=""/>
            </div>
        </div>
        <div class="yidian">
            <div class="xian"></div>
        </div>
        <div class="yiyuan">
            <a href="javascript:;" class="avtive"></a>
            <span class="nian avtive">2018</span>
        </div>
        <div class="erdian">
            <div class="xian"></div>
            <div class="Conne avtive">
                2018年，与贵州·万都铭城、宜宾·德福公元等多个项目达成战略合作，并助其成为当地标杆。
            </div>
        </div>
        <div class="eryuan">
            <a href="javascript:;" class=""></a>
            <span class="nian">2017</span>
            <div class="Conne">
                建商集团子公司四川我爱我家装饰工程有限公司成立
            </div>
        </div>
        <div class="sandian">
            <div class="xian"></div>
            <div class="Conne">
                建商集团子公司四川建商网络科技有限公司成立
            </div>
            <a href="javascript:;" class=""></a>
            <span class="nian">2016</span>
        </div>
        <div class="si">
            <div class="xian"></div>
            <a href="javascript:;" class=""></a>
            <span class="nian">2015</span>
            <div class="Conne">
                建商集团子公司四川建商房地产营销策划有限公司成立
            </div>
        </div>
        <div class="wu">
            <div class="xian"></div>
            <a href="javascript:;" class=""></a>
            <span class="nian">2014</span>
            <div class="Conne">
                建商集团子公司四川四仪园林绿化工程有限公司成立
            </div>
        </div>   
        <div class="liu">
            <div class="xian"></div>
            <a href="javascript:;" class=""></a>
            <span class="nian">2013</span>
            <div class="Conne">
                建商集团子公司四川妙缘酒店管理有限公司成立
            </div>
        </div>
        <div class="qi">
            <div class="xian"></div>
            <a href="javascript:;" class=""></a>
            <span class="nian">2012</span>
            <div class="Conne">
                建商集团子公司四川鲁工建设工程有限公司成立
            </div>
        </div>
        <div class="ba">
            <div class="xian"></div>
            <a href="javascript:;" class=""></a>
            <span class="nian">2011</span>
            <div class="Conne">
                建商集团子公司四川四仪商贸有限责任公司成立
            </div>
        </div>
        <img src="{{ asset('front/about/img/Development.png') }}" alt="" class="Development"/>
    </div>
</div>

<div class="section panel section3" data-section-name="pane3">
    <div class="container">
        <div class="item active main">
            <div class="disk">
                <div class="text-wrap">
                    <div class="title"><h2>熊勇</h2><span>董事长</span></div>
                    <p class="text">
                        <span class="xianxi">
                            <o class="xianxi_top">
                                <span class="name">熊勇</span><span class="zhiw">董事长</span>
                            </o>
                            熊勇先生格局高远，二十余载商海搏击，现任市政协委员；四川省房地产协会常务理事、成都市建筑装饰协会、成都陈设艺术行业协会荣誉顾问；
                            北京大学中国文商企业家后EMBA联谊会会长；四川建商集团董事长、总经理。
                        </span>
                    </p>
                </div>
            </div>
            <img src="{{ asset('front/about/img/xiong.png') }}" alt="">
        </div>
        <div class="item">
            <div class="disk">
                <div class="text-wrap">
                    <div class="title"><h2>罗玉书</h2><span>副总经理</span></div>
                    <p class="text">
                        <span class="xianxi">
                            <o class="xianxi_top">
                                <span class="name">罗玉书</span><span class="zhiw">副总经理</span>
                            </o>
                            原中国建筑一局集团工程总监、中港建筑工程(深圳)有限公司副总经理，二十余年建筑、装饰行业工作经验，现任四川建商集团董事、副总经理、总工程师。
                        </span>
                    </p>
                </div>
            </div>
            <img src="{{ asset('front/about/img/luo.png') }}" alt="">
        </div>
        <div class="item">
            <div class="disk">
                <div class="text-wrap">
                    <div class="title"><h2>黄均祥</h2><span>供应链总监</span></div>
                    <p class="text">
                        <span class="xianxi">
                            <o class="xianxi_top">
                                <span class="name">黄均祥</span><span class="zhiw">供应链总监</span>
                            </o>
                            《中国建筑装饰装修》杂志编审委员会成员，对装饰供应链有二十余年的深度研究及实操运营经验。
                        </span>
                    </p>
                </div>
            </div>
            <img src="{{ asset('front/about/img/geng.png') }}" alt="">
        </div>
        <div class="item">
            <div class="disk">
                <div class="text-wrap">
                    <div class="title"><h2>肖坤华</h2><span>副总经理</span></div>
                    <p class="text">
                        <span class="xianxi">
                            <o class="xianxi_top">
                                <span class="name">肖坤华</span><span class="zhiw">副总经理</span>
                            </o>
                            肖先生先后就职于易居中国、绿城和万科西北公司营销高管，近二十年地产营销行业资深经理人，对各类物业发展有丰富的解决之道，现任四川建商集团董事、副总经理。
                        </span>
                    </p>
                </div>
            </div>
            <img src="{{ asset('front/about/img/xiao.png') }}" alt="">
        </div>
        <div class="item">
            <div class="disk">
                <div class="text-wrap">
                    <div class="title"><h2>徐雪峰</h2><span>市场总监</span></div>
                    <p class="text">
                        <span class="xianxi">
                            <o class="xianxi_top">
                                <span class="name">徐雪峰</span><span class="zhiw">市场总监</span>
                            </o>
                            台湾聯义地产公司企业开发部总监，徐先生有十余年地产及装饰业务咨询发展经验，对深入挖掘地产物业美学价值见解独到。
                        </span>
                    </p>
                </div>
            </div>
            <img src="{{ asset('front/about/img/xue.png') }}" alt="">
        </div>
        <div class="item">
            <div class="disk">
                <div class="text-wrap">
                    <div class="title"><h2>杨文秀</h2><span>营销总监</span></div>
                    <p class="text">
                        <span class="xianxi">
                            <o class="xianxi_top">
                                <span class="name">杨文秀</span><span class="zhiw">营销总监</span>
                            </o>
                            原成都易居置业项目总监、上海立天唐人集团服务总监，十余年地产装饰行业工作经验。
                    </p>
                </div>
            </div>
            <img src="{{ asset('front/about/img/yang.png') }}" alt="">
        </div>
        <img src="{{ asset('front/about/img/core.png') }}" alt="" class="core"/>
    </div>
</div>

<div class="section panel section4" data-section-name="pane4">
    <div class="Centered_s">
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company1.png') }})"></div>
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company2.png') }})"></div>
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company3.png') }})"></div>
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company4.png') }})"></div>
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company5.png') }})"></div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper swiper_xiao">
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company1.png') }})"></div>
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company2.png') }})"></div>
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company3.png') }})"></div>
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company4.png') }})"></div>
                <div class="swiper-slide" style="background-image:url({{ asset('front/about/img/Company5.png') }})"></div>
            </div>
        </div>
        <img src="{{ asset('front/about/img/Honor.png') }}" alt="" class="Honor"/>
    </div>
</div>

<div class="section panel section5" data-section-name="pane5">
    <img src="{{ asset('front/about/img/About5_bt.png') }}" alt="" class="About5_bt"/>
    <div class="We">
        <div class="We_L">
            <div class="Leave">留下您的联系方式</div>
            <div class="Collect">
                <div class="Inp">
                    <img src="{{ asset('front/about/img/Inp1.png') }}" alt="" class="Inp_img"/>
                    <input type="text" placeholder="您的姓名" id="Name"/>
                </div>
                <div class="Inp">
                    <img src="{{ asset('front/about/img/Inp2.png') }}" alt="" class="Inp_img"/>
                    <input type="text" placeholder="您的电话" id="Telephone"/>
                </div>
                <div class="Inp">
                    <img src="{{ asset('front/about/img/Inp3.png') }}" alt="" class="Inp_img"/>
                    <input type="text" placeholder="您的邮箱" id="Email"/>
                </div>
                <div class="Inp">
                    <img src="{{ asset('front/about/img/Inp5.png') }}" alt="" class="Inp_img"/>
                    <textarea class="Message" id="textarea" placeholder="您的留言"></textarea>
                </div>
                <a href="javascript:;" class="Button">提交</a>
            </div>
        </div>
        <div class="We_R">
            <div class="Thank">感谢您能联系我们</div>
            <div class="Thank_T">
                <img src="{{ asset('front/about/img/Thank1.png') }}" alt="" class="Thank_img"/>
                <span>电话：028-62230058</span>
            </div>
            <div class="Thank_T">
                <img src="{{ asset('front/about/img/Thank2.png') }}" alt="" class="Thank_img"/>
                <span>邮箱：377361310@qq.com</span>
            </div>
            <div class="Thank_T">
                <img src="{{ asset('front/about/img/Thank3.png') }}" alt="" class="Thank_img"/>
                <span>地址：成都市青羊工业总部基地H区7栋</span>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('front/about/js/swiper.min.js') }}"></script>

<script>
    $(".yiyuan a").mouseenter(function(){
        $(".yiyuan a").addClass("avtive");
        $(".yiyuan .nian").addClass("avtive");
        $(".erdian .Conne").addClass("avtive");
        $(".eryuan a").removeClass("avtive");
        $(".eryuan .nian").removeClass("avtive");
        $(".eryuan .Conne").removeClass("avtive");
        $(".sandian a").removeClass("avtive");
        $(".sandian .nian").removeClass("avtive");
        $(".sandian .Conne").removeClass("avtive");
        $(".si a").removeClass("avtive");
        $(".si .nian").removeClass("avtive");
        $(".si .Conne").removeClass("avtive");
        $(".wu a").removeClass("avtive");
        $(".wu .nian").removeClass("avtive");
        $(".wu .Conne").removeClass("avtive");
        $(".liu a").removeClass("avtive");
        $(".liu .nian").removeClass("avtive");
        $(".liu .Conne").removeClass("avtive");
        $(".qi a").removeClass("avtive");
        $(".qi .nian").removeClass("avtive");
        $(".qi .Conne").removeClass("avtive");
        $(".ba a").removeClass("avtive");
        $(".ba .nian").removeClass("avtive");
        $(".ba .Conne").removeClass("avtive");
    });
    $(".eryuan a").mouseenter(function(){
        $(".yiyuan a").removeClass("avtive");
        $(".yiyuan .nian").removeClass("avtive");
        $(".erdian .Conne").removeClass("avtive");
        $(".eryuan a").addClass("avtive");
        $(".eryuan .nian").addClass("avtive");
        $(".eryuan .Conne").addClass("avtive");
        $(".sandian a").removeClass("avtive");
        $(".sandian .nian").removeClass("avtive");
        $(".sandian .Conne").removeClass("avtive");
        $(".si a").removeClass("avtive");
        $(".si .nian").removeClass("avtive");
        $(".si .Conne").removeClass("avtive");
        $(".wu a").removeClass("avtive");
        $(".wu .nian").removeClass("avtive");
        $(".wu .Conne").removeClass("avtive");
        $(".liu a").removeClass("avtive");
        $(".liu .nian").removeClass("avtive");
        $(".liu .Conne").removeClass("avtive");
        $(".qi a").removeClass("avtive");
        $(".qi .nian").removeClass("avtive");
        $(".qi .Conne").removeClass("avtive");
        $(".ba a").removeClass("avtive");
        $(".ba .nian").removeClass("avtive");
        $(".ba .Conne").removeClass("avtive");
    });
    $(".sandian a").mouseenter(function(){
        $(".yiyuan a").removeClass("avtive");
        $(".yiyuan .nian").removeClass("avtive");
        $(".erdian .Conne").removeClass("avtive");
        $(".eryuan a").removeClass("avtive");
        $(".eryuan .nian").removeClass("avtive");
        $(".eryuan .Conne").removeClass("avtive");
        $(".sandian a").addClass("avtive");
        $(".sandian .nian").addClass("avtive");
        $(".sandian .Conne").addClass("avtive");
        $(".si a").removeClass("avtive");
        $(".si .nian").removeClass("avtive");
        $(".si .Conne").removeClass("avtive");
        $(".wu a").removeClass("avtive");
        $(".wu .nian").removeClass("avtive");
        $(".wu .Conne").removeClass("avtive");
        $(".liu a").removeClass("avtive");
        $(".liu .nian").removeClass("avtive");
        $(".liu .Conne").removeClass("avtive");
        $(".qi a").removeClass("avtive");
        $(".qi .nian").removeClass("avtive");
        $(".qi .Conne").removeClass("avtive");
        $(".ba a").removeClass("avtive");
        $(".ba .nian").removeClass("avtive");
        $(".ba .Conne").removeClass("avtive");
    });
    $(".si a").mouseenter(function(){
        $(".yiyuan a").removeClass("avtive");
        $(".yiyuan .nian").removeClass("avtive");
        $(".erdian .Conne").removeClass("avtive");
        $(".eryuan a").removeClass("avtive");
        $(".eryuan .nian").removeClass("avtive");
        $(".eryuan .Conne").removeClass("avtive");
        $(".sandian a").removeClass("avtive");
        $(".sandian .nian").removeClass("avtive");
        $(".sandian .Conne").removeClass("avtive");
        $(".si a").addClass("avtive");
        $(".si .nian").addClass("avtive");
        $(".si .Conne").addClass("avtive");
        $(".wu a").removeClass("avtive");
        $(".wu .nian").removeClass("avtive");
        $(".wu .Conne").removeClass("avtive");
        $(".liu a").removeClass("avtive");
        $(".liu .nian").removeClass("avtive");
        $(".liu .Conne").removeClass("avtive");
        $(".qi a").removeClass("avtive");
        $(".qi .nian").removeClass("avtive");
        $(".qi .Conne").removeClass("avtive");
        $(".ba a").removeClass("avtive");
        $(".ba .nian").removeClass("avtive");
        $(".ba .Conne").removeClass("avtive");
    });
    $(".wu a").mouseenter(function(){
        $(".yiyuan a").removeClass("avtive");
        $(".yiyuan .nian").removeClass("avtive");
        $(".erdian .Conne").removeClass("avtive");
        $(".eryuan a").removeClass("avtive");
        $(".eryuan .nian").removeClass("avtive");
        $(".eryuan .Conne").removeClass("avtive");
        $(".sandian a").removeClass("avtive");
        $(".sandian .nian").removeClass("avtive");
        $(".sandian .Conne").removeClass("avtive");
        $(".si a").removeClass("avtive");
        $(".si .nian").removeClass("avtive");
        $(".si .Conne").removeClass("avtive");
        $(".wu a").addClass("avtive");
        $(".wu .nian").addClass("avtive");
        $(".wu .Conne").addClass("avtive");
        $(".liu a").removeClass("avtive");
        $(".liu .nian").removeClass("avtive");
        $(".liu .Conne").removeClass("avtive");
        $(".qi a").removeClass("avtive");
        $(".qi .nian").removeClass("avtive");
        $(".qi .Conne").removeClass("avtive");
        $(".ba a").removeClass("avtive");
        $(".ba .nian").removeClass("avtive");
        $(".ba .Conne").removeClass("avtive");
    });
    $(".liu a").mouseenter(function(){
        $(".yiyuan a").removeClass("avtive");
        $(".yiyuan .nian").removeClass("avtive");
        $(".erdian .Conne").removeClass("avtive");
        $(".eryuan a").removeClass("avtive");
        $(".eryuan .nian").removeClass("avtive");
        $(".eryuan .Conne").removeClass("avtive");
        $(".sandian a").removeClass("avtive");
        $(".sandian .nian").removeClass("avtive");
        $(".sandian .Conne").removeClass("avtive");
        $(".si a").removeClass("avtive");
        $(".si .nian").removeClass("avtive");
        $(".si .Conne").removeClass("avtive");
        $(".wu a").removeClass("avtive");
        $(".wu .nian").removeClass("avtive");
        $(".wu .Conne").removeClass("avtive");
        $(".liu a").addClass("avtive");
        $(".liu .nian").addClass("avtive");
        $(".liu .Conne").addClass("avtive");
        $(".qi a").removeClass("avtive");
        $(".qi .nian").removeClass("avtive");
        $(".qi .Conne").removeClass("avtive");
        $(".ba a").removeClass("avtive");
        $(".ba .nian").removeClass("avtive");
        $(".ba .Conne").removeClass("avtive");
    });
    $(".qi a").mouseenter(function(){
        $(".yiyuan a").removeClass("avtive");
        $(".yiyuan .nian").removeClass("avtive");
        $(".erdian .Conne").removeClass("avtive");
        $(".eryuan a").removeClass("avtive");
        $(".eryuan .nian").removeClass("avtive");
        $(".eryuan .Conne").removeClass("avtive");
        $(".sandian a").removeClass("avtive");
        $(".sandian .nian").removeClass("avtive");
        $(".sandian .Conne").removeClass("avtive");
        $(".si a").removeClass("avtive");
        $(".si .nian").removeClass("avtive");
        $(".si .Conne").removeClass("avtive");
        $(".wu a").removeClass("avtive");
        $(".wu .nian").removeClass("avtive");
        $(".wu .Conne").removeClass("avtive");
        $(".liu a").removeClass("avtive");
        $(".liu .nian").removeClass("avtive");
        $(".liu .Conne").removeClass("avtive");
        $(".qi a").addClass("avtive");
        $(".qi .nian").addClass("avtive");
        $(".qi .Conne").addClass("avtive");
        $(".ba a").removeClass("avtive");
        $(".ba .nian").removeClass("avtive");
        $(".ba .Conne").removeClass("avtive");
    });
    $(".ba a").mouseenter(function(){
        $(".yiyuan a").removeClass("avtive");
        $(".yiyuan .nian").removeClass("avtive");
        $(".erdian .Conne").removeClass("avtive");
        $(".eryuan a").removeClass("avtive");
        $(".eryuan .nian").removeClass("avtive");
        $(".eryuan .Conne").removeClass("avtive");
        $(".sandian a").removeClass("avtive");
        $(".sandian .nian").removeClass("avtive");
        $(".sandian .Conne").removeClass("avtive");
        $(".si a").removeClass("avtive");
        $(".si .nian").removeClass("avtive");
        $(".si .Conne").removeClass("avtive");
        $(".wu a").removeClass("avtive");
        $(".wu .nian").removeClass("avtive");
        $(".wu .Conne").removeClass("avtive");
        $(".liu a").removeClass("avtive");
        $(".liu .nian").removeClass("avtive");
        $(".liu .Conne").removeClass("avtive");
        $(".qi a").removeClass("avtive");
        $(".qi .nian").removeClass("avtive");
        $(".qi .Conne").removeClass("avtive");
        $(".ba a").addClass("avtive");
        $(".ba .nian").addClass("avtive");
        $(".ba .Conne").addClass("avtive");
    });
</script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        loop: true,
        freeMode: true,
        loopedSlides: 5, //looped slides should be the same
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
//        spaceBetween: 10,
        loop:true,
        loopedSlides: 5, //looped slides should be the same
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs,
        },
    });
</script>
<script>
    var bFlag;
    $('.section3 .item').click(function() {
        if ($(this).hasClass('active') || bFlag) return false;
        bFlag = true;
        var disX = $('.section3 .item.active').css('left')
                , disY = $('.section3 .item.active').css('top')
                , X = $(this).css('left')
                , Y = $(this).css('top')
                , that = $(this);
        $('.section3 .item').removeClass('active').eq(that.index()).addClass('active');
        $(this).animate({
            left: disX,
            top: disY
        }, function() {
            $('.section3 .item.main').animate({
                left: X,
                top: Y
            }, function() {
                bFlag = false;
            });
            $('.section3 .item').removeClass('main').eq(that.index()).addClass('main');
        });
    });

    $(".Collect .Button").click(function(){
        var reg= /^[\u4e00-\u9fa5\s]+$/; //中文姓名验证
        var RegCellPhone = /^(1)([0-9]{10})?$/;  //电话验证
        var Em = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;//验证邮箱
        var username = $("#Name").val();   //  获取姓名
        var Telephone = $("#Telephone").val();  //  获取电话号码
        var Email1 = $("#Email").val();  //获取邮箱
        var Te = $("#textarea").val().length;
        if(!($('#Name').val()=='')){
            if(reg.test(username)){
                if(RegCellPhone.test(Telephone)){
                    if(Email1!== ''){

                        if(Em.test(Email1)){
                            if(Te == 0){
                                $("#textarea").attr('placeholder','请留言');
                            }else{
                                    $.ajax('/index-message',{
                                        type : 'post',
                                        data : {type:2,name:username,phone:Telephone,email:Email1,content:$("#textarea").val(),_token:$('meta[name="csrf-token"]').attr('content')},
                                        success : function(res)
                                        {
                                            res = $.parseJSON(res);
                                            if(res.code == 200)
                                            {
                                                alert('留言成功');
                                                $("#Name").val('');
                                                $("#Telephone").val('');
                                                $("#Email").val('');
                                                $("#textarea").val('');
                                            }else
                                            {
                                                alert('留言失败');
                                            }
                                        },
                                        error : function(error)
                                        {
                                            alert('留言失败');
                                        }
                                    })                            }
                        }else{
                            $("#Email").val("");
                            $("#Email").attr('placeholder','邮箱格式不正确！请重新输入');
                        }
                    }else{
                        $("#Email").attr('placeholder','请输入电子邮箱');
                    }

                }else{
                    $("#Telephone").attr('placeholder','请输入正确的11位数电话号码');
                }
            }else{
                $("#Name").val("");
                $("#Name").attr('placeholder','请输入您的中文姓名');
            }
        }else{
            $("#Name").attr('placeholder','用户名不能为空');
        }
    });
    $("#Name").click(function(){
        $("#Name").attr('placeholder','');
    });
    $("#Telephone").click(function(){
        $("#Telephone").attr('placeholder','');
    });
    $("#Email").click(function(){
        $("#Email").attr('placeholder','');
    });
    $("#textarea").click(function(){
        $("#textarea").attr('placeholder','');
    });

</script>
<script src="{{ asset('front/about/js/jquery.scrollify.js') }}"></script>
<script src="{{ asset('front/about/js/main.js') }}"></script>
@endsection