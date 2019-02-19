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
        <img src="{{ asset('/front/case/img/defua.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">德福公元</div>
            <div class="xijie">
                <div class="time">楼盘地址:宜宾</div>
            </div>
            <div class="neir">宜宾德福公元总建筑面积10.6平方公里，项目规模10余万方，与建商集团合作前，仅卖出20余套，装修套餐进驻后项目一售而空</div>
            
        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/defu-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">会客厅由设计师纯手工晕染编制的七彩挂毯弱化了强硬的空间视觉，这个新家已然传递出淳朴而又细腻的生活气息。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">移步即入景的一片白桦林打破了常规的陈设方式，拉宽了餐厅的纵深感，糅合着生命的永恒，诠释着人与自然的和谐韵律，在美好的时光遇见最好的自己。</div>
                </div>
                <img src="{{ asset('/front/case/img/defu-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/defu-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">组合了丝绒面料、毛织地毯、精致水晶、尊贵皮质等现代元素，呈现出品质生活的现代追求。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">设计巧妙介入了都会元素，塑造出让人迷恋的简洁、轻奢与雅致，结束了一天忙碌的工作，享受此刻的美好。</div>
                </div>
                <img src="{{ asset('/front/case/img/defu-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/innovation-incubation.html') }}" class="shang">上一条：创新孵化基地人才公寓</a>
            <a href="{{ url('/case/liya-dragon-city.html') }}" class="xia">下一条：丽雅龙城</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection