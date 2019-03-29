@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/About.css') }}"/>

@endsection

@section('content')
<!--建商简介-->
<!--CSS有背景图-->
<div class="Brief">
    <div class="Brief_Jz">
        <img src="{{ asset('/front/img/Brief_l.png') }}" alt=""/>
        <div class="Title">中国房地产精装修产业价值构建者</div>
        <p>
            四川建商家居集团有限公司（以下简称“建商集团”），主营业务致力于为房地产发展商提供 “商品房批量精装”、“房地产整合营销”服务，
            以及利用公司已有中国知名连锁酒店品牌进驻，对公寓项目进行“带租约销售”，为开发商成功开发提供资源协同服务。
        </p>
        <p>
            建商集团定位于中国房地产精装修产业价值构建者，其核心竞争优势来源于全一线品牌的资源整合能力，从而为业主提供具性价比的放心生态家装。
            其创建模式，用市场杂牌的装修套餐价格装修出全一线家居建材品牌组合的品质，让终端购房客户得实惠，为房地产项目销售加分，
            并助开发商实现更高的利润可能。同时，建商集团与战略合作商家也通过规模化的经营得到相应的合理利润，从而真正实现多方共赢！
        </p>
        <p>
            建商集团先后成功服务重庆·阳光100国际新城、青岛·海上嘉年华、北京·中冶蓝城、成都·迈克生物专家公寓、宜宾·浙商临港新天地等，
            所合作项目不但实现了更高的利润附加值并一售而空，得到了广大客户及业界同仁的普遍认同和一致肯定。
            立足四川，服务全国，在批量精装房成为大势所趋的行业背景下，建商集团将为更多有远见的开发商提供战略协同服务，
            助力客户企业在消费升级、产业转型的时代浪潮中快人一步、勇夺先机。
        </p>
    </div>
</div>
<!--核心团队-->
<!--CSS有背景图-->
<div class="Core">
    <div class="Core_Jz">
        <div class="Core_Logo">
            <img src="{{ asset('/front/img/Core_lg.png') }}" alt=""/>
        </div>
        <a href="javascript:;" class="Core_People">
            <img src="{{ asset('/front/img/Core1.png') }}" alt=""/>
            <div class="Text">
                <div class="Name">
                    <span>熊勇</span>
                    <ol>董事长</ol>
                </div>
                <div class="Wenzi">
                    熊勇先生格局高远，二十余载商海搏击，现任市政协委员；四川省房地产协会常务理事、成都市建筑装饰协会、
                    成都陈设艺术行业协会荣誉顾问； 北京大学中国文商企业家后EMBA联谊会会长；四川建商集团董事长、总经理。
                </div>
            </div>
        </a>
        <a href="javascript:;" class="Core_People">
            <img src="{{ asset('/front/img/Core2.png') }}" alt=""/>
            <div class="Text">
                <div class="Name">
                    <span>罗玉书</span>
                    <ol>副总经理</ol>
                </div>
                <div class="Wenzi">
                    中国建筑一局集团工程总监、中港建筑工程(深圳)有限公司副总经理，二十余年建筑、装饰行业工作经验，现任四川建商集团董事、副总经理、总工程师。
                </div>
            </div>
        </a>
        <a href="javascript:;" class="Core_People">
            <img src="{{ asset('/front/img/Core3.png') }}" alt=""/>
            <div class="Text">
                <div class="Name">
                    <span>肖坤华</span>
                    <ol>副总经理</ol>
                </div>
                <div class="Wenzi">
                    原中国建筑一局集团工程总监、中港建筑工程(深圳)有限公司副总经理，二十余年建筑、装饰行业工作经验，现任四川建商集团董事、副总经理、总工程师
                </div>
            </div>
        </a>
        <a href="javascript:;" class="Core_People">
            <img src="{{ asset('/front/img/Core4.png') }}" alt=""/>
            <div class="Text">
                <div class="Name">
                    <span>杨文秀</span>
                    <ol>营销总监</ol>
                </div>
                <div class="Wenzi">
                    原成都易居置业项目总监、上海立天唐人集团服务总监，十余年地产装饰行业工作经验。
                </div>
            </div>
        </a>
        <a href="javascript:;" class="Core_People">
            <img src="{{ asset('/front/img/Core5.png') }}" alt=""/>
            <div class="Text">
                <div class="Name">
                    <span>黄均祥</span>
                    <ol>供应链总监</ol>
                </div>
                <div class="Wenzi">
                    《中国建筑装饰装修》杂志编审委员会成员，对装饰供应链有二十余年的深度研究及实操运营经验。
                </div>
            </div>
        </a>
        <a href="javascript:;" class="Core_People">
            <img src="{{ asset('/front/img/Core6.png') }}" alt=""/>
            <div class="Text">
                <div class="Name">
                    <span>徐雪峰</span>
                    <ol>市场总监</ol>
                </div>
                <div class="Wenzi">
                    台湾聯义地产公司企业开发部总监，徐先生有十余年地产及装饰业务咨询发展经验，对深入挖掘地产物业美学价值见解独到。
                </div>
            </div>
        </a>
    </div>
</div>
<!--此页面不用留尾部占位置DIV-->
@endsection

@section('js')

@endsection
