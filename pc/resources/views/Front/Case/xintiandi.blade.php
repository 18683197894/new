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
        <img src="{{ asset('/front/case/img/zeshang.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">浙商临港新天地</div>
            <div class="xijie">
                <div class="time">楼盘地址：宜宾</div>
            </div>
            <div class="neir">宜宾浙商临港新天地总建筑面积160平方公里，浙商集团宜宾代表作项目，总规模16万方商业综合体，其中近千套L OFT及平层公寓。</div>

        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/zeshang-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">村上春树对幸福的描摹极致细微：生活中小小的幸运与快乐，流淌在生活的每个瞬间且稍纵即逝的美好，内心的宽容与满足，对人生的感恩和珍惜。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">当空间与人文、艺术、生活紧密结合时，所创造出来不单是居住或使用的空间容器，而是表述故事与片段的场景。它十足窄小，紧紧包围的簇拥感，梦幻、柔软、温暖。</div>
                </div>
                <img src="{{ asset('/front/case/img/zeshang-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/zeshang-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">鹅黄与天蓝的明媚气息在空气中流淌，散发青春的味道。在阳光晴好的日子里，换上便装，把大自然最美的纹理和灵动的姿态捕捉，而后定格为家永恒的背景，那便是幸福的底色。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">想象穿着家居服，带着俏皮的绒线帽，专注于研磨新入手的豆子，尝试缤纷马卡龙的最新做法，把甜腻的日子晒到融化。</div>
                </div>
                <img src="{{ asset('/front/case/img/zeshang-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/luneng-landscape.html') }}" class="shang">上一条：鲁能山水原著</a>
            <a href="{{ url('/case/sunshine100.html') }}" class="xia">下一条：重庆阳光100国际新城</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection