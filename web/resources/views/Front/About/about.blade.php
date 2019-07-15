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
            四川建商家居集团有限公司（以下简称“建商集团”），是一家集建筑规划咨询、项目售楼部设计、营销样板间设计、住宅批量精装修工程指导、品牌材料集中供应把关等服务于一体化的商品房批量精装修公司，依托领先的设计实力、供应商与资源与施工技术，为广大开发商提供一站式住宅工业化整体解决方案。
        </p>
        <p>
            建商集团定位于中国房地产精装修产业价值构建者，目前主要核心业务为，为房地产发展商提供“商品房批量装修”、“房地产整合营销”等资源协同服务。其核心竞争优势来源于全一线品牌的资源整合能力，为业主提供比较具有性价比的放心生态家装，让终端购房客户得到实惠。其独创模式，用市场杂牌的装修价格装修出全一线家居建材品牌组合的品质，为房地产项目销售加分，并帮助实现更高的利润可能。同时，建商集团与战略合作商家也通过规模化的经营得到相应的合理利润，从而真正实现多方共赢！
        </p>
        <p>
            建商集团拥有丰富的装修施工经验，在全国，先后服务于全国多家楼盘，所有合作的项目不仅为开发商实现了更高的利润，且所有楼盘开售便一售而空，得到了广大客户和业界人士的一致认同。 立足四川，服务于全国，从经验探索到全程精细化管理，为开发商提供住宅工业化整体解决方案的综合型专业地产服务，让开发商在现代社会的浪潮中抢占先机。
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
        <!-- <a href="javascript:;" class="Core_People">
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
        </a> -->
        <a href="javascript:;" class="Core_People">
            <img src="{{ asset('/front/img/Core2.png') }}" alt=""/>
            <div class="Text">
                <div class="Name">
                    <span>吴振裕</span>
                    <ol>总工程师</ol>
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
                    <span>冯佑鹏</span>
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
