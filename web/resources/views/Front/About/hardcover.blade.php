@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/css/Batch.css') }}"/>

@endsection

@section('content')
<div class="Batch">
    <div class="Batch_Jz">
        <img src="{{ asset('/front/img/Batch1.png') }}" alt=""/>
        <div class="Batch_Jz_Text">
            <div class="Title">
                建商批量精装修
            </div>
            <div class="Wenzi">
                建商集团定位于中国房地产精装修产业价值构建者，其核心竞争优势来源于全一线品牌的资源整合能力，从而为业主提供最具性价比的放心生态家装。
                其独创模式，用市场杂牌的装修套餐价格装修出全一线家居建材品牌组合的品质，让终端购房客户得实惠，为房地产项目销售加分，并助开发商实现更高的利润可能。
            </div>
        </div>
    </div>
</div>

<div class="Business">
    <div class="Business_Jz">
        <div class="Title">
            <span>业务特色</span>
            <i></i>
        </div>
        <div class="Business_a">
            <a href="javascript:;">
                <img src="{{ asset('/front/img/Batch_b1.png') }}" alt=""/>
                <div class="Text">
                    <div class="Name">透明装修</div>
                    <div class="Neirong">出差旅行或喝茶聚会都可通过手机、平板实时查看工地施工状况。</div>
                </div>
                <div class="Mengban"></div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/img/Batch_b2.png') }}" alt=""/>
                <div class="Text">
                    <div class="Name">现场管理</div>
                    <div class="Neirong">统一作业/规范施工/科学管理，高效更美观。创造整齐、清洁的规范施工环境。</div>
                </div>
                <div class="Mengban"></div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/img/Batch_b3.png') }}" alt=""/>
                <div class="Text">
                    <div class="Name">全程管控</div>
                    <div class="Neirong">11大工艺验收节点，规范、标准、统一有保障更放心。</div>
                </div>
                <div class="Mengban"></div>
            </a>
            <a href="javascript:;">
                <img src="{{ asset('/front/img/Batch_b4.png') }}" alt=""/>
                <div class="Text">
                    <div class="Name">标准化施工</div>
                    <div class="Neirong">严格按照国家制定的施工规范、验收标准和环保标准、成品保护标准、材料码放标准执行。</div>
                </div>
                <div class="Mengban"></div>
            </a>
        </div>
    </div>
</div>

<div class="Cooperation">
    <div class="Cooperation_Jz">
        <div class="Title">
            <span>合作楼盘</span>
            <i></i>
        </div>
        <div class="Cooperation_a">
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
        <a href="{{ url('/case.html') }}" class="MORE">查看更多</a>
    </div>
</div>

<!--占位置给尾部-->
<div class="Occupy"></div>
<!--尾部-->
@endsection

@section('js')

@endsection