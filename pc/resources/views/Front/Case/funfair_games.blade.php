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
        <img src="{{ asset('/front/case/img/Case_b2.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">海上嘉年华公寓项目海洋之心</div>
            <div class="xijie">
                <div class="time">楼盘地址:青岛</div>
            </div>
            <div class="neir">青岛海上嘉年华总建筑面积810平方公里，地处青岛市凤凰岛旅游度假区，我司受托负责该项目公寓批量装饰工程，与开发商精诚合作，为项目的价值提升、营销畅旺做出独有贡献。</div>
            
        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/jianianhua-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">人身，总要在娑婆中历练道心，总要在尘埃中开出清莲，花开花谢总会在缺憾中修得圆满，来这里，桃源里，寻找最美好的自己。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">素雅的原木色与活泼的朦胧橙在空间中相互融合，一半静谧，一半绚烂，动静自如。大厅以棕色和素白色为主色调，朦胧橙的椅子打破了这之间的沉静，柔和的阳光。</div>
                </div>
                <img src="{{ asset('/front/case/img/jianianhua-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/jianianhua-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">我们于日用必需的东西之外，必须还有一点无用的游戏和享乐，生活才有意义。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">简约、舒适。整个空间摈弃过多装饰色调，干净清雅，以纯白色、原木色及温和的灰蓝色、浅褐色为主，白墙、原木、创意灯具，恰到好处的留白与尺度营造出恬静宜人的生活场景。</div>
                </div>
                <img src="{{ asset('/front/case/img/jianianhua-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/blue-city.html') }}" class="shang">上一条：北京中治蓝城</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection