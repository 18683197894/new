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
        <img src="{{ asset('/front/case/img/luneng.png') }}" alt="" class="CaseDetails_list_img"/>
        <div class="CaseDetails_list_Text">
            <div class="Name">鲁能山水原著</div>
            <div class="xijie">
                <div class="time">楼盘地址:宜宾</div>
            </div>
            <div class="neir">宜宾鲁能山水原著总建筑面积1610平方公里，宜宾西区最大的楼盘项目，我司作为项目住房批量装饰工程合作方，为项目的价值提升营销畅旺做出了独有贡献，得到了开发商股东的一致肯定和广大购房者的大力好评</div>

        </div>
    </div>
    <div class="Effect">
        <div class="Title">
            <span>室内装修效果图</span>
            <i></i>
        </div>
        <div class="Content">
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/luneng-1.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">“烟花三月下扬州”是诗人李白的著名诗句，更被蘅塘退士评曰：“千古丽句”。依瘦西湖而立的御景园，样板房呈现的是雅致和具有恬静东方气息的居所！</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">色调上以清淡的浅色系为主，追求一种清雅含蓄、端庄丰华的东方式精神境界。</div>
                </div>
                <img src="{{ asset('/front/case/img/luneng-2.jpg') }}" alt=""/>
            </div>
            <div class="Content_list">
                <img src="{{ asset('/front/case/img/luneng-3.jpg') }}" alt=""/>
                <div class="Text">
                    <div class="Name">翠绿色在这其中起到点缀的作用，虽没有大面积的着色，只是在重要的位置用清新的颜色润色一番，但却营造出点石成金的完美效果。</div>
                </div>
            </div>
            <div class="Content_list">
                <div class="Text">
                    <div class="Name">主卧家具体型简约，金空间的配色、饰品无不体现出主人的高审美和细致品味，卧室、床头柜、床头、床品色彩的搭配饱含着优雅。</div>
                </div>
                <img src="{{ asset('/front/case/img/luneng-4.jpg') }}" alt=""/>
            </div>
        </div>
        <div class="Brand">
            <div class="Title">合作品牌</div>
            @foreach($arr as $k => $v)
            <img src="{{ asset($v) }}" alt="" class="Logo"/>
            @endforeach
        </div>
        <div class="Pan">
            <a href="{{ url('/case/liya-dragon-city.html') }}" class="shang">上一条：丽雅龙城</a>
            <a href="{{ url('/case/xintiandi.html') }}" class="xia">下一条：浙商临港新天地</a>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection