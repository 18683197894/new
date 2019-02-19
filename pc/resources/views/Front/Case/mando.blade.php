@extends('Front.public')

@section('css')
    <link rel="stylesheet" href="{{ asset('/front/case/css/CaseDetails.css') }}"/>
@endsection

@section('content')

<div class="Crumbs">
    <span>当前位置</span><o>></o><a href="{{ url('/case.html') }}">精彩案列</a><o>></o><a href="javascript:;">案列详情</a>
</div>

<div class="CaseDetails">
    <div class="CaseDetails_list">
        <img src="{{ asset('/front/case/img/mando.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">贵州万都铭城</div>
            <div class="xijie">
                <div class="time">楼盘地址:贵州</div>
            </div>
            <div class="neir">贵州万都铭城总建筑面积平方公里，贵州织金万都置业标杆项目，毕节市重点招商引资项目，织金唯一商业综合体，近干套精装公寓。</div>
            
        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/wandu-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">常有人说：“如何体现小空间的价值？”我最先想到的，是格局和细节，在吸收建筑景观优势的同时，最大化地挖掘功能与美学的结合。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">以现代简约的语言，透过空间的虚实处理，模糊了功能区间的界限，形成一个自由的空间，共享与私密的角色互换，既有延展过渡，又有细节叠加，衬托出丰富多元的空间情感。</div>
                </div>
                <img src="{{ asset('/front/case/img/wandu-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/wandu-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">空间游离在黑白灰之间，并采用棕黄色作为跳跃色，舒适的沙发、灰色条纹地毯、时尚的抱枕和经典的钓鱼灯，营造出丰富多元的空间情感。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">蓝绿色作为空间的主题色，在空间中得到充分体现。实木复合型地板覆盖整体空间，木质纹理本身成为装饰的一部分。色泽交替与造型转换，都在不经意间彰显着主人的个性与品位。</div>
                </div>
                <img src="{{ asset('/front/case/img/wandu-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/sunshine100.html') }}" class="shang">上一条：重庆阳光100国际新城</a>
            <a href="{{ url('/case/blue-city.html') }}" class="xia">下一条：北京中治蓝城</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection